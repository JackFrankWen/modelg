@extends('layouts.dashboard')

@section('content')
<div class="content-body">
	<div class="row">
		<div class="table-responsive roster">
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
			      <tr class="success" data-id="{{$roster['id']}}">
			      @else
			      <tr class="danger" data-id="{{$roster['id']}}">
			      @endif
			        <td class="thumb-box"><img class="g-thumb" src="{{URL::asset($roster->img_url)}}"></td>
			        <td>{{$roster->girl_name}}</td>
			        <td>
			        @if($roster['mon'])
			        	<input type="checkbox" checked="true">Mon</input>
			        @else
			        	<input type="checkbox">Mon</input>
			        @endif
			        @if($roster['tue'])
			        	<input type="checkbox" checked="true" >Tue</input>
			        @else
			        	<input type="checkbox">Tue</input>
			        @endif
			        @if($roster['wed'])
			        	<input type="checkbox" checked="true" >Wed</input>
			        @else
			        	<input type="checkbox">Wed</input>
			        @endif
			        @if($roster['thu'])
			        	<input type="checkbox" checked="true">Thu</input>
			        @else
			        	<input type="checkbox">Thu</input>
			        @endif
			        @if($roster['fri'])
			        	<input type="checkbox" checked="true">Fri</input>
			        @else
			        	<input type="checkbox">Fri</input>
			        @endif
			        @if($roster['sat'])
			        	<input type="checkbox" checked="true" >Sat</input>
			        @else
			        	<input type="checkbox">Sat</input>
			        @endif
			        @if($roster['sun'])
			        	<input type="checkbox" checked="true">Sun</input>
			        @else
			        	<input type="checkbox">Sun</input>
			        @endif
			        </td>

			         <td><input type="button" class="rst-updt" value="update" data-url="{{url('admin/girls/roster/'.$roster['id'])}}"></input></td>
			      </tr>
			      <?php $i++; ?>
			     @endforeach
			    </tbody>
			  </table>		
		
		</div>
	</div>
</div>

@endsection
