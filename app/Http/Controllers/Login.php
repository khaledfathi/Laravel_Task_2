<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function LoginPage(){
        return view('login' , ['title'=>'Login']); 
    }

    public function Register (Request $request){
        // $request->validateWithBag('User Name is required!', ['name'=>'required']);
        $request->validate(['name'=>'required|unique:users|alpha_dash']); 
        $request->validate(['password'=>'required|confirmed']);
        
        User::create([
            'name'=> $request->name,
            'password'=> \Illuminate\Support\Facades\Hash::make($request->password)
        ]); 
        return redirect('login')->with([
            'userName'=>$request->name ,
            'password'=>$request->password ,
            "register_msg"=>"$request->name has been registerd Succsessfuly"]);  
    }
    public function LoginAuth(Request $request)
    {
        if (Auth::attempt($request->except('_token'))){
            return redirect('profile'); 
        }        
        return redirect('/login')->with(['LoginError'=>'Invalid User Name or Password']);
    }

    public function Logout()
    {        
        auth::logout();
        return redirect('/login');
    }
}

