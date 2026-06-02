<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login' , [userController::class, 'login']);


Route::get('/books', [userController::class, 'index']);






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









