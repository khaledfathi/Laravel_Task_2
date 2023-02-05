<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div class="header">
        <h1>Laravel Task 2</h1>
    </div>
    <div class="navBar">
        <ul>
            <li><a href="/categories/addcategory">Add Category</a></li>
            <li><a href="/products/addproduct">Add Product</a></li>
            <li><a href="/profile">List All</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        <p>Footer</p>
    </div>
</body>
</html>