<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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







