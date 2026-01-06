<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\OrderController;

Route::middleware(['auth.basic'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/menu', [AdminController::class, 'menu'])->name('admin.menu');
    Route::get('/report/download', [AdminController::class, 'downloadReport'])->name('admin.report.download');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [AdminController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('products.destroy');

    // Order Management
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
});


use App\Models\Product;

Route::get('/', function () {
    $products = Product::where('is_available', true)->get();
    $makanan = $products->where('category', 'Food');
    $minuman = $products->where('category', 'Drink');
    $tambahan = $products->where('category', 'Snack'); // Assuming 'Snack' maps to 'Tambahan' or I should update categories.
    return view('user.menu', compact('makanan', 'minuman', 'tambahan'));
});

Route::get('/menu', function () {
    $products = Product::where('is_available', true)->get();
    $makanan = $products->where('category', 'Food');
    $minuman = $products->where('category', 'Drink');
    $tambahan = $products->where('category', 'Snack');
    return view('user.menu', compact('makanan', 'minuman', 'tambahan'));
});

Route::post('/cart/save', [CheckoutController::class, 'saveCart'])->name('cart.save');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'place'])->name('checkout.place');

// Temporary Route to Update Admin (Delete this after use!)
Route::get('/update-admin', function () {
    $user = \App\Models\User::first(); // Ambil user pertama (Test User semalam)
    if (!$user) {
        $user = new \App\Models\User();
    }

    $user->name = 'Admin Warung';
    $user->email = 'admin'; // Kita paksa isi 'admin' sebagai username
    $user->password = Illuminate\Support\Facades\Hash::make('admin123');
    $user->save();

    return "Admin Updated! Username: admin, Pass: admin123";
});
