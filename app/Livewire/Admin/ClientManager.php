<?php

namespace App\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ClientManager extends Component
{
    use WithFileUploads, WithPagination;

    public $name = '';
    public $logo;
    public $order = 0;
    public $is_active = true;
    public $editingId = null;
    public $editingClient = null;

    protected $listeners = ['deleteConfirmed'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        'order' => 'required|integer|min:0',
        'is_active' => 'boolean',
    ];

    protected $messages = [
        'name.required' => 'Nama client wajib diisi.',
        'logo.image' => 'File harus berupa gambar.',
        'logo.mimes' => 'Format gambar: JPG, PNG, GIF, WebP.',
        'logo.max' => 'Ukuran gambar maksimal 2MB.',
        'order.required' => 'Urutan wajib diisi.',
        'order.integer' => 'Urutan harus berupa angka.',
    ];

    public function render()
    {
        return view('livewire.admin.client-manager', [
            'clients' => Client::ordered()->paginate(12)
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'logo', 'order', 'is_active', 'editingId', 'editingClient']);
        $this->resetValidation();
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        
        $this->editingId = $client->id;
        $this->name = $client->name;
        $this->order = $client->order;
        $this->is_active = $client->is_active;
        $this->editingClient = $client;
        
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
            $directory = 'clients';
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
            
            // Resize jika terlalu besar (max width 800px untuk logo)
            $width = imagesx($sourceImage);
            $height = imagesy($sourceImage);
            
            if ($width > 800) {
                $newWidth = 800;
                $newHeight = (int)(($height / $width) * 800);
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
            
            Log::info('Client logo converted successfully', [
                'filename' => $filename,
                'path' => $filePath,
                'size' => filesize($filePath)
            ]);
            
            return $directory . '/' . $filename;
            
        } catch (\Exception $e) {
            Log::error('Client logo conversion failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Fallback: simpan file asli jika konversi gagal
            $filename = Str::slug($this->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('clients', $filename, 'public');
            return 'clients/' . $filename;
        }
    }

    public function save()
    {
        // Validasi dinamis: logo required untuk create, optional untuk update
        $rules = $this->rules;
        if (!$this->editingId) {
            $rules['logo'] = 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
        }
        
        $this->validate($rules);

        try {
            $data = [
                'name' => $this->name,
                'order' => $this->order,
                'is_active' => $this->is_active,
            ];

            if ($this->logo) {
                // Konversi dan simpan logo sebagai WebP
                $logoPath = $this->convertToWebp($this->logo);
                
                if (empty($logoPath)) {
                    throw new \Exception('Logo path is empty');
                }
                
                $data['logo_path'] = $logoPath;

                // Delete old logo if editing
                if ($this->editingId) {
                    $client = Client::find($this->editingId);
                    if ($client && $client->logo_path && Storage::disk('public')->exists($client->logo_path)) {
                        Storage::disk('public')->delete($client->logo_path);
                    }
                }
            }

            if ($this->editingId) {
                $client = Client::findOrFail($this->editingId);
                $client->update($data);
                session()->flash('message', 'Client berhasil diperbarui!');
                
                Log::info('Client updated', [
                    'id' => $this->editingId,
                    'name' => $this->name
                ]);
            } else {
                Client::create($data);
                session()->flash('message', 'Client berhasil ditambahkan!');
                
                Log::info('Client created', [
                    'name' => $this->name,
                    'logo_path' => $data['logo_path'] ?? null
                ]);
            }

            $this->resetForm();
            $this->dispatch('close-modal');
            $this->resetPage();
            
        } catch (\Exception $e) {
            Log::error('Failed to save client', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteConfirmed($id)
    {
        try {
            $client = Client::findOrFail($id);
            
            // Delete logo file
            if ($client->logo_path && Storage::disk('public')->exists($client->logo_path)) {
                Storage::disk('public')->delete($client->logo_path);
            }
            
            $client->delete();
            
            session()->flash('message', 'Client berhasil dihapus!');
            $this->resetPage();
            
            Log::info('Client deleted', ['id' => $id]);
            
        } catch (\Exception $e) {
            Log::error('Failed to delete client', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->update(['is_active' => !$client->is_active]);
            
            session()->flash('message', 'Status client berhasil diubah!');
            
            Log::info('Client status toggled', [
                'id' => $id,
                'is_active' => $client->is_active
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to toggle client status', [
                'error' => $e->getMessage()
            ]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}