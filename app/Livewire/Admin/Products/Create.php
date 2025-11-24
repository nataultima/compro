<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

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

    #[Validate('required|integer|min:0')]
    public $order = 0;

    #[Validate('boolean')]
    public $is_active = true;

    public function save()
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
            $data['image'] = $this->image->store('products', 'public');
        }

        Product::create($data);

        session()->flash('success', 'Produk berhasil ditambahkan.');

        return $this->redirect(route('admin.products'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.products.create')
            ->layout('components.layouts.app');
    }
}