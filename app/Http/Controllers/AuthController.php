<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
     
      try{
            // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);


        $path = $request->file('image')->store('images', 'public');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $path,
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('login')->with('success', 'Registration successful! Welcome.');
      }
      catch(\Exception $e){
        return redirect()->back()->withErrors(['error' => 'Registration failed! '.$e->getMessage()])->withInput();
      }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       try{
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Attempt to log the user in
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('posts.index')->with('success', 'Login successful!');
            }

            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
       }
       catch(\Exception $e){
        return redirect()->back()->withErrors(['error' => 'Login failed! '.$e->getMessage()])->withInput();
       }
    }

   
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
