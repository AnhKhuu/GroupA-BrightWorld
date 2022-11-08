<?php

use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    dd(session(('cart')));
});

//READ -> http://localhost/GroupA-BrightWorld/public/vwComment
Route::get('/vwComment', 'App\Http\Controllers\feedBack@viewComment');
//CREATE -> http://localhost/GroupA-BrightWorld/public/Comment
Route::get('/Comment','App\Http\Controllers\feedBack@createComment');
Route::post('/commentProcess','App\Http\Controllers\feedBack@commentProcess');
//REPLY -> http://localhost/GroupA-BrightWorld/public/reply
Route::get('/reply/{id}','App\Http\Controllers\feedBack@reply');
Route::post('/replyProcess/{id}','App\Http\Controllers\feedBack@replyProcess');
//DELETE -> http://localhost/GroupA-BrightWorld/public/delete
Route::get('/delete/{id}','App\Http\Controllers\feedBack@delete');
Route::get('/admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/homepage', [ProductController::class, 'index']);
Route::get('/homepage/{id}', [ProductController::class, 'productDetail']);
// Route::get('/homepage', [CartController::class, 'showCart'])->name('user.showCart');

Route::prefix('user')->group(function () {
Route::get('checkout/{id}', [InvoiceController::class, 'checkout'])->name("user.checkout");
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('user.addToCart');
// Route::get('checkout/{id}', [InvoiceController::class, 'checkoutProcess']);
});

Route::prefix('admin')->group(function () {
    Route::get('cart/show', [CartController::class, 'show']);
    Route::get('cart/create', [CartController::class, 'create']);
    Route::post('cart/create', [CartController::class, 'createProcess'])-> name('admin.cart.create');
    Route::get('cart/edit/{id}', [CartController::class, 'update'])-> name('admin.cart.update');
    Route::post('cart/edit/{id}', [CartController::class, 'updateProcess']);

    Route::get('invoice/show', [InvoiceController::class, 'show']);
    Route::get('invoice/create', [InvoiceController::class, 'create']);
    Route::post('invoice/create', [InvoiceController::class, 'createProcess'])-> name('admin.invoice.create');
    Route::get('invoice/edit/{id}', [InvoiceController::class, 'update'])-> name('admin.invoice.update');
    Route::post('invoice/edit/{id}', [InvoiceController::class, 'updateProcess']);
});
// Route::get('/admin/product', [ProductController::class, 'create']) -> name('create');
// Route::get('/admin/catelogue', [CatelogueController::class, 'show']);
// Route::get('/admin/customer', [CustomerController::class, 'show']);
// Route::get('/admin/feedback', [FeedbackController::class, 'show']);
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [ProductController::class, 'show']);

    Route::get('show', [ProductController::class, 'show']);

    Route::get('product', [ProductController::class, 'create']);
    Route::post('product', [ProductController::class, 'createProcess']);

    Route::get('edit/{id}', [ProductController::class, 'update']);
    Route::post('edit/{id}', [ProductController::class, 'updateProcess']);

    Route::get('country', [ProductController::class, 'createCountry']);
    Route::post('country', [ProductController::class, 'createCountryProcess']);

    Route::get('brand', [ProductController::class, 'createBrand']);
    Route::post('brand', [ProductController::class, 'createBrandProcess']);

    Route::get('type', [ProductController::class, 'createType']);
    Route::post('type', [ProductController::class, 'createTypeProcess']);

    Route::get('sale', [ProductController::class, 'createSale']);
    Route::post('sale', [ProductController::class, 'createSaleProcess']);

    Route::get('watt', [ProductController::class, 'createWatt']);
    Route::post('watt', [ProductController::class, 'createWattProcess']);

    Route::get('shape', [ProductController::class, 'createShape']);
    Route::post('shape', [ProductController::class, 'createShapeProcess']);
});
// Route::get('/', [CartController::class, 'index']);

