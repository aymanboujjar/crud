<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UtulisateureController;
use Illuminate\Support\Facades\Route;

//*products controllers

Route::get('/product' , [ProductsController::class , "index"]);
Route::post('/product/store' , [ProductsController::class , "store"]);

Route::get('/product/show/{product}', [ProductsController::class, "show"]);
Route::get('/product/edit/{product}', [ProductsController::class, "edit"]);

Route::put('/product/update/{product}', [ProductsController::class, "update"]);

Route::delete('/product/delete/{product}', [ProductsController::class, "destroy"]);




//*todolist controllers

Route::get('/todo', [TodolistController::class, "index"]);
Route::post('/todo/store', [TodolistController::class, "store"]);

Route::delete('/todo/delete/{todolist}', [TodolistController::class, "destroy"]);




//*description controllers

Route::get('a/' , [DescriptionController::class , 'index']);
Route::post('/desc/store' , [DescriptionController::class , 'store']);
Route::delete('/desc/delete/{desc}' , [DescriptionController::class , 'destroy']);
// Route::post('/upload', [ImageController::class,"store"])->name('image.store');
// Route::post('/update-image/{id}', [ImageController::class, 'update'])->name('image.update');
// Route::delete('/delete-image/{id}', [ImageController::class, 'destroy'])->name('image.destroy');


// Route::get('/download-image', [ImageController::class, 'download']);

Route::get('/store' , [StoreController::class , 'index']);
Route::get('/store/form' , [StoreController::class , 'form']);
Route::post('/store/store' , [StoreController::class , 'store']);
Route::delete('/store/destroy/{store}' , [StoreController::class , 'destroy']);
Route::get('/store/content', [StoreController::class, 'filter']);

Route::post('/cards/store', [CardController::class, 'store']);

Route::get('/cart', [CardController::class, 'index'])->name('cart.index');
Route::delete('/cart/{card}', [CardController::class, 'destroy'])->name('card.destroy');


Route::get('/', [AuthorController::class, 'index']);
Route::post('/user/store', [AuthorController::class, 'store']);

Route::get('/posts', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/show/{author}', [AuthorController::class, 'show']);
Route::post('/images', [ImagesController::class, 'store'])->name('images.store');
Route::get('/image', [ImagesController::class, 'index'])->name('images.index');
Route::get('/img', [ImageController::class, 'index'])->name('image.index');
Route::post('/imgs', [ImageController::class, 'store'])->name('image.store');

Route::get('/type', [BookController::class, 'index'])->name('type.index');
Route::post('/book/store', [BookController::class, 'store'])->name('type.index');
























Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('/teacher/store', [TeacherController::class, 'store']);

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);


Route::get('/people', [UtulisateureController::class, 'index']);
Route::post('/people/store', [UtulisateureController::class, 'store']);


Route::get('/events', [EventController::class, 'index'])->name('event.event');
Route::get('/show', [EventController::class, 'show'])->name('event.show');
Route::post('/event/store', [EventController::class, 'store']);













































