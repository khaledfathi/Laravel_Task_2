<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category; 
use App\Http\Controllers\Product; 
use App\Http\Controllers\Profile; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', fn()=> redirect('/login') );

route::group(['prefix' => '/categories'], function () {
    route::get('addcategory', [Category::class, 'AddCategoryPage']); 
    route::get('savecategory', [Category::class, 'SaveCategory']); 
    route::get('updatecategory', [Category::class, 'UpdateCategory']); 
    route::get('deletecategory', [Category::class, 'DeleteCategory']); 
});

route::group(['prefix' => '/products'], function () {
    route::get('addproduct', [Product::class , 'AddProductPage']); 
    route::get('saveproduct', [Product::class , 'SaveProduct']); 
    route::get('updateproduct', [Product::class , 'UpdateProduct']); 
    route::get('deleteproduct', [Product::class , 'DeleteProduct']); 
});

route::get('/profile', [Profile::class , 'ProfilePage']); 

route::get('login' , fn()=> view('login' , ['title'=>'login'])); 