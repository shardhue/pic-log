<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class, 'Register']);
Route::post('/logout', [UserController::class, 'LogOut']);
Route::post('/login', [UserController::class, 'LogIn']);

Route::post('/createpost', [PostController::class, 'CreatePost']);
