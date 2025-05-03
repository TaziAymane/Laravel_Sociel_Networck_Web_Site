<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('components.login');
    }

    public function login(Request $request)
    {
        $email = $request->email ;
        $password = $request->password ;
        $credentials = [
            'email'=>$email ,
            'password'=>$password
        ];

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route('homePage')->with('success','vous etes bien connecter ' . $email." .");
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login');


    }
}