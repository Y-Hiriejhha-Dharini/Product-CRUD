<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginContoller extends Controller
{
    public function index()
    {
        return view('login.login');
    }
}
