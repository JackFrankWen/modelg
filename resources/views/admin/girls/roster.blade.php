@extends('layouts.dashboard')

@section('content')
<div class="content-body">
	<div class="row">
		<div class="table-responsive roster">
		{{dd($rosters)}}
			<table class="table">
				<thead>
			      <tr>
			        <th>Photo</th>
			        <th>Name</th>
			        <th>
			        	Roster
			        </th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php $i = 0; ?>
			    @foreach($rosters as $roster)
			    	@if( $i%2 == 0)
			      <tr class="success">
			      @else
			      <tr class="danger">
			      @endif
			        <td class="thumb-box"><img class="g-thumb" src="{{URL::asset('/images/girls/1.jpg')}}"></td>
			        <td>Doe</td>
			        <td>
			        	<input type="checkbox">Mon</input>
			        	<input type="checkbox">Tue</input>
			        	<input type="checkbox">Wed</input>
			        	<input type="checkbox">Thu</input>
			        	<input type="checkbox">Fri</input>
			        	<input type="checkbox">Sat</input>
			        	<input type="checkbox">Sun</input>
			        </td>
			      </tr>
			      
			     @endforeach
			    </tbody>
			  </table>		
		
		</div>
	</div>
</div>

@endsection
