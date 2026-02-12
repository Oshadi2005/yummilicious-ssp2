<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminCustomerController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| PUBLIC (CUSTOMER) ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (CART + CHECKOUT)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ✅ Cart page
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // ✅ Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
});

/*
|--------------------------------------------------------------------------
| REDIRECT AFTER LOGIN (ROLE BASED)
|--------------------------------------------------------------------------
*/
Route::get('/redirect-after-login', function () {
    $user = auth()->user();

    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware('auth')->name('redirect.after.login');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (AUTH + ADMIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    });

/*
|--------------------------------------------------------------------------
| DEV ONLY – MAKE FIRST USER ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/make-admin', function () {

    $user = User::first();

    if (!$user) {
        return 'No users found. Register first.';
    }

    $user->role = 'admin';
    $user->save();

    return 'User ' . $user->name . ' is now admin!';
});
