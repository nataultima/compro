<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;

class ProductPreview extends Component
{
    /**
     * Render the component view.
     */
    public function render(): View
    {
        // Hanya mengambil 6 produk pertama yang aktif dan terurut
        $products = Product::active()->ordered()->take(6)->get();

        return view('livewire.product-preview', [
            'products' => $products,
        ]);
    }

    /**
     * Helper untuk mendapatkan kelas warna badge.
     */
    public function getBadgeColorClasses(string $color): string
    {
        return match($color) {
            'blue'    => 'bg-blue-100 text-blue-800',
            'green'   => 'bg-green-100 text-green-800',
            'purple'  => 'bg-purple-100 text-purple-800',
            'red'     => 'bg-red-100 text-red-800',
            'indigo'  => 'bg-indigo-100 text-indigo-800',
            'yellow'  => 'bg-yellow-100 text-yellow-800',
            default   => 'bg-gray-100 text-gray-800',
        };
    }
    
    /**
     * Helper untuk mendapatkan kelas warna badge kategori.
     */
    public function getCategoryBadgeClasses(string $category): string
    {
        return match(strtolower($category)) {
            'prisma'     => 'bg-blue-600',
            'busway'     => 'bg-green-600',
            'panel mv'   => 'bg-purple-600',
            'smart'      => 'bg-red-600',
            'sync'       => 'bg-indigo-600',
            'lvmdp'      => 'bg-indigo-600',
            default      => 'bg-gray-600',
        };
    }
}