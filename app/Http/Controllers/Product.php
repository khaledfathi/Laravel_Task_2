<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\categories; 
use App\Models\products; 
use App\Models\products_classified; 

class Product extends Controller
{
    public function AddProductPage()
    {
        $categories = categories::where('user_id' , Auth::user()->id)->get();
        return view('product' , ['categories'=>$categories]); 
    }

    public function SaveProduct(Request $request)
    {
        if ($request->name == NULL){
            return redirect('products/addproduct')->with(['ProductMsg'=>'Product Name filed is required!']); 
        }
        if ($request->categories == NULL){
            return redirect('products/addproduct')->with(['ProductMsg'=>'Category filed is required!']); 
        }
        $isProductExsist = products::where('name', $request->name)->where('user_id' , Auth::user()->id)->count();
        if ($isProductExsist) {
            return redirect('products/addproduct')->with(['ProductMsg'=> "Product '$request->name' is Dupliacted!"]); 
        };
        products::create([
            'name'=> $request->name, 
            'user_id'=> Auth::user()->id
        ]);
        
        $product_id = products::first()->where('name', $request->name)->get()[0]['id'];
        foreach ($request->categories as $category_id){
            products_classified::create([
                'category_id'=>$category_id,
                'product_id'=>$product_id,
                'user_id'=>Auth::user()->id
            ]); 
        }
        return redirect('products/addproduct')->with(['ProductMsg']); 
    }

    public function DeleteProduct(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); 
        products::find($request->id)->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
        return redirect('profile'); 
    }

    public function UpdateProductPage(Request $request)
    {
        return "Update Product <br><br><a href='/'>HomePage</a>";  
    }
}
