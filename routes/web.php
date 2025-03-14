<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index/{page}", [BlogController::class, 'index'])->name('blog.home');
Route::get("/people/{id}", [PostController::class, 'readPost'])->name('blog.people');
Route::get("/films/{id}", [MovieController::class, "readMovie"])->name('blog.movie');


//form route
Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');
Route::delete('/comment', [CommentController::class, 'delete'])->name('comment.delete');
Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
