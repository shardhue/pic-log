<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('home', ['posts' => $posts]);
});

Route::get('/blog/{user}', function(User $user) {
    $posts = $user->usersPosts()->latest()->get();
    return view('blog', ['user' => $user, 'posts' => $posts]);
});

Route::get('/login', [UserController::class, 'ShowLogIn']);
Route::get('/signup', [UserController::class, 'ShowSignUp']);
Route::post('/register', [UserController::class, 'Register']);
Route::post('/logout', [UserController::class, 'LogOut']);
Route::post('/login', [UserController::class, 'LogIn']);

Route::get('/createpost', [PostController::class, 'ShowCreatePost']);
Route::post('/createpost', [PostController::class, 'CreatePost']);
Route::get('/editpost/{post}', [PostController::class, 'EditPost']);
Route::put('/editpost/{post}', [PostController::class, 'SavePost']);
Route::delete('/deletepost/{post}', [PostController::class, 'DeletePost']);
