<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login' , [userController::class, 'login']);


Route::get('/books', [userController::class, 'index'])->name('books');;






Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');



Route::get('/myprofile', function () {
    return view('myprofile');
})->name('myprofile');

Route::get('/mysettings', function () {
    return view('mysettings');
})->name('mysettings');


//for crud
Route::get('/books/create', [userController::class, 'create'])
->name('books.create');

Route::post('/books/store', [userController::class, 'store'])
->name('books.store');

Route::get('/books/edit/{id}', [userController::class, 'edit'])
->name('books.edit');

Route::post('/books/update/{id}', [userController::class, 'update'])
->name('books.update');

Route::delete('/books/delete/{id}', [userController::class, 'destroy'])
->name('books.delete');







