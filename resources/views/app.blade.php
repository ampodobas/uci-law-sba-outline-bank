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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/jasny-bootstrap.min.js') }}"></script>
	<!-- JS -->
	
	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<!-- Data Tables -->


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="container sba_main_container">
	
		<div class="row">
			<div class="col-md-4"><img src="{{ asset('/img/uci_seal.jpg') }}" class="top" /></div>
			<div class="col-md-8"><h1 class="top">UC Irvine School of Law<span>SBA Outline Bank</span></h1></div>
		</div>
		
		<!-- Menu -->
		<div class="row sba_menu_container">
	
	        <nav>
		        <ul class="nav nav-justified">
		            @if (Auth::check())
		            <li class="primary_link"><a data-toggle="modal" data-target="#ModalSearch"><img src="{{ asset('/img/menu/search_white.png') }}" class="menu_icon">Search</a></li>
		            <li class="primary_link dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ asset('/img/menu/browse_white.png') }}" class="menu_icon">Browse <span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
			                <li><a href="{{ url('/browse/professors') }}"><img src="{{ asset('/img/menu/professor_white.png') }}" class="menu_icon">By Professor</a></li>
		                    <li><a href="{{ url('/browse/courses') }}"><img src="{{ asset('/img/menu/course_white.png') }}" class="menu_icon">By Course</a></li>
		                    <li><a href="{{ url('/browse/students') }}"><img src="{{ asset('/img/menu/student_white.png') }}" class="menu_icon">By Student</a></li>
		                </ul>
		            </li>
		            <li class="primary_link"><a href="{{ url('/upload') }}"><img src="{{ asset('/img/menu/upload_white.png') }}" class="menu_icon">Upload</a></li>
		            <li class="primary_link dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ asset('/img/menu/admin_white.png') }}" class="menu_icon">Admin <span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
			                <li><a href="{{ URL::route('users.index') }}">Users</a></li>
		                    <li><a href="{{ url('/role_permission') }}">Panel</a></li>
		                    <li><a href="{{ URL::route('roles.index') }}">Roles</a></li>
		                    <li><a href="{{ URL::route('permissions.index') }}">Permissions</a></li>
		                </ul>
		            </li>      
		            <li class="primary_link"><a href="{{ url('/auth/logout') }}"><img src="{{ asset('/img/menu/logout_white.png') }}" class="menu_icon">Logout</a></li>
					@endif
				</ul>
	        </nav>
	  </div><!-- ./row .sba_menu_container -->
	<!-- Menu -->

      	<!-- Main Content -->
		<div class="container">
			@include('flash::message')
			@yield('content')
		</div>
		<!-- Main Content -->
	
	  <!-- Footer -->
      <footer class="footer">
        <p>&copy; The Regents of the University of California. All Rights Reserved.</p>
      </footer>
      <!-- Footer -->
      
	</div><!-- ./container -->

<!-- Modal: Search -->
<div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div><!-- ./modal-header -->
			
			<div class="modal-body">
				search
			</div><!-- modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div><!-- ./modal-footer -->
		</div><!-- ./modal-content -->
	</div><!-- ./modal-dialog -->
</div><!-- ./modal .fade -->
<!-- Modal: Search -->
  
	<!--
		<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
		<div>Icons made by <a href="http://www.flaticon.com/authors/anton-saputro" title="Anton Saputro">Anton Saputro</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
		<div>Icons made by <a href="http://www.flaticon.com/authors/google" title="Google">Google</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
		<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
		<div>Icons made by <a href="http://www.flaticon.com/authors/elegant-themes" title="Elegant Themes">Elegant Themes</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
	-->
		  
	
</body>
</html>
