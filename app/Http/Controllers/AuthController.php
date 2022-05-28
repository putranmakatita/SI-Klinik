<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function login(){
        return view('login', [
            "title" => "Login"

        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public static function auth(Request $request){
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential)){

            return redirect()->intended('/home');

        }


        return back()->with('loginError', 'Credentials failed!');
    }
}
