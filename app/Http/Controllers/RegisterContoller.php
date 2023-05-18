<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;

class RegisterContoller extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store()
    {
        // dd(request()->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'contact_no' => 'required',
            'home_address' => 'required',
            'password' => 'required|min:3|confirmed',
        ]);

        if($user)
        {
            $user_login = User::create($user);
            auth()->login($user_login);
            return redirect('/register/user_view')->with('success','User Saved Successfully');
        }else{
            return redirect('/register/view')->with('error','User Not Saved');
        }

    }

    public function user_view()
    {
        return view('register.view',['users_details' => UserDetails::all()]);
    }
    public function user_add()
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        UserDetails::updateOrCreate([
            'id' => request()->id ?? 0
        ],[
            'name' => $user['name'],
            'email' => $user['email'],
            'address' => $user['address']
        ]);

        return back()->with('success','Successfully Data Stored');
    }
    public function user_edit(UserDetails $UserDetails)
    {
        return $UserDetails;
    }
    public function user_delete(UserDetails $UserDetails)
    {
        if($UserDetails)
        {
            $UserDetails->delete();
            return back()->with('success','Record Deleted Successfully');
        }else{
            return back()->with('error','Record Not Deleted');
        }
    }
}
