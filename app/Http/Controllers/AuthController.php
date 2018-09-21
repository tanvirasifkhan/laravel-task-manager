<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

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
                return redirect()->intended(route('dashboard'))->with('message','Welcome back !');
            }else{
                return redirect()->route('auth.login')->with('message','Login failed !Email/Password is incorrect !');
            }
        }
    }

    public function logout(){  
        Auth::logout(); 
        return redirect()->route('auth.login')->with('success_message','Successfully Logged out !');       
    }
}
