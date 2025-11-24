<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Certificate;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index(): View
    {
        $clients = Client::active()->ordered()->get();
        $certificates = Certificate::active()->ordered()->get();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        
        $announcement = Announcement::currentlyActive()->ordered()->first();
        
        return view('guest', compact('clients', 'certificates', 'portfolios', 'announcement'));
    }

    public function portfolio(): View
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        
        return view('guest.portfolio', compact('portfolios'));
    }

    public function products(): View
    {
        return view('guest.products');
    }

    public function productDetail(Product $product): View
    {
        return view('guest.product-detail', compact('product'));
    }

    public function announcement(Request $request): View
    {
        $featuredId = $request->get('featured');
        return view('guest.announcement', compact('featuredId'));
    }
}