<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends Controller
{
    public function AddProductPage()
    {
        return view('product'); 
    }
}
