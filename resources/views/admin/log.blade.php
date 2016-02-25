@extends('layouts.dashboard')

@section('content')

<div class="content-body">
	<div class="row log"> 
		<div class="table-responsive">
			<table class="table">
			    <thead>
			      <tr>
			        <th>User</th>
			        <th>Email</th>
			        <th>IP</th>
			        <th>Login at</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php $i = 0; ?>
			    @foreach ($users as $user)
			    	@if( $i%2 == 0)
			      <tr class="success">
			      	@else
			      <tr class="danger">
			      @endif
			        <td>{{$user->user_name}}</td>
			        <td>{{$user->user_email}}</td>
			        <td>{{$user->user_ip}}</td>
			        <td>{{$user->login_at}}</td>
			      </tr>
			      <?php $i++;?>
			    @endforeach
			    </tbody>
			  </table>
		  </div>
	  </div>
</div>

@endsection