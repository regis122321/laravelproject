<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

=======
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
>>>>>>> 25a43bf7ef333511427cc652acef3c2ecb725a08
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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});
=======
Route::get('/', [PageController::class,'index']);


Route::resource('/blog', PostController::class);
Auth::routes();
Route::post('/blog/{id}',[PostController::class,'update'] );
Route::get('/home', [PageController::class, 'index'])->name('home');
>>>>>>> 25a43bf7ef333511427cc652acef3c2ecb725a08
