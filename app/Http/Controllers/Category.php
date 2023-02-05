<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Category extends Controller
{
    public function AddCategoryPage()
    {
        return view('category');
    }

}
