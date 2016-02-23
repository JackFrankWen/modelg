@extends('layouts.dashboard')

@section('content')

<div class="content-body">
	<div class="row role"> 
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#createGirl">Add a new girl</button>
		<button type="button" class="btn btn-danger">Delete all</button>

	 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createGirl" tabindex="-1" role="dialog" aria-labelledby="createGirlLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" >Create a girl</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
	            <label for="girl_name">Girl Name</label>
	            <input type="email" class="form-control">
	          </div>
	        <div class="form-group">
	            <label for="girl_age">Girl Age</label>
	            <input type="password" class="form-control">
	        </div>
	        <div class="form-group">
	            <label for="exampleInputPassword1">Girl National</label>
	            <input type="password" class="form-control">
	        </div>
	        <label for="exampleInputPassword1">Girl Description</label>
	        <textarea class="form-control" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection