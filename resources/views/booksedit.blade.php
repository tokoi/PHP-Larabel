@extends('layouts.app') 

@section('content') 

<div class="row"> 
    <div class="col-md-12">

@include('common.errors') 

<form action="{{ url('books/update')}}" method="POST">
    
    <!-- item_name --> 
    <div class="form-group"> 
    <label for="item_name">Title</label>
    
    <input type="text" id="item_name" name="item_name" 
class="form-control" value="{{$book->item_name}}"> </div> 


<!-- item_number --> 
<div class="form-group"> 
    <label for="item_number">Number</label> 
<input type="text" id="item_number" name="item_number" 
class="form-control" value="{{$book->item_number}}"> 
</div> 
<!--/ item_number --> 

<!-- item_amount --> 
<div class="form-group"> 
    <label for="item_amount">Amount</label> 
<input type="text" id="item_amount" name="item_amount" 
class="form-control" value="{{$book->item_amount}}"> 
</div> 
<!--/ item_amount -->


<!-- published --> 
<div class="form-group"> 
    <label for="published">published</label> 
    <input type="datetime" id="published" name="published" 
class="form-control" value="{{$book->published}}"/> 
</div> 
<!--/ published -->


<!-- Save ボタン/Back ボタン --> 
<div class="well well-sm"> 
    <button type="submit" class="btn btn-primary">Save</button>
    
    <a class="btn btn-link pull-right" href="{{ url('/') }}"> 
        <i class="glyphicon glyphicon-backward"></i> Back 
    </a> 
</div> 
<!--/ Save ボタン/Back ボタン -->


<!-- id 値 を 送信 --> 
<input type="hidden" name="id" value="{{$book->id}}" /> 
<!--/ id 値 を 送信 --> 

<!-- CSRF --> 

{{csrf_field()}} 

<!-- CSRF -->



</form> 
</div> 
</div> 
@endsection
