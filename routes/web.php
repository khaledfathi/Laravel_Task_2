<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category; 
use App\Http\Controllers\Product; 
use App\Http\Controllers\Profile; 
use App\Http\Controllers\Login; 

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

//root page
route::get('/', fn()=> redirect('/login') );

//profile(list all)

route::group(['prefix' => '/profile', 'middleware' => 'auth'], function () { 
    route::get('/', [Profile::class, 'ProfilePage' ]);
    route::get('deleteall', [Profile::class, 'DeleteAll']); 
}); 
//categories
route::group(['prefix' => '/categories' ,'middleware'=>'auth'], function () {
    route::get('addcategory', [Category::class, 'AddCategoryPage']);
    route::post('savecategory', [Category::class, 'SaveCategory']); 
    route::get('updatecategory', [Category::class, 'UpdateCategoryPage']); 
    route::get('deletecategory', [Category::class, 'DeleteCategory']); 
});

//products 
route::group(['prefix' => '/products' , 'middleware'=>'auth'], function () {
    route::get('addproduct', [Product::class , 'AddProductPage']); 
    route::get('saveproduct', [Product::class , 'SaveProduct']); 
    route::get('updateproduct', [Product::class , 'UpdateProductPage']); 
    route::get('deleteproduct', [Product::class , 'DeleteProduct']); 
});

//login and register
route::get('/login' ,[Login::class , 'LoginPage' ])->name('login')->middleware('guest'); 
route::post('/login' , [Login::class , 'LoginAuth']); 
route::post('/register' , [Login::class , 'Register']); 

//logout
route::get('/logout' , [Login::class , 'Logout']); 
