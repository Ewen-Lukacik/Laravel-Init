<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index/{page}", [BlogController::class, 'index'])->name('blog.home');
Route::get("/people/{id}", [PostController::class, 'readPost'])->name('blog.people');
Route::get("/films/{id}", [MovieController::class, "readMovie"])->name('blog.movie');
Route::get("/vehicles/{id}", [VehicleController::class, "readVehicle"])->name('blog.vehicle');
Route::get("/species/{id}", [SpecieController::class, "readSpecies"])->name('blog.species');


//form route
Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');
Route::delete('/comment', [CommentController::class, 'delete'])->name('comment.delete');
Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.update');
