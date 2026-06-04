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
    // 1. Kunin ang original file name
    $originalName = $request->file('cover_image')->getClientOriginalName();
    
    // 2. I-store ang file gamit ang orihinal na pangalan sa 'movies' folder
    // Ang path ay magiging 'movies/filename.jpg'
    $path = $request->file('cover_image')->storeAs('movies', $originalName, 'public');
    
    // 3. I-save ang full path sa database
    $validatedData['cover_image'] = $path;
}
    // 3. I-save sa database gamit ang $validatedData
    // HUWAG gamitin ang $request->all() dahil baka may extra input na hindi sa table
    \App\Models\movies::create($validatedData);

    return redirect()
        ->route('movies')
        ->with('success', 'Movie added successfully.');
}


        public function update($id, Request $request){
            dd($request->all());
        }

        public function edit($id){
            
            $data = movies::with('author')->findOrFail($id);
            $authors = Author::orderBy('name')->get();

           

            return view('movies_form', compact('data', 'authors'));
        }

        public function updatemovies($id, Request $request){
            // 1. I-validate ang input
            $validatedData = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required',
                'author_id'   => 'required|integer|exists:author,id',
                'synopsis'    => 'required',
                'cover_image' => 'nullable|image|max:2048' 
            ]);

            // 2. I-handle ang file upload kung meron
            if ($request->hasFile('cover_image')) {
                //compare and delete old file
                $movie = movies::findOrFail($id);
                if ($movie->cover_image && $movie->cover_image 
                !== $request->file('cover_image')->getClientOriginalName()) {
                    //delete old file
                    \Storage::disk('public')->delete($movie->cover_image);
                }

                //store new file
                $originalName = $request->file('cover_image')->getClientOriginalName();
                $path = $request->file('cover_image')->storeAs('movies', $originalName, 'public');
                $validatedData['cover_image'] = $path;

                //if delete success update new data to database
                $movie->update($validatedData);
            } else {
                //if no new file just update other data
                $movie = movies::findOrFail($id);
                $movie->update($validatedData);
            }

            return redirect()
                ->route('movies')
                ->with('success', 'Movie updated successfully.');

        }
        
}   
