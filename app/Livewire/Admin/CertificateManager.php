<?php

namespace App\Livewire\Admin;

use App\Models\Certificate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CertificateManager extends Component
{
    use WithFileUploads, WithPagination;

    public $name = '';
    public $description = '';
    public $image;
    public $badge = '';
    public $badge_color = 'blue';
    public $status = 'Certified';
    public $order = 0;
    public $is_active = true;
    public $editingId = null;
    public $editingCertificate = null;

    protected $listeners = ['deleteConfirmed'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        'badge' => 'required|string|max:255',
        'badge_color' => 'required|in:blue,green,purple,red,yellow,indigo,pink,gray',
        'status' => 'required|string|max:255',
        'order' => 'required|integer|min:0',
        'is_active' => 'boolean',
    ];

    protected $messages = [
        'name.required' => 'Nama sertifikat wajib diisi.',
        'badge.required' => 'Badge sertifikat wajib diisi.',
        'badge_color.required' => 'Warna badge wajib dipilih.',
        'badge_color.in' => 'Warna badge tidak valid.',
        'status.required' => 'Status sertifikat wajib diisi.',
        'image.image' => 'File harus berupa gambar.',
        'image.mimes' => 'Format gambar: JPG, PNG, GIF, WebP.',
        'image.max' => 'Ukuran gambar maksimal 2MB.',
        'order.required' => 'Urutan wajib diisi.',
        'order.integer' => 'Urutan harus berupa angka.',
    ];

    public function render()
    {
        return view('livewire.admin.certificate-manager', [
            'certificates' => Certificate::ordered()->paginate(12)
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'image', 'badge', 'badge_color', 'status', 'order', 'is_active', 'editingId', 'editingCertificate']);
        $this->resetValidation();
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        
        $this->editingId = $certificate->id;
        $this->name = $certificate->name;
        $this->description = $certificate->description;
        $this->badge = $certificate->badge;
        $this->badge_color = $certificate->badge_color;
        $this->status = $certificate->status;
        $this->order = $certificate->order;
        $this->is_active = $certificate->is_active;
        $this->editingCertificate = $certificate;
        
        // Dispatch event ke Alpine untuk buka modal
        $this->dispatch('open-modal');
    }

    /**
     * Konversi gambar ke WebP menggunakan GD Library
     */
    private function convertToWebp($image)
    {
        try {
            $filename = Str::slug($this->name) . '-' . time() . '.webp';
            $directory = 'certificates';
            $fullPath = storage_path('app/public/' . $directory);
            
            // Buat directory jika belum ada
            if (!is_dir($fullPath)) {
                mkdir($fullPath, 0755, true);
            }
            
            $filePath = $fullPath . '/' . $filename;
            
            // Dapatkan info gambar
            $imageInfo = getimagesize($image->getRealPath());
            
            if (!$imageInfo) {
                throw new \Exception('Invalid image file');
            }
            
            $mime = $imageInfo['mime'];
            
            // Load gambar berdasarkan tipe
            switch ($mime) {
                case 'image/jpeg':
                    $sourceImage = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'image/png':
                    $sourceImage = imagecreatefrompng($image->getRealPath());
                    // Preserve transparency
                    imagealphablending($sourceImage, false);
                    imagesavealpha($sourceImage, true);
                    break;
                case 'image/gif':
                    $sourceImage = imagecreatefromgif($image->getRealPath());
                    break;
                case 'image/webp':
                    $sourceImage = imagecreatefromwebp($image->getRealPath());
                    break;
                default:
                    // Fallback: simpan file asli
                    $image->storeAs($directory, $filename, 'public');
                    return $directory . '/' . $filename;
            }
            
            if (!$sourceImage) {
                throw new \Exception('Failed to create image resource');
            }
            
            // Resize jika terlalu besar (max width 1200px untuk certificate)
            $width = imagesx($sourceImage);
            $height = imagesy($sourceImage);
            
            if ($width > 1200) {
                $newWidth = 1200;
                $newHeight = (int)(($height / $width) * 1200);
                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
                
                // Preserve transparency untuk PNG
                imagealphablending($resizedImage, false);
                imagesavealpha($resizedImage, true);
                $transparent = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
                imagefill($resizedImage, 0, 0, $transparent);
                
                imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($sourceImage);
                $sourceImage = $resizedImage;
            }
            
            // Konversi ke WebP dengan kualitas 90%
            $result = imagewebp($sourceImage, $filePath, 90);
            imagedestroy($sourceImage);
            
            if (!$result) {
                throw new \Exception('Failed to save WebP image');
            }
            
            // Verify file exists
            if (!file_exists($filePath)) {
                throw new \Exception('WebP file was not created');
            }
            
            Log::info('Certificate image converted successfully', [
                'filename' => $filename,
                'path' => $filePath,
                'size' => filesize($filePath)
            ]);
            
            return $directory . '/' . $filename;
            
        } catch (\Exception $e) {
            Log::error('Certificate image conversion failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Fallback: simpan file asli jika konversi gagal
            $filename = Str::slug($this->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('certificates', $filename, 'public');
            return 'certificates/' . $filename;
        }
    }

    public function save()
    {
        // Validasi dinamis: image required untuk create, optional untuk update
        $rules = $this->rules;
        if (!$this->editingId) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
        }
        
        $this->validate($rules);

        try {
            $data = [
                'name' => $this->name,
                'description' => $this->description,
                'badge' => $this->badge,
                'badge_color' => $this->badge_color,
                'status' => $this->status,
                'order' => $this->order,
                'is_active' => $this->is_active,
            ];

            if ($this->image) {
                // Konversi dan simpan image sebagai WebP
                $imagePath = $this->convertToWebp($this->image);
                
                if (empty($imagePath)) {
                    throw new \Exception('Image path is empty');
                }
                
                $data['image_path'] = $imagePath;

                // Delete old image if editing
                if ($this->editingId) {
                    $certificate = Certificate::find($this->editingId);
                    if ($certificate && $certificate->image_path && Storage::disk('public')->exists($certificate->image_path)) {
                        Storage::disk('public')->delete($certificate->image_path);
                    }
                }
            }

            if ($this->editingId) {
                $certificate = Certificate::findOrFail($this->editingId);
                $certificate->update($data);
                session()->flash('message', 'Sertifikat berhasil diperbarui!');
                
                Log::info('Certificate updated', [
                    'id' => $this->editingId,
                    'name' => $this->name
                ]);
            } else {
                Certificate::create($data);
                session()->flash('message', 'Sertifikat berhasil ditambahkan!');
                
                Log::info('Certificate created', [
                    'name' => $this->name,
                    'image_path' => $data['image_path'] ?? null
                ]);
            }

            $this->resetForm();
            $this->dispatch('close-modal');
            $this->resetPage();
            
        } catch (\Exception $e) {
            Log::error('Failed to save certificate', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteConfirmed($id)
    {
        try {
            $certificate = Certificate::findOrFail($id);
            
            // Delete image file
            if ($certificate->image_path && Storage::disk('public')->exists($certificate->image_path)) {
                Storage::disk('public')->delete($certificate->image_path);
            }
            
            $certificate->delete();
            
            session()->flash('message', 'Sertifikat berhasil dihapus!');
            $this->resetPage();
            
            Log::info('Certificate deleted', ['id' => $id]);
            
        } catch (\Exception $e) {
            Log::error('Failed to delete certificate', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        try {
            $certificate = Certificate::findOrFail($id);
            $certificate->update(['is_active' => !$certificate->is_active]);
            
            session()->flash('message', 'Status sertifikat berhasil diubah!');
            
            Log::info('Certificate status toggled', [
                'id' => $id,
                'is_active' => $certificate->is_active
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to toggle certificate status', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}