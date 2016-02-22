@extends('layouts.dashboard')

@section('content')
<div class="content-body">
	{{-- <form action="{{action('Admin\ShopinfoController@update')}}" method="POST" class="form-horizontal shopinfo clearfix"> --}}
	<form action="{{url('admin\shopinfo')}}" method="POST" class="form-horizontal shopinfo clearfix">
		<input type="hidden" name="_method" value="PUT">
		
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Name:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_name" value="{{ $shop->shop_name }}">
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Slogan:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_solgan" value="{{ $shop->shop_solgan}}">
	    </div>
	  </div>
	   <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">State:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_state" value="{{ $shop->shop_state }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">City:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_city" value="{{ $shop->shop_city }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Postcode:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_postcode" value="{{ $shop->shop_postcode }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Suburb:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_suburb" value="{{ $shop->shop_suburb }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Address:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_address" value="{{ $shop->shop_address }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Email:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text" name="shop_email" value="{{ $shop->shop_email }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 control-label" for="formGroupInputLarge">Phone:</label>
	    <div class="col-xs-8">
	      <input class="form-control" type="text"  name="shop_phone" value="{{ $shop->shop_phone }}">
	    </div>
	  </div>
  
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-default btn-danger pull-right" value="Update">
	</form>
</div>
@endsection

