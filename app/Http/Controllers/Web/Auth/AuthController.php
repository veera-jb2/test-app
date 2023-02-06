<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function denied(){
        return view('error.403');
    }

    public function logout()
    {
      Auth::guard('web')->logout();
      return response()->json(['message'=>'success']);
    }
}
