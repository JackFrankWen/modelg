@extends('layouts.dashboard')

@section('content')
<div class="content-body rates">
	<div class="row header">
		<form action="{{action('Admin\RatesController@store')}}" method="post" class="add-form col-xs-12 col-sm-8 col-sm-offset-2">
			
			<div class="col-xs-6 rtt "data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
				<span class="col-xs-12 diamond">Full Massage</span>
				<input type="text" name="rates_name" class="ript" value="Full Massage">
			</div>
			<ul class="col-xs-12 lt">
				<li class="col-xs-12 lv1 ofst">
					<div class="col-xs-6 lv2" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
						<span class="col-xs-12 diamond">30 min</span>
						<input type="text" name="rates_info[]" class="ript" value="30 min" >
					</div>
					<div class="col-xs-6 lv2" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit"1>
						<span class="col-xs-12 diamond">$ 60</span>
						<input type="text" name="rates_price[]" class="ript" value="$ 60">
					</div>
					<span class="new"><i class="fa fa-plus fa-2"></i></span>
					<span class="dlt"><i class="fa fa-minus fa-2"></i></span>
				</li>	
				<li class="col-xs-12 lv1 ofst">
					<div class="col-xs-6 " data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
						<span class="col-xs-12 diamond">45 min</span>
						<input type="text" name="rates_info[]" class="ript" value="45 min">
					</div>
					<div class="col-xs-6" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit"1>
						<span class="col-xs-12 diamond">$ 90</span>
						<input type="text" name="rates_price[]" class="ript" value="$ 90">
					</div>
					<span class="new"><i class="fa fa-plus fa-2"></i></span>
					<span class="dlt"><i class="fa fa-minus fa-2"></i></span>
				</li>
				<li class="col-xs-12 lv1 ofst">
					<div class="col-xs-6 " data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
						<span class="col-xs-12 diamond">60 min</span>
						<input type="text" name="rates_info[]" class="ript" value="60 min">
					</div>
					<div class="col-xs-6" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit"1>
						<span class="col-xs-12 diamond">$ 120</span>
						<input type="text" name="rates_price[]" class="ript" value="$ 120">
					</div>
					<span class="new"><i class="fa fa-plus fa-2"></i></span>
					<span class="dlt"><i class="fa fa-minus fa-2"></i></span>
				</li>
				
			</ul>
			<div class="col-xs-12">
				<input type="submit" class="btn btn-danger btn-lg centered">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</div>
		</form>
	</div>

	<?php $i = 3; ?>
	@foreach ($rates_cats as $cat)
	<?php if($i % 3 == 0)echo "<div class = 'clos row'>"; ?>
		<div class="col-xs-12 col-sm-6 col-md-4 rates-wrap">
		<form action="{{ url('admin/rates/'.$cat->id) }}" method="post" class="updt-form col-xs-12 ">
			<input type="hidden" name="delete" value="{{action('Admin\RatesController@destroy',$cat->id)}}">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			{{-- <input type="hidden" name="_method" value="PUT"> --}}
			<span class="rm"><i class="fa fa-times fa-3"></i></span>
			<span class="updt"><i class="fa fa-refresh fa-3"></i></span>
			<div class="col-xs-6 rtt "data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
				<span class="col-xs-12 diamond">{{$cat->rates_name}}</span>
				<input type="text" name="rates_name" class="ript" value="{{$cat->rates_name}}">
			</div>
			
			<ul class="col-xs-12 lt">
				@if (isset($cat->childrates))
				@foreach($cat->childrates as $childrate)
				<li class="col-xs-12 lv1 ofst">

					<div class="col-xs-6 lv2" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit">
						<span class="col-xs-12 diamond">{{$childrate->rates_info}}</span>
						<input type="text" name="rates_info[]" class="ript" value="{{$childrate->rates_info}}" >
					</div>

					<div class="col-xs-6 lv2" data-toggle="tooltip" data-placement="top" title="Doubleclick to edit"1>
						<span class="col-xs-12 diamond">{{$childrate->rates_price}}</span>
						<input type="text" name="rates_price[]" class="ript" value="{{$childrate->rates_price}}">
					</div>

					<span class="new"><i class="fa fa-plus fa-2"></i></span>
					
					<span class="dlt"><i class="fa fa-minus fa-2"></i></span>
				</li>	
				@endforeach
				@endif

			</ul>
			
		</form>
		</div>
		<?php $i++;?>
		<?php if($i % 3 == 0)echo "</div>"; ?>
	@endforeach
</div>
@endsection

