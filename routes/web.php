<?php

use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/homepage', function() {
    return view('user.index');
});
Route::get('/admin/cart/show', [CartController::class, 'show'])->name('admin.cart.show');
Route::get('/admin/cart/create', [CartController::class, 'create']);
Route::post('/admin/cart/store', [CartController::class, 'store'])->name('admin.cart.store');

Route::get('/admin/invoice/show', [InvoiceController::class, 'show'])->name('admin.invoice.show');
Route::get('/admin/invoice/create', [InvoiceController::class, 'create']);
Route::post('/admin/invoice/store', [InvoiceController::class, 'store'])->name('admin.invoice.store');


Route::get('/admin/dashboard', [ProfileController::class, 'dashboard']) -> name('dashboard');
Route::get('/admin/product', [ProductController::class, 'create']) -> name('create');
Route::get('/admin/catelogue', [CatelogueController::class, 'show']);
Route::get('/admin/customer', [CustomerController::class, 'show']);
Route::get('/admin/feedback', [FeedbackController::class, 'show']);

Route::prefix('products')->name('products')->group(function () {
    // Route::get('index', 'ProductController@index')->name('.index');
    Route::get('create', 'ProductController@create');
    Route::post('create', 'ProductController@store');
    // Route::get('edit/{id}', 'ProductController@edit');
    // Route::post('edit/{id}', 'ProductController@update');
    // Route::get('delete/{id}', 'ProductController@destroy');
});

