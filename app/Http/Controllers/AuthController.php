<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // show the login form
    public function login(){
        return view('auth.login');
    }
}
