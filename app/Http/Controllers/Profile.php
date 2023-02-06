<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\products;
use App\Models\categories;
use App\Models\products_classified;

class Profile extends Controller
{
    public function ProfilePage(){
        $data = [
            'categoriesList' => categories::all()->where('user_id', Auth::user()->id),
            'productsList' => products::join('products_classified' , 'products_classified.product_id','=' , 'products.id')->
                join('categories', 'categories.id' , '=' , 'products_classified.category_id')->
                select('products.id', 'categories.name as category' , 'products.name as product')->
                where('products.user_id', Auth::user()->id)->get()
        ];
        return view('profile' , $data); 
    }

    public function DeleteAll(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        products_classified::where('user_id' , Auth::user()->id)->delete(); 
        products::where('user_id' , Auth::user()->id)->delete(); 
        categories::where('user_id' , Auth::user()->id)->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect('profile');
    }
}
