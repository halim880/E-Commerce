<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\SearchResultComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\UserDashboard;
use App\Http\Livewire\WishlistComponent;

Route::get("/", HomeComponent::class)->name("home.index");
Route::get("/shop", ShopComponent::class)->name("shop");
Route::get("/cart", CartComponent::class)->name("shop.cart");
Route::get("/checkout", CheckoutComponent::class)->name("shop.checkout");
Route::get("/product/search", SearchResultComponent::class)->name("product.search");
Route::get("/product/{slug}", ProductDetailsComponent::class)->name("product.details");
Route::get("/product-category/{slug}", CategoryComponent::class)->name("product.category");

Route::get("/wishlist", WishlistComponent::class)->name("shop.wishlist");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', UserDashboard::class)->name('admin.dashboard');
    Route::get('/admin/categores', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/store', AddCategoryComponent::class)->name('admin.category.store');
});

require __DIR__.'/auth.php';
