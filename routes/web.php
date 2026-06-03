<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Session;
use App\Models\profile;
use App\Models\author;




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







Route::get('/myprofile', function () {
    $user = auth()->user();
    return view('myprofile', compact('user'));
})->name('myprofile');


Route::post('/saveprofile', [userController::class, 'updateprofile'])->name('myprofile');


Route::get('/mysettings', function () {
    return view('mysettings');
})->name('mysettings');


//for crud



Route::get('/books', [userController::class, 'index'])->name('books');

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


/////////////////////////////
//for crud

Route::get('/movies', [MovieController::class, 'index'])->name('movies');

Route::post('/movies/store', [MovieController::class, 'store'])
->name('store.create');

Route::get('/movies/create', [MovieController::class, 'create'])
->name('movies.create');

Route::post('/movies/store', [MovieController::class, 'store'])
->name('movies.store');

Route::get('/movies/edit/{id}', [MovieController::class, 'edit'])
->name('movies.edit');

Route::post('/movies/update/{id}', [MovieController::class, 'update'])
->name('movies.update');

Route::delete('/movies/delete/{id}', [MovieController::class, 'destroy'])
->name('movies.delete');
/////////////////////////////
//author
Route::get('/author', function () {
    $data = author::paginate(10);
    
    return view('author', compact('data'));
})->name('author');


Route::delete('/author/delete/{id}', [userController::class, 'destroy_author'])
->name('destroy_author.delete');

Route::get('/author/edit/{id}', [userController::class, 'edit_author'])
->name('edit.edit');

Route::post('/author/update/{id}', [userController::class, 'updateauthor'])
->name('author.update');

Route::post('/author/store', [userController::class, 'store_author'])
->name('author.store');

Route::get('/author/create', [userController::class, 'author_create'])
->name('author.create');






Route::get('/logout', [AuthController::class, 'logout'])
->name('logout');





