<?php

use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\RegisterContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LoginContoller::class,'index']);

Route::prefix('login')->group(function(){
    Route::post('/login',[LoginContoller::class,'login']);
    Route::post('/logout',[LoginContoller::class,'logout']);
});

Route::prefix('register')->group(function(){
    Route::get('/view',[RegisterContoller::class,'index']);
    Route::post('/store',[RegisterContoller::class,'store']);
});

Route::prefix('product')->group(function(){
    Route::get('/view',[ProductContoller::class,'index']);
    Route::post('/add',[ProductContoller::class,'create']);
    Route::post('/delete',[ProductContoller::class,'delete']);
});
