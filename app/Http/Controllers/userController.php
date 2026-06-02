<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(Request $request){
        
        //security for empty request 
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);


    }

    public function index(){

       $data = Book::paginate(10);
        
        return view('books',compact('data'));

    }


    public function create()
    {
      return view('books_form');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'author' => 'required',
        'genre' => 'required',
        'published_year' => 'required'
    ]);

  

    Book::create($request->all());

        return redirect()
        ->route('books')
        ->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books_form', compact('book'));
    }

    public function update(Request $request, $id)
    {
    $book = Book::findOrFail($id);

    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'genre' => $request->genre,
        'published_year' => $request->published_year,
    ]);

    return redirect()
        ->route('books')
        ->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
    Book::findOrFail($id)->delete();

        return redirect()
        ->route('books')
        ->with('success', 'Book deleted successfully.');
    }
}
