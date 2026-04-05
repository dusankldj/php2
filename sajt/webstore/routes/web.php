<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CRUDCategories;
use App\Http\Controllers\SpecificationsController;
use App\Http\Controllers\ContactController;

Route::get('/', [CategoryController::class, 'writeCategories'])
    ->name('home');

Route::get('/home', [CategoryController::class, 'writeCategories'])
    ->name('home');

Route::get('/store', [StoreController::class, 'index'])
    ->name('store');


Route::get('/contact', function (){
    return view('pages.contact');
})->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::get('/register', function (){
    return view('pages.registerPage');
})->name('register');

Route::get('/author', function () {
    return view('pages.author');
})->name('author');

Route::get('/product', [ProductController::class, 'index'])
    ->name('product');

//mejl
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


/*Registracija i log-in*/
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*Add to cart*/
Route::post('/cart/add', [CartController::class, 'add'])
    ->middleware('auth');

/*Cart*/
Route::middleware('auth:web')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);

    Route::delete('/cart/item/{id}', [CartController::class, 'removeItem']);

    Route::delete('/cart/clear', [CartController::class, 'clear']);

    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
});

//admin funkcionalnosti
Route::middleware('AdminMiddleware')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::delete('/admin/product/{id}', [AdminController::class, 'destroy'])
        ->name('admin.destroy');

    Route::get('/admin/product/{id}', [AdminController::class, 'edit'])
        ->name('admin.product.edit');

    Route::patch('/admin/product/{id}', [AdminController::class, 'redirectToCreateProduct'])
        ->name('admin.product.add');

    Route::get('/admin/product', [AdminController::class, 'showProductPage'])
        ->name('admin.product');

    Route::get('/category/{id}/specs', [CategoryController::class, 'getSpecs']);

    Route::patch('/admin/product/{id}', [AdminController::class, 'editProduct'])
        ->name('admin.edit-product');

    Route::post('/admin/product', [AdminController::class, 'addProduct'])
        ->name('admin.add-product');

    Route::patch('/admin/image/change-thumbnail', [AdminController::class, 'changeThumbnail'])
        ->name('admin.change-thumbnail');

    Route::delete('admin/image/delete-image', [AdminController::class, 'deleteImage'])
        ->name('admin.delete-image');



    Route::resource('/admin/categories', CRUDCategories::class)
        ->names('admin.categories');

    Route::resource('/admin/category', CRUDCategories::class)
        ->names('admin.category');


    Route::resource('/admin/specifications', SpecificationsController::class)
        ->names('admin.specifications');
});




