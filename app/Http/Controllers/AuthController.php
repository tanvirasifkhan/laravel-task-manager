<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // show the login form
    public function login(){
        return view('auth.login');
    }

    // authenticate the user
    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('auth.login')->withErrors($validators)->withInput();
        }else{
            $email=$request->email;
            $password=$request->password;

            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect()->intended('/');
            }else{
                return redirect()->route('auth.login')->with('message','Email/Password is incorrect !');
            }
        }
    }
}
