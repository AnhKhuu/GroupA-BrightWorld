<?php

use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
Route::get('/', [CartController::class, 'index']);

