@extends('main') 
@section('title' , 'Add Product') 
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
@endsection

@section('content')
@if (session('ProductMsg'))
    <p>{{session('ProductMsg')}}</p>
@endif 
<form class="productForm" action="saveproduct">
    <div>
        <label for="">Product Name </label>
        <input type="text" name="name">
    </div>
    <label for="">Category  :</label><br>
    <select name="categories[]" id="" multiple="multiple">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select><br>
<input type="submit" value="Save"></form>

@endsection