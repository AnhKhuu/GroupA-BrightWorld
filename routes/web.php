<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//READ -> http://localhost/GroupA-BrightWorld/public/viewComment
Route::get('/viewComment', 'App\Http\Controllers\feedBack@viewComment');
//CREATE -> http://localhost/GroupA-BrightWorld/public/comment
Route::get('/comment','App\Http\Controllers\feedBack@comment');
Route::post('/commentProcess','App\Http\Controllers\feedBack@commentProcess');
//REPLY -> http://localhost/GroupA-BrightWorld/public/reply
Route::get('/reply/{id}','App\Http\Controllers\feedBack@reply');
Route::post('/replyProcess/{id}','App\Http\Controllers\feedBack@replyProcess');
//DELETE -> http://localhost/GroupA-BrightWorld/public/delete
Route::get('/delete/{id}','App\Http\Controllers\feedBack@delete');