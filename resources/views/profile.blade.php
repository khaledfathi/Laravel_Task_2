@extends('main') 
@section('title' , 'Profile') 
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endsection

@section('content')
<div class="container">
    <h3>Categories</h3>
    <table class="categoryTable">
        <thead>
            <th>ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($categoriesList as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td><a class="editButton" href="{{url('categories/updatecategory?id='.$category->id)}}">Edit</a></td>
                    <td><a class="deleteButton" href="{{url('categories/deletecategory?id='.$category->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </thead>
    </table>
    <hr>
    <h3>Products</h3>
    <table class="productsTable">
        <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($productsList as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product}}</td>
                    <td>{{$product->category}}</td>
                    <td><a class="editButton" href="{{url('products/updateproduct?id='.$product->id)}}">Edit</a></td>
                    <td><a class="deleteButton" href="{{url('products/deleteproduct?id='.$product->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </thead>
    </table>
    <hr>

    <a href="{{url('profile/deleteall')}}">Delete All Records</a>

</div>
@endsection
