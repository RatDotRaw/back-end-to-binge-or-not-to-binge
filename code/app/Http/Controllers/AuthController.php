<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    function login(Request $request) // login user
    {
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials )) {
            $request->session()->regenerate();

            // set session variable
            session(['user' => Auth::user()]);

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(Request $request) // logout user
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login');
    }

    function store(Request $request) // store user // create account in simple words
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $encryptedPassword = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; // $encryptedPassword;
        $user->save();

        session()->flash('success', 'Your account was created successfully.');

//        return redirect()->route('users.login');

        // login user after registration
        Auth::login($user);
        return redirect()->route('home');

        // Auth::user() // will give you the currently logged in user. Use that code to test if your login works.
    }
}
