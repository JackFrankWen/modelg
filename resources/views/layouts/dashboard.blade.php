
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}" />
	<link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('stylesheets/admin.css')}}" rel="stylesheet">
	
</head>
<body>
	<!-- Stie Wrap -->
	<div class="wrap">
		<header>
			<nav class="nav navbar-static-top" role="navigation">
				<div class="navbar-header">
					<a class="logo" href="{{url('/')}}">Modelg</a>
				</div>
					<ul class="nav navbar-nav navbar-left">
						<li class="sidebar-controller" aria-expanded="false"><a><i class="fa fa-navicon"></i></a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						
						<li>
							<a><i class="fa fa-gears"></i></a>
						</li>
						<li>
							<a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Log out</a>
						</li>
					</ul>
			</nav>
		</header>
		<!-- ===========================================-->
		<!--Left sidebar  -->
		<aside id="main-sidebar" class="color-control">
			<div class="dosomething"></div>
			<ul class="side-menu">
				<li >
					<a href="/admin" class="home">
						<i class="fa fa-dashboard"></i>
						<span>Dashborad</span>
					</a>
				</li>
				<li>
					<a href="/admin/shopinfo">
						<i class="fa fa-map"></i>
						<span>Shop Info</span>
					</a>
				</li>
				<li>
					<a href="/admin/rates">
						<i class="fa fa-table"></i>
						<span>Rates</span>
					</a>
				</li>
			
				
				<li class="treeview">
					<a>
						<i class="fa fa-heart"></i>
						<span>Girls</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
							<li>
								<a href="/admin/girls/role">
									<i class="fa fa-female"></i>
									<span>Role</span>
								</a>
							</li>
							<li>
								<a href="/admin/girls/roster">
									<i class="fa fa-calendar"></i>
									<span>Roster</span>
								</a>
							</li>
							<li>
								<a href="/admin/girls/photo">
									<i class="fa fa-camera"></i>
									<span>Photo</span>
								</a>
							</li>
							
					</ul>
				</li>
				<li>
					<a href="/admin/log">
						<i class="fa fa-book"></i>
						<span>User Record</span>
					</a>
				</li>
				<li>
					<a>
						<i class="fa fa-th"></i>
						<span>Widgets</span>
					</a>
				</li>
	

			</ul>
		</aside>

		<!-- Right sidebar -->
		<aside></aside>

		<!-- Main section -->
		<section class="wrap-content" role="main">

			<div class="content-header clearfix">
		
				<?php $last = count(Request::segments());?>
				@if ($last >1)
				<h4>{{ucfirst(Request::segment($last))}}</h4>
				@else
				<h4>Dashboard</h4>
				@endif

				<ol class="breadcrumb">
					<li>
					  <i class="fa fa-home"></i>
					  <a href="">Dashboard</a>
					</li>
					@for($i = 2; $i <= count(Request::segments()); $i++)
					<li>
					  <i class="fa fa-angle-right"></i>
					  <a href="">{{ucfirst(Request::segment($i))}}</a>
					</li>
					@endfor
				</ol>
			</div>
			@yield('content')

		</section>
		<!-- Page footer -->
		<footer class="main-footer">
			<strong>Copyright 2014-2015.</strong>
			<div class="pull-right hidden-xs">
				<em>Version</em>
				1.0.0
			</div>
      	</footer>

	</div>
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/jquery.min.js') }}"></script> 
 <script type="text/javascript" src="{{ URL::asset('javascripts/libs/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/adminpanel.js') }}"></script> 
</body>
</html>