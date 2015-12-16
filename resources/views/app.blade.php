<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SBA Outline Bank</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,200' rel='stylesheet' type='text/css'>
	<!-- Google Fonts -->
	
	<!-- CSS -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<!-- CSS -->
	
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jasny-bootstrap.js') }}"></script>
	<!-- JS -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Menu -->
	<div class="container">
		<div class="header clearfix">
	        <nav>
		        <ul class="nav nav-pills pull-right">
					<li><a href="{{ url('/') }}">Home</a></li>
		            @if (Auth::check())
		            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
		            <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Roles/Permissions</a>
		                <ul class="dropdown-menu" role="menu">
		                    <li><a href="{{ url('/role_permission') }}">Panel</a></li>
		
		                    <li><a href="{{ URL::route('roles.index') }}">Roles</a></li>
		                    <li><a href="{{ URL::route('permissions.index') }}">Permissions</a></li>
		                </ul>
		            </li>
		            <li><a href="{{ URL::route('users.index') }}">Users</a></li>
		
		            @endif
		            @if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
	        </nav>
	    <h3 class="text-muted">Project name</h3>
	  </div><!-- ./header clearfix -->
	  <!-- Menu -->
      
      	<!-- Main Content -->
		<div class="container">
			@include('flash::message')
			@yield('content')
		</div>
		<!-- Main Content -->
	
	  <!-- Footer -->
      <footer class="footer">
        <p>© 2015 Company, Inc.</p>
      </footer>
      <!-- Footer -->
      
	</div><!-- ./container -->
	
	
	
	  
	
</body>
</html>
