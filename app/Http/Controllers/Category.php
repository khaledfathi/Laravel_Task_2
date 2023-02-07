<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\products;
use App\Models\products_classified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    public function AddCategoryPage()
    {
        return view('category');
    }

    public function SaveCategory (Request $request){
        if ($request->name==NULL){
            return redirect('categories/addcategory')->with(['category_msg'=>'Category Name filed is required']); 
        }
        $isUnique = DB::table('categories')->select('name', 'user_id')->where('name' , $request->name)->where('user_id', Auth::user()->id)->count();
        if($isUnique){
            return redirect('categories/addcategory')->with(['category_msg'=>"Category '$request->name' is duplicated!"]); 
        } 
        categories::create(
            [
                'name'=> $request->name, 
                'description'=>$request->description,
                'user_id'=>Auth::user()->id 
            ]
        );
        
        return redirect('categories/addcategory'); 
    }
    public function DeleteCategory(Request $request)
    {
        
        $product_ids = products_classified::where('category_id', $request->id)->
            where('user_id', Auth::user()->id)->get('product_id');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($product_ids as $id ){
            products::where('id' , $id->product_id)->where('user_id' ,Auth::user()->id)->delete(); 
        }
        categories::where('id' , $request->id)->where('user_id' ,Auth::user()->id)->delete();
        products_classified::where('category_id', $request->id)->where('user_id', Auth::user()->id)->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
        return redirect('profile'); 
    }


    public function UpdateCategoryPage(Request $request)
    {
        return "Update Category <br><br><a href='/'>HomePage</a>";  
    }


}
