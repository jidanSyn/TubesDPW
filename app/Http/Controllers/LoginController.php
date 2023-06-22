<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login() {
        return view('login.login');
    }

    public function authenticate(Request $request) {
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');

    }

    public function register() {
        return view('login.register');
    }

    public function create(Request $request) {
        // dd($request->all());
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:255|unique:users',
            'email' => 'required|email|unique:users',   //email:dns for tighter
            'password' => 'required|min:8|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login.');

        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
