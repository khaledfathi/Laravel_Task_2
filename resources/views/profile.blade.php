@extends('main') 
@section('title' , 'Profile') 

@section('content')
<div class="msg">
    <p>Messagees</p>
</div>
<div>
    <label for="">Category Name </label>
    <input type="text">
</div>
<div>
    <label for="">Category Description </label>
    <input type="text">
</div>
<input type="submit" value="Save">


@endsection