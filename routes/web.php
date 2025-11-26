<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Livewire\Admin\Products\Index as ProductsIndex;
use App\Livewire\Admin\Products\Create as ProductsCreate;
use App\Livewire\Admin\Products\Edit as ProductsEdit;
use App\Livewire\Admin\ClientManager;
use App\Livewire\Admin\CertificateManager;
use App\Livewire\Admin\AnnouncementManager;

/*
|--------------------------------------------------------------------------
| Guest Routes (Public)
|--------------------------------------------------------------------------
| Route yang dapat diakses oleh siapa saja tanpa perlu login.
*/

// Home/Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Portfolio Page (jika berbeda dengan home)
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

// Public Announcement Page (ini yang benar untuk guest)
Route::get('/pengumuman', [HomeController::class, 'announcement'])->name('announcement');

// Product Routes for Guests
Route::get('/produk', [HomeController::class, 'products'])->name('guest.products');
Route::get('/produk/{product:slug}', [HomeController::class, 'productDetail'])->name('guest.products.show');

// Tambahkan route ini
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route test email (hapus setelah testing berhasil)
Route::get('/test-email', function () {
    $testMessage = new \App\Models\ContactMessage([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '081234567890',
        'message' => 'Ini adalah pesan test untuk memastikan email notification berfungsi dengan baik.'
    ]);
    
    try {
        Mail::to('official@nataultima.com')->send(new \App\Mail\ContactMessageNotification($testMessage));
        return 'Email berhasil dikirim! Cek inbox Anda.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
| Route yang hanya dapat diakses oleh pengguna yang sudah login dan terverifikasi.
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');
    
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    | Route khusus untuk admin, berada di dalam grup 'auth' dan 'admin'.
    */

   Route::prefix('admin')->name('admin.')->group(function () {
    // Portfolio Management
    Route::get('/portfolio', \App\Livewire\Admin\PortfolioManagement::class)->name('portfolio');
    
    // Clients Management
    Route::get('/clients', ClientManager::class)->name('clients');
    
    // Certificates Management
    Route::get('/certificates', CertificateManager::class)->name('certificates');

    // Products Management
    Route::get('/products', ProductsIndex::class)->name('products');
    Route::get('/products/create', ProductsCreate::class)->name('products.create');
    Route::get('/products/{product}/edit', ProductsEdit::class)->name('products.edit');

    // Announcements Management
    Route::get('/announcements', AnnouncementManager::class)->name('announcements');


    //contact massages
     Route::get('/contact-messages', \App\Livewire\Admin\ContactMessages::class)->name('contact-messages');
});
});