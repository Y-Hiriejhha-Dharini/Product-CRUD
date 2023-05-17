<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {

    }

    public function delete()
    {
        
    }
}
