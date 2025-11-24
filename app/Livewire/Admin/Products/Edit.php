<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|max:255')]
    public $category = '';

    #[Validate('required|string')]
    public $description = '';

    #[Validate('nullable|string|max:255')]
    public $capacity = '';

    #[Validate('nullable|string|max:255')]
    public $badge_label = '';

    #[Validate('required|in:blue,green,purple,red,indigo,yellow')]
    public $badge_color = 'blue';

    #[Validate('nullable|image|max:2048')]
    public $image;

    public $existing_image;

    #[Validate('required|integer|min:0')]
    public $order = 0;

    #[Validate('boolean')]
    public $is_active = true;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->description = $product->description;
        $this->capacity = $product->capacity;
        $this->badge_label = $product->badge_label;
        $this->badge_color = $product->badge_color;
        $this->existing_image = $product->image;
        $this->order = $product->order;
        $this->is_active = $product->is_active;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'capacity' => $this->capacity,
            'badge_label' => $this->badge_label,
            'badge_color' => $this->badge_color,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            // Delete old image
            if ($this->existing_image && Storage::disk('public')->exists($this->existing_image)) {
                Storage::disk('public')->delete($this->existing_image);
            }
            
            $data['image'] = $this->image->store('products', 'public');
        }

        $this->product->update($data);

        session()->flash('success', 'Produk berhasil diupdate.');

        return $this->redirect(route('admin.products'), navigate: true);
    }

    public function deleteImage()
    {
        if ($this->existing_image && Storage::disk('public')->exists($this->existing_image)) {
            Storage::disk('public')->delete($this->existing_image);
            $this->product->update(['image' => null]);
            $this->existing_image = null;

            session()->flash('success', 'Gambar berhasil dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.admin.products.edit')
            ->layout('components.layouts.app');
    }
}