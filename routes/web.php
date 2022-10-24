<?php

use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
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
    return view('index');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [ProfileController::class, 'dashboard']);
    Route::get('product', [ProductController::class, 'create']);
    Route::post('product', [ProductController::class, 'createProcess']);
    Route::get('country', [ProductController::class, 'createCountry']);
    Route::post('country', [ProductController::class, 'createCountryProcess']);
    Route::get('catelogue', [CatelogueController::class, 'show']);
    Route::get('customer', [CustomerController::class, 'show']);
    Route::get('feedback', [FeedbackController::class, 'show']);
});
Route::get('/', [CartController::class, 'index']);

