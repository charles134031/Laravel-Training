<?php

namespace App\Http\Controllers;
use App\Models\profile;
use App\Models\author;
use App\Models\Book;
use App\Models\movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;


class MovieController extends Controller
{
    public function index(){
        

       $data = movies::with('author')->paginate(5);
      
        return view('movies',compact('data'));

    }

    public function destroy($id){
      movies::findOrFail($id)->delete();
 
        return redirect()
        ->route('movies')
        ->with('success', 'Book deleted successfully.');
    }

    public function create(){
         $authors = Author::orderBy('name')->get();

    return view('movies_form', compact('authors'));
    }

  public function store(Request $request)
{
    // 1. I-validate ang input
    $validatedData = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required',
        'author_id'   => 'required|integer|exists:author,id',
        'synopsis'    => 'required',
        'cover_image' => 'nullable|image|max:2048' // Siguraduhin na 'cover_image' ang name sa form
    ]);

    // 2. I-handle ang file upload (GAMITIN ang $validatedData para sa logic)
    if ($request->hasFile('cover_image')) {
    // 1. I-store ang file sa 'movies' folder
    $path = $request->file('cover_image')->store('movies', 'public');
    
    // 2. Gamitin ang basename() para makuha lang ang file name (tinatanggal ang 'movies/')
    $filename = basename($path);
    
    // 3. I-save lang ang filename sa database
    $validatedData['cover_image'] = $filename;
}
    // 3. I-save sa database gamit ang $validatedData
    // HUWAG gamitin ang $request->all() dahil baka may extra input na hindi sa table
    \App\Models\movies::create($validatedData);

    return redirect()
        ->route('movies')
        ->with('success', 'Movie added successfully.');
}

}
