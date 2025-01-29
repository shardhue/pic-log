<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'Register']);
Route::post('/logout', [UserController::class, 'LogOut']);
Route::post('/login', [UserController::class, 'LogIn']);
Route::get('/blog', [UserController::class, 'ViewBlog']);

Route::post('/createpost', [PostController::class, 'CreatePost']);
Route::get('/editpost/{post}', [PostController::class, 'EditPost']);
Route::put('/editpost/{post}', [PostController::class, 'SavePost']);
Route::delete('/deletepost/{post}', [PostController::class, 'DeletePost']);
