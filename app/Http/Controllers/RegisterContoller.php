<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterContoller extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function register()
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'contact_no' => 'required',
            'home_address' => 'required',
            'password' => 'required| min:3',
        ]);

        if($user)
        {
            $user_login = User::create($user);
            auth()->login($user_login);
            return redirect('/view')->with('success','User Saved Successfully');
        }else{
            return redirect('/register')->with('error','User Not Saved');
        }

    }
}
