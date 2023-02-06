@extends('main') 
@section('title' , 'Update Category') 

@section('content')
<div class="msg">
    @if (session('category_update_msg'))
        <p>{{session('category_update_msg')}}<p>
    @endif
</div>
<form action="savecategory" method="post">
    @csrf
    <div>
        <label for="">Category Name </label>
        <input type="text" name="name" value="{{$category->name}}">
    </div>
    <div>
        <label for="">Category Description </label>
        <input type="text" name="description" value="{{$category->description}}">
    </div>
    <input type="submit" value="Update">

</form>
@endsection