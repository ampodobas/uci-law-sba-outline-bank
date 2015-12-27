<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UCI Law | Clinics</title>
		
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
		
		<!-- Script: Background Images -->
		<script type="text/javascript" src="{{ asset('/js/full-cycle.js') }}"></script>
		<script>
		$(document).ready(function() {
			$('#slideshow').cycle({
			fx: 'fade',
			pager: '#smallnav',
			pause:   1,
			speed: 2500,
			timeout:  2800
			});
		});
		</script>
		<!-- Script: Background Images -->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		
	<nav class="navbar navbar-default navbar-fixed-top sba_top_bar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
	        <div class="sba_top_bar_ul_container">
	          <ul class="nav navbar-nav">
		        <li><a href="{{ url('auth/login') }}">Login</a></li>
	            <li><a href="{{ url('features') }}">Features</a></li>
	            <li><a href="{{ url('https://github.com/ampodobas/uci-law-sba-outline-bank') }}" target="_blank">GitHub</a></li>
	          </ul>
	        </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		
		<!-- Background Images -->
		<div id="slideshow">
			<img src="{{ asset('/img/backgrounds/1.jpg') }}" class="bgM">
			<img src="{{ asset('/img/backgrounds/2.jpg') }}" class="bgM">
			<img src="{{ asset('/img/backgrounds/3.jpg') }}" class="bgM">
			<img src="{{ asset('/img/backgrounds/4.jpg') }}" class="bgM">
		</div>
		<!-- Background Images -->
		
		<!-- Main Content Container -->
	    <div class="container">
		    @include('flash::message')
		    @yield('content')
	    </div><!-- /.container -->
	    <!-- Main Content Container -->
	    
	</body>
</html>