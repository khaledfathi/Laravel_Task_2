<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>
<body>
    <div class="header">
        <h1>Laravel Task 2</h1>
    </div>
    <div class="content">
        @if (session('LoginError'))
            <p>{{session('LoginError')}}</p>
        @endif
        <form class="loginForm" action="login" method="post">
            @csrf
            <div>
                <label for="">User Name</label>
                <input type="text" name="name" value="{{session('userName')}}">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" value="{{session('password')}}">
            </div>
            <input type="submit" value="Login">
        </form><br>
        @if ($errors->any())
            <p>{{$errors->first()}}</p>
        @endif 
        @if (session('register_msg'))
           <p>{{session('register_msg')}}</p> 
        @endif
        <form class ="registerForm" action="register" method="post" >
            @csrf
            <div>
                <label for="" >User Name </label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="">Confirm Passowrd</label>
                <input type="password" name="password_confirmation">
            </div>
            <input type="submit" value="register">
        </form>
    </div>
</body>
</html>