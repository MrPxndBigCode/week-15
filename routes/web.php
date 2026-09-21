<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\BlogController;

// routes/web.php
Route::get('/', [BlogController::class, 'index']);
Route::get('detail/{id}',[BlogController::class,'detail']);

Route::get('abouts',[AdminController::class , 'abouts'])->name("abouts");



Route::prefix('author')->group(function (){

Route::get('blogs',[AdminController::class , 'blogs'])->name("blogs");
Route::get('form',[AdminController::class , 'form'])->name("form");
Route::get('create',[AdminController::class, 'create'])->name('create');

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);

Route::post('/create',[AdminController::class, 'insert']);
Route::post('/form/insert',[AdminController::class, 'insert'])->name('insert');
Route::get('/delete/{id}',[AdminController::class, 'delete'])->name('delete');
Route::get('/change/{id}',[AdminController::class, 'change'])->name('change');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');

});

Route::redirect('/blogs', '/author/blogs');
Route::redirect('/form', '/author/create');
Route::post('/form/insert', [AdminController::class, 'insert']);
Route::post('/create', [AdminController::class, 'insert']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
