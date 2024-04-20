<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function store(LoginRequest $request)  {
        if(Auth::attempt($request->validated())){
            return redirect()->route('home');
        }else{
            return redirect()->route('loginForm')->with('error','Invalid email or password!');
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('loginForm');
        }else{
            return redirect()->route('home');
        }
    }
}
