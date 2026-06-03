<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    function register(Request $request){
        
     $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'contact_number' => 'required|string',
        'address' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
     ]);

     profile::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'contact_number' => $request->contact_number,
        'address' => $request->address,
        'password' => Hash::make($request->password)
     ]);

  
        return redirect()->to('/login')->with('success', 'Account created successfully! Please login.');
     
    }


    public function login(Request $request){
   
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        

       if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')
            ->with('success', 'Welcome back!');
       }

       
        return redirect()
            ->to('/login') 
            ->with('error', 'Invalid email or password. Please try again.') 
            ->withInput($request->only('email')); 
   }


  public function logout(){
        Session::forget('user_id');
        Session::flush();
        return redirect()->to('/login')->with('successlogout', 'Success logout!');
        }
}
