<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginContoller extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login()
    {
        $user = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($user))
        {
            session()->regenerate();
            return redirect('/product/view')->with('success','User Loged In Successfully');
        }else{
            return back()->withErrors(['email' =>'Provided Credential are not matched']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success','Successfully Loged Out');
    }
}
