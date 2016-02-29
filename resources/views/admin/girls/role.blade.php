@extends('layouts.dashboard')

@section('content')

<div class="content-body">
	<div class="row role"> 
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#createGirl">Add a new girl</button>
		<button type="button" class="btn btn-danger">Delete all</button>
	 </div>

	 <div class="row girls">
	 	@foreach($girls as $girl)
 	 	<div class="col-xs-12 col-sm-6 col-md-4 girl">
 	 		<form action="{{url('admin/girls/role/'.$girl->id)}}" method="post" class="girl-form col-xs-12" >
 	 			
 	 			<div class="col-xs-6 edt">
 	 				<div class="img-box">
 	 					<img class="img-responsive" src="{{URL::asset($girl->img_url)}}">
 	 				</div>
 	 			</div>

 				<div class="col-xs-6 edt" data-toggle="tooltip" data-placement="top" title="Click to edit">
 						<label>Name:</label>
 						<span class=" diamond">{{$girl->girl_name}}</span>
 						<input type="text" name="rates_info[]" class="ript" value="45 min">
 				</div>

 				<div class="col-xs-6 edt" data-toggle="tooltip" data-placement="top" title="Click to edit">
 						<label>Age:</label>
 						<span class=" diamond">{{$girl->girl_age}}</span>
 						<input type="text" name="rates_info[]" class="ript" value="45 min">
 				</div>

 				<div class="col-xs-6 edt" data-toggle="tooltip" data-placement="top" title="Click to edit">
 						<label>From:</label>
 						<span class=" diamond">{{$girl->girl_nation}}</span>
 						<input type="text" name="rates_info[]" class="ript" value="45 min">
 				</div>

 				<div class="col-xs-6 edt" data-toggle="tooltip">
 						<label class="crop hidden-xs">Photo</label>
 						<i class="fa fa-camera fa-3 hidden-xs"></i>
 						
 						<label class="dltgirl" data-url="{{url('admin/girls/role/'.$girl->id)}}">Delete</label>
 						<i class="fa fa-times fa-2"></i>
 						
 				</div>
 	 				
 				<div class="col-xs-12" data-toggle="tooltip" data-placement="top" title="Click to edit"1>
 						<textarea class="form-control" name="girl_description" rows="3" maxlength="400">{{$girl->girl_description}}</textarea>
 				</div>
 				
 	 		</form>
 	 	</div>
	 	@endforeach

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
      <form action="{{url('admin/girls/role')}}" method="post" class="girl_form" enctype="multipart/form-data">
      <div class="modal-body">
      		@if (count($errors) > 0)
      		    <div class="alert alert-danger">
      		        <ul>
      		            @foreach ($errors->all() as $error)
      		                <li>{{ $error }}</li>
      		            @endforeach
      		        </ul>
      		    </div>
      		@endif
	      	<div class="form-group">
	            <label for="girl_name">Girl Name</label>
	            <input type="text" name="girl_name" class="form-control">
	          </div>
	        <div class="form-group">
	            <label for="girl_age">Girl Age</label>
	            <input type="text" name="girl_age" class="form-control">
	        </div>
	        <div class="form-group">
	            <label for="exampleInputPassword1">Girl National</label>
	            <input type="text" name="girl_nation" class="form-control">
	        </div>
	        <label for="exampleInputPassword1">Girl Description</label>
	        <textarea class="form-control" name="girl_description" rows="3" maxlength="400"></textarea>
	        <div class="form-group">
	            <label for="exampleInputFile">File input</label>
	            <input type="file" name="image" id="imgUpload">
	        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {!! csrf_field() !!}
        <button type="submit" id ="addg" class="btn btn-primary">Save</button>
      </div>
       </form>
    </div>
  </div>
</div>
@endsection