<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use App\Models\profile;




Route::post('/register' , [AuthController::class, 'register'])->name('register');
Route::get('/register', function(){
return view('register');
})->name('register');

//login
Route::get('/login', function(){
    
    return view('login');
   
})->name('login')->middleware('guest');


Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/books', [userController::class, 'index'])->name('books');






Route::get('/dashboard', function () {
   
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');





Route::get('/myprofile', function () {
  
    

    $user = auth()->user();

    return view('myprofile', compact('user'));
})->name('myprofile');


Route::post('/saveprofile', [userController::class, 'updateprofile'])->name('myprofile');


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



Route::get('/logout', [AuthController::class, 'logout'])
->name('logout');





