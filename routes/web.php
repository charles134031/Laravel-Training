<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login' , [AuthController::class, 'login']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');

Route::get('/books', function () {
    return view('books');
})->name('books');

Route::get('/myprofile', function () {
    return view('myprofile');
})->name('myprofile');

Route::get('/mysettings', function () {
    return view('mysettings');
})->name('mysettings');







