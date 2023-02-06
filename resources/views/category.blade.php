@extends('main') 
@section('title' , 'Add Category') 
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection
@section('content')
<div class="msg">
    @if (session('category_msg'))
        <p>{{session('category_msg')}}<p>
    @endif
</div>
<form class="categoryForm" action="savecategory" method="post">
    @csrf
    <div>
        <label for="">Category Name </label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Category Description </label>
        <input type="text" name="description">
    </div>
    <input type="submit" value="Save">

</form>
@endsection