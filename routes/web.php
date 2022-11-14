<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('test', function () {
    dd(session(('cart')));
});

Route::get('/search-product', [ProductController::class, 'search']);
// Route::get('/test', [ProductController::class, 'test']);

//READ -> http://localhost/GroupA-BrightWorld/public/vwComment
Route::get('/vwComment', 'App\Http\Controllers\feedBack@viewComment');
//CREATE -> http://localhost/GroupA-BrightWorld/public/Comment
Route::get('/Comment', 'App\Http\Controllers\feedBack@createComment');
Route::post('/commentProcess', 'App\Http\Controllers\feedBack@commentProcess');
//REPLY -> http://localhost/GroupA-BrightWorld/public/reply
Route::get('/reply/{id}', 'App\Http\Controllers\feedBack@reply');
Route::post('/replyProcess/{id}', 'App\Http\Controllers\feedBack@replyProcess');
//DELETE -> http://localhost/GroupA-BrightWorld/public/delete
Route::get('/delete/{id}', 'App\Http\Controllers\feedBack@delete');
Route::get('/admin/login', function () {
    return view('admin.auth.login');
});
// Route::get('/admin/login', function () {
//     return view('admin.auth.login');
// });

// Route::get('/homepage', [ProductController::class, 'index']);
Route::get('/homepage/{id}', [ProductController::class, 'productDetail']);
// Route::get('/homepage', [CartController::class, 'showCart'])->name('user.showCart');

Route::prefix('user')->group(function () {
    Route::get('checkout/{id}', [InvoiceController::class, 'checkout'])->name("user.checkout");
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('user.addToCart');
    // Route::get('checkout/{id}', [InvoiceController::class, 'checkoutProcess']);
    Route::post('checkout/create', [InvoiceController::class, 'checkoutProcess'])->name('user.checkout.create');


    // Route::get('checkout/{id}', [InvoiceController::class, 'checkoutProcess']);
    // Route::get('checkout/{id}', [InvoiceController::class, 'checkoutProcess']);
});

// ADMIN/LOGIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'login'])->middleware('checkAdminLogout');
    Route::post('/', [AdminController::class, 'checkLogin']);
    Route::get('logout', [AdminController::class, 'logout']);
    Route::get('home', [AdminCustomerController::class, 'index'])->name('home')->middleware('checkAdminLogin');
Route::get('checkout/{id}', [InvoiceController::class, 'checkout'])->name("user.checkout");
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('user.addToCart');
// Route::get('checkout/{id}', [InvoiceController::class, 'checkoutProcess']);
});

Route::get('homepage/Add-Cart/{id}/{saleId}', [CartController::class, 'AddCart']);
Route::get('homepage/Delete-Item-Cart/{id}', [CartController::class, 'DeleteItemCart']);
Route::get('List-Carts', [CartController::class, 'ViewListCart']);
Route::get('Delete-Item-List-Cart/{id}', [CartController::class, 'DeleteListItemCart']);
Route::get('Save-Item-List-Cart/{id}/{quanty}/{saleId}', [CartController::class, 'SaveListItemCart']);

Route::prefix('homepage')->group(function () {
    Route::get('country/{id}', [ProductController::class, 'showByCountry']);
    Route::get('brand/{id}', [ProductController::class, 'showByBrand']);
    Route::get('shape/{id}', [ProductController::class, 'showByShape']);
    Route::get('type/{id}', [ProductController::class, 'showByType']);
    Route::get('watt/{id}', [ProductController::class, 'showByWatt']);
});

Route::prefix('admin')->group(function () {
    Route::get('feedback/show', [FeedbackController::class, 'show']);
    Route::get('feedback/create', [FeedbackController::class, 'create']);
    Route::post('feedback/createProcess', [FeedbackController::class, 'createProcess']);
    Route::get('feedback/update/{id}', [FeedbackController::class, 'update']);
    Route::post('feedback/updateProcess/{id}', [FeedbackController::class, 'updateProcess']);
    Route::get('feedback/showAll', [FeedbackController::class, 'showAll']);
    Route::get('feedback/showReply', [FeedbackController::class, 'showReply']);
    // Route::post('feedback/createDetail/{id, cusId}', [FeedbackController::class, 'createDetail']);

});

Route::prefix('admin')->group(function () {

    Route::get('cart/show', [CartController::class, 'show']);
    Route::get('cart/create', [CartController::class, 'create']);
    Route::post('cart/create', [CartController::class, 'createProcess'])->name('admin.cart.create');
    Route::get('cart/edit/{id}', [CartController::class, 'update'])->name('admin.cart.update');
    Route::post('cart/edit/{id}', [CartController::class, 'updateProcess']);

    Route::get('invoice/show', [InvoiceController::class, 'show']);
    Route::get('invoice/create', [InvoiceController::class, 'create']);
    Route::post('invoice/create', [InvoiceController::class, 'createProcess'])->name('admin.invoice.create');
    Route::get('invoice/edit/{id}', [InvoiceController::class, 'update'])->name('admin.invoice.update');
    Route::post('invoice/edit/{id}', [InvoiceController::class, 'updateProcess']);
});
// Route::get('/admin/product', [ProductController::class, 'create']) -> name('create');
// Route::get('/admin/catelogue', [CatelogueController::class, 'show']);
// Route::get('/admin/customer', [CustomerController::class, 'show']);
// Route::get('/admin/feedback', [FeedbackController::class, 'show']);

Route::prefix('admin')->group(function () {

    Route::get('product', [ProductController::class, 'show']);
    Route::get('product/create', [ProductController::class, 'create']);
    Route::post('product/create', [ProductController::class, 'createProcess']);

    Route::get('product/edit/{id}', [ProductController::class, 'update']);
    Route::post('product/edit/{id}', [ProductController::class, 'updateProcess']);

    Route::get('product/delete/{id}', [ProductController::class, 'deleteProcess']);

    Route::get('country/create', [ProductController::class, 'createCountry']);
    Route::post('country/create', [ProductController::class, 'createCountryProcess']);

    Route::get('brand/create', [ProductController::class, 'createBrand']);
    Route::post('brand/create', [ProductController::class, 'createBrandProcess']);

    Route::get('type/create', [ProductController::class, 'createType']);
    Route::post('type/create', [ProductController::class, 'createTypeProcess']);

    Route::get('sale/create', [ProductController::class, 'createSale']);
    Route::post('sale/create', [ProductController::class, 'createSaleProcess']);

    Route::get('watt/create', [ProductController::class, 'createWatt']);
    Route::post('watt/create', [ProductController::class, 'createWattProcess']);

    Route::get('shape/create', [ProductController::class, 'createShape']);
    Route::post('shape/create', [ProductController::class, 'createShapeProcess']);

// customer -> listCust
Route::get('admin/customer', [CustomerController::class, 'listCust']);
    // customer -> listCust
    Route::get('customer/listCust', [CustomerController::class, 'listCust']);

    // customer -> create
    Route::get('customer/create', [CustomerController::class, 'create']);
    Route::post('customer/create', [CustomerController::class, 'createProcess']);

    // customer -> update
    Route::get('customer/update/{id}', [CustomerController::class, 'update']);
    Route::post('customer/update/{id}', [CustomerController::class, 'updateProcess']);


// customer -> delete
Route::get('admin/customer/delete/{id}', [CustomerController::class, 'delete']);

// customer -> main function
Route::prefix('/')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/login', [CustomerController::class, 'checkLogin']);
    Route::get('/signin', [CustomerController::class, 'login']);
    Route::get('/register', [CustomerController::class, 'create']);
    Route::post('/customer/createProcess', [CustomerController::class, 'createProcess']);
    Route::get('/editProfile/{id}', [CustomerController::class, 'view']);
    Route::post('/customer/updateProcess/{id}', [CustomerController::class, 'updateProcess']);
    Route::get('/logout', [CustomerController::class, 'logout']);

    // Route::post('/', [AdminController::class, 'checkLogin']);
    // Route::get('logout', [AdminController::class, 'logout']);
    // Route::get('home', [AdminCustomerController::class, 'index'])
});
    // customer -> delete
    Route::get('customer/delete/{id}', [CustomerController::class, 'delete']);
});
