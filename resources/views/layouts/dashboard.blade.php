
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
					<a class="logo">Modelg</a>
				</div>
					<ul class="nav navbar-nav navbar-left">
						<li class="sidebar-controller" aria-expanded="false"><a><i class="fa fa-navicon"></i></a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  			<i class="fa fa-bell-o"></i>
	                 			<span class="label label-warning">10</span>
                			</a>
                			<ul class="dropdown-menu">
							    <li><a href="#">Action</a></li>
							    <li><a href="#">Another action</a></li>
							    <li><a href="#">Something else here</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="#">Separated link</a></li>
							 </ul>
                		</li>
						
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
				<li>
					<a>
						<i class="fa fa-book"></i>
						<span>Documentation</span>
					</a>
				</li>
				<li class="treeview">
					<a>
						<i class="fa fa-table"></i>
						<span>Tables</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
					</ul>
				</li>
				<li>
					<a>
						<i class="fa fa-th"></i>
						<span>Widgets</span>
					</a>
				</li>
				<li class="treeview">
					<a>
						<i class="fa fa-pie-chart"></i>
						<span>Charts</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
					</ul>
				</li>
				<li class="treeview">
					<a>
						<i class="fa fa-calendar"></i>
						<span>Calendar</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
					</ul>
				</li>
				<li class="treeview">
					<a>
						<i class="fa fa-envelope"></i>
						<span>Mailbox</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
							<li>
								<a>
									<i class="fa fa-circle-o"></i>
									<span>Something</span>
								</a>
							</li>
					</ul>
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
					  @if($i < count(Request::segments()) & $i > 0)
					    {!!'<i class="fa fa-angle-right"></i>'!!}
					  @endif
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