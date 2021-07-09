<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;


Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.slug');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
