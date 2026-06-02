<?php

namespace App\Http\Controllers;
use App\Models\profile;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;




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


     public function updateprofile(Request $request) {


    //ge call ko anay ang mga request galing sa front end
    $fullname = $request->input('fullname');
    $username = $request->input('username');
    $email = $request->input('email');
    $contact = $request->input('contact');
    $address = $request->input('address');
    $current_password = $request->input('current_password');
    $new_password = $request->input('new_password');
    $confirm_password = $request->input('confirm_password'); 

  
    //dapat validation kag string dapat then requires
    $request->validate([
        'fullname' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email'    => ['required', 'string', 'email', 'max:255'],
    ]);

    //hinanap ko ang row ng data gamit ang seassion ID nito at ni store ko sa variable na user
    $user = profile::find(session('user_id'));

    // then if wlang nahanap or naging null ang user then babalik ito na may error flash seassion
    if (!$user) {
        return redirect()->to('/login')->with('error', 'Session expired.');
    }

    //kong wlng na input na filled sa current_password then e update nya ang lahat maliban sa password then balik sa dashboard
    if (! $request->filled('current_password')) {
        
      
        $user->update([
            'name'           => $fullname,      
            'username'       => $username,   
            'email'          => $email,        
            'contact_number' => $contact,      
            'address'        => $address,     
        ]);

        return redirect()
            ->to('/dashboard') 
            ->with('success', 'Profile updated (Password not changed)');

    } else {
        //kong may input nmn ang current_password then e validate nya anf password
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password'     => ['required', 'string', 'min:8'], 
        ]);
        //chaka e verify kong mag tugma ang new password and confirm password, kong hindi ibabalik nya ito sa myprofile tas mag flash session error
        if ($new_password !== $confirm_password) {
            return redirect()
                ->to('/myprofile') 
                ->with('error', 'New password and confirmation password do not match.');
        }

        //if tugma na nga ang password, e compare nya nmn and hashed password chaka inputted current password
        if ($user && Hash::check($current_password, $user->password)) {
            //kong mag tugma e update nya lahat kasali na ang password kasi nga naging true ang layer by layer na condition
            $user->update([
                'name'           => $fullname,
                'username'       => $username,
                'email'          => $email,
                'contact_number' => $contact,
                'address'        => $address,
                'password'       => Hash::make($new_password), 
            ]);
                //then e return ito with success flash session
            return redirect()
                ->to('/dashboard') 
                ->with('success', 'profile updated');
        }
        //then kong di nmn na tangap ang lahat ng conditions magiging flash error na agad
        return redirect()
            ->to('/myprofile') 
            ->with('error', 'Your current password does not match our records.');
    }
     
}

}

    

