<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $title, $description, $image;
    public $portfolio_id;
    public $search = '';
    public $portfolio;

    protected $listeners = ['deleteConfirmed'];

    public function render()
    {
        return view('livewire.admin.portfolio-management', [
            'portfolios' => Portfolio::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }

    public function resetForm()
    {
        $this->reset(['title', 'description', 'image', 'portfolio_id', 'portfolio']);
        $this->resetValidation();
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $this->portfolio_id = $id;
        $this->title = $portfolio->title;
        $this->description = $portfolio->description;
        $this->portfolio = $portfolio;
        
        // Dispatch event ke Alpine untuk buka modal
        $this->dispatch('open-modal');
    }

    /**
     * Konversi gambar ke WebP menggunakan GD Library
     */
    private function convertToWebp($image)
    {
        $filename = Str::slug($this->title) . '-' . time() . '.webp';
        $path = storage_path('app/public/portfolios/' . $filename);
        
        // Buat directory jika belum ada
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        
        // Dapatkan info gambar
        $imageInfo = getimagesize($image->getRealPath());
        $mime = $imageInfo['mime'];
        
        // Load gambar berdasarkan tipe
        switch ($mime) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($image->getRealPath());
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($image->getRealPath());
                break;
            case 'image/gif':
                $sourceImage = imagecreatefromgif($image->getRealPath());
                break;
            case 'image/webp':
                $sourceImage = imagecreatefromwebp($image->getRealPath());
                break;
            default:
                // Jika bukan gambar yang didukung, simpan asli
                $image->storeAs('portfolios', $filename, 'public');
                return 'portfolios/' . $filename;
        }
        
        // Resize jika terlalu besar (max width 1920px)
        $width = imagesx($sourceImage);
        $height = imagesy($sourceImage);
        
        if ($width > 1920) {
            $newWidth = 1920;
            $newHeight = ($height / $width) * 1920;
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($sourceImage);
            $sourceImage = $resizedImage;
        }
        
        // Konversi ke WebP dengan kualitas 85%
        imagewebp($sourceImage, $path, 85);
        imagedestroy($sourceImage);
        
        return 'portfolios/' . $filename;
    }

    public function store()
    {
        // Validasi untuk create baru
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:5120',
        ]);

        // Konversi dan simpan gambar sebagai WebP
        $imagePath = $this->convertToWebp($this->image);

        Portfolio::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        $this->resetForm();
        $this->dispatch('close-modal');
        session()->flash('success', 'Portfolio berhasil ditambahkan!');
    }

    public function update()
    {
        // Validasi untuk update (image tidak required)
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        $portfolio = Portfolio::findOrFail($this->portfolio_id);

        if ($this->image) {
            // Hapus gambar lama
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            
            // Konversi dan simpan gambar baru sebagai WebP
            $imagePath = $this->convertToWebp($this->image);
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru
            $imagePath = $portfolio->image;
        }

        $portfolio->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        $this->resetForm();
        $this->dispatch('close-modal');
        session()->flash('success', 'Portfolio berhasil diperbarui!');
    }

    public function deleteConfirmed($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        session()->flash('success', 'Portfolio berhasil dihapus!');
    }
}