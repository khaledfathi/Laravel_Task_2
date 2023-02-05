@extends('main') 
@section('title' , 'Add Product') 

@section('content')
<div class="msg">
    <p>Messagees</p>
</div>
<div>
    <label for="">Product Name </label>
    <input type="text">
</div>
<label for="">Category  </label>
<select name="category[]" id="" multiple>
    <option value="">Cat1</option>
    <option value="">Cat2</option>
    <option value="">Cat3</option>
    <option value="">Cat4</option>
</select>
<input type="submit" value="Save">
@endsection