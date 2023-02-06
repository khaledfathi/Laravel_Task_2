@extends('main') 
@section('title' , 'Add Product') 

@section('content')
@if (session('ProductMsg'))
    <p>{{session('ProductMsg')}}</p>
@endif 
<form action="saveproduct">
    <div>
        <label for="">Product Name </label>
        <input type="text" name="name">
    </div>
    <label for="">Category  </label>
    <select name="categories[]" id="" multiple="multiple">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
<input type="submit" value="Save"></form>

@endsection