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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
	
<div class="corner-ribbon top-left sticky gradient shadow"><a href="{{ url('https://github.com/ampodobas/uci-law-sba-outline-bank') }}" target="_blank"><i class="fa fa-cog"></i>Beta v1.0.1</a></div>

@if (Auth::check())
<!-- Permission Role Check -->
<?php 
		    
	/* Get id (the primary key) of this user from the users table */
	$users_table_pk_id = Auth::user()->id;

	/* Check to see what role_id the user has */
	$if_admin = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
		->where('role_user.user_id', '=', $users_table_pk_id)
        ->select('role_user.role_id')
        ->get();
        
?>   
<!-- Permission Role Check -->
@endif
					
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
		                    <li><a href="{{ url('year') }}"><img src="{{ asset('/img/menu/academic_term_year_white.png') }}" class="menu_icon">By Year</a></li>
		                </ul>
		            </li>
		            <li class="primary_link"><a href="{{ url('/upload') }}"><img src="{{ asset('/img/menu/upload_white.png') }}" class="menu_icon">Upload</a></li>
		            
		            <?php /* START LOOP: if the role_id is 1, then show the admin links */ foreach ($if_admin as $item) { if ($item->role_id == 1) { ?>
			            <li class="primary_link dropdown">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ asset('/img/menu/admin_white.png') }}" class="menu_icon">Admin <span class="caret"></span></a>
			                <ul class="dropdown-menu" role="menu">
				                <li><a href="{{ URL::route('users.index') }}">Users</a></li>
			                    <li><a href="{{ url('/role_permission') }}">Panel</a></li>
			                    <li><a href="{{ URL::route('roles.index') }}">Roles</a></li>
			                    <li><a href="{{ URL::route('permissions.index') }}">Permissions</a></li>
			                </ul>
			            </li>      
			         <?php } } /* END LOOP: if the role_id is 1, then show the admin links */  ?>
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
			<p class="centered">&copy; The Regents of the University of California. All Rights Reserved.</p>
		</footer>
		<!-- Footer -->
      
	</div><!-- ./container -->

	<a href="{{ url('https://github.com/ampodobas/uci-law-sba-outline-bank') }}" target="_blank"><img src="{{ asset('/img/github_icon.png') }}" class="github_icon"></a>
	
<!-- Modal: Search -->
<div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title modal_search" id="myModalLabel"><i class="fa fa-search"></i> Search</h4>
			</div><!-- ./modal-header -->
			
			<div class="modal-body">
				
				<form method="POST" action="{{ url('browse_search_all') }}" id="browse_search_all">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<!-- Select Professor -->
					<div class="row">
						<div class="col-sm-4"><p class="lead">Professor:</div>
						<div class="col-sm-8">
							<select class="form-control" name="professor_name">
							    <option value="">Select A Professor</option>
								<!-- Include: professor Titles Array -->
								@include('partials.partial_professor_names')
								<!-- Include: professor Titles Array -->
							</select>
						</div>	
					</div><!-- ./row -->
					<!-- Select Professor -->
					
					<!-- Select Course -->
					<div class="row">
						<div class="col-sm-4"><p class="lead">Course:</div>
						<div class="col-sm-8">
							<select class="form-control" name="course_name">
							    <option value="">Select A Course</option>
								<!-- Include: professor Titles Array -->
								@include('partials.partial_course_titles')
								<!-- Include: professor Titles Array -->
							</select>
						</div>	
					</div><!-- ./row -->
					<!-- Select Course -->
					
					<!-- Select Academic Term -->
					<div class="row">
						<div class="col-sm-4"><p class="lead">Academic Term:</div>
						<div class="col-sm-8">
								<select class="form-control" name="academic_term">
								    <option value="">Select Academic Term</option>
								    <!-- Include: Academic Terms Array -->
									@include('partials.partial_academic_terms')
									<!-- Include: Academic Terms Array -->
								</select>
						</div>	
					</div><!-- ./row -->
					<!-- Select Academic Term -->
					
					<!-- Select Year -->
					<div class="row">
						<div class="col-sm-4"><p class="lead">Year:</div>
						<div class="col-sm-8">
							<select class="form-control" name="year">
							    <option value="">Select Year</option>
							    <!-- Include: Years Array -->
								@include('partials.partial_years')
								<!-- Include: Years Array -->
							</select>
						</div>	
					</div><!-- ./row -->
					<!-- Select Academic Term -->
				
					<button type="submit" form="browse_search_all" class="btn btn-block btn-primary center_this browse_submit_btn">Search <i class="fa fa-search"></i></button>
					
				</form>
			</div><!-- modal-body -->
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
