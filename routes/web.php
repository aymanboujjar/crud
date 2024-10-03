<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StoreController;
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

Route::get('/' , [DescriptionController::class , 'index']);
Route::post('/desc/store' , [DescriptionController::class , 'store']);
Route::delete('/desc/delete/{desc}' , [DescriptionController::class , 'destroy']);
Route::post('/upload', [ImageController::class,"store"])->name('image.store');
Route::post('/update-image/{id}', [ImageController::class, 'update'])->name('image.update');
Route::delete('/delete-image/{id}', [ImageController::class, 'destroy'])->name('image.destroy');


Route::get('/download-image', [ImageController::class, 'download']);

Route::get('/store' , [StoreController::class , 'index']);
Route::get('/store/form' , [StoreController::class , 'form']);
Route::post('/store/store' , [StoreController::class , 'store']);
Route::delete('/store/destroy/{store}' , [StoreController::class , 'destroy']);
Route::get('/store/content', [StoreController::class, 'filter']);

Route::post('/cards/store', [CardController::class, 'store']);

Route::get('/cart', [CardController::class, 'index'])->name('cart.index');
Route::delete('/cart/{card}', [CardController::class, 'destroy'])->name('card.destroy');