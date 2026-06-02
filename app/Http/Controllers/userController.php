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
}
