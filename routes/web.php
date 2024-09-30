<?php

use App\Http\Middleware\UserRole;
use App\Http\Controllers\{AuthorController, CommentController, HomeController, PostController, UserController};
use Illuminate\Support\Facades\Route;

Route::middleware([UserRole::class])->group(function () {
    Route::get('/admin', [PostController::class, 'admin']);
    Route::get('/admin/posts/create', [PostController::class, 'create']);

    Route::get('/admin/authors', [AuthorController::class, 'index']);
    Route::get('/admin/authors/create', [AuthorController::class, 'create']);
    Route::post('/admin/authors', [AuthorController::class, 'store']);

    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy']);

    Route::get('/authors/{author}/edit', [AuthorController::class, 'edit']);
    Route::patch('/authors/{author}', [AuthorController::class, 'update']);
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/comment/{post}', [CommentController::class, 'store'])->middleware('auth');
Route::get('/comment/{post}/{comment}/edit', [PostController::class, 'show'])->middleware('auth');
Route::patch('/comment/{post}/{comment}', [CommentController::class, 'update'])->middleware('auth');
Route::delete('/comment/{post}/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'signIn']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('users/{user}', [UserController::class, 'show'])->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

Route::patch('/user/photo', [UserController::class, 'updatePhoto'])->middleware('auth');
