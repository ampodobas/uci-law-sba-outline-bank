@extends('auth-template')

@section('content')

<!-- Row -->
<div class="row">
	
	<!-- Card: Auth All -->
	<div class="card card_features auth_opacity">
		
		<img src="{{ asset('/img/uci_seal.jpg') }}" class="clinics_login_auth" />

		<h1 class="page_title">UCI Law Outline Bank Features</h1>
				
		<hr/>
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/features/document.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">Document-Focused Search</h3>
				<p>Upload verified PDFs attributing one or more of a specific course, professor, semester, or year. This allows classmates search for outlines from any of these categories. Also, by pre-populating professor names and course titles (instead of allowing users to input them), the problem of two students respectively uploading a &quot;CrimPro&quot; and &quot;Criminal Procedure&quot; outline for the same class is avoided.</p>
			</div>
			<!-- Text -->			
		</div>
		<!-- Row -->
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/features/user_management.png') }}" class="features_icon">
			</div>
			<!-- Icon -->	
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">User, Roles, Permissions Management Included</h3>
				<p>The UCI Law Outline Bank integrates a full user-management utility, allowing a privileged user to manage users (restricted to a @law.uci.edu or @lawnet.uci.edu e-mail address), manage additional roles (administrator and student are the default roles, but more can be added), and manage which users have permissions to view which pages and access which functionality.</p>
			</div>
			<!-- Text -->	
		</div>
		<!-- Row -->
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/features/responsive.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">Responsive Design</h3>
				<p>Regardless of whether you're using a desktop, a tablet, or a smartphone, the UCI Law Outline bank's responsive design with the Bootstrap grid system renders webpage content according to your screen size and orientation.</p>
			</div>
			<!-- Text -->				
		</div>
		<!-- Row -->
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/features/technical.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">Rock-Solid Technical Foundation</h3>
				<p>The UCI Law Outline Bank is developed on a rock-solid foundation of a modern, scalable, and secure web application framework and middleware. Based on the <a href="{{ url('https://laravel.com/docs/5.2')}}" target="_blank">Laravel 5.1</a> MVC framework, the Outline Bank incorporates the <a href="{{ url('http://getbootstrap.com/') }}" target="_blank">Twitter Bootstrap</a>, <a href="{{ url('https://github.com/LaravelCollective/html')}}" target="_blank">Laravel Collective, <a href="{{ url('https://github.com/Zizaco/entrust')}}" target="_blank">zizaco/entrust</a>, and the <a href="{{ url('https://github.com/ucla-it-security/iso-elk-stack')}}" target="_blank">the ELK Stack</a>.</p>
			</div>
			<!-- Text -->				
		</div>
		<!-- Row -->

		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/features/open_source.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">100% Open Source</h3>
				<p>Available under an Apache license <a href="{{ url('https://github.com/ampodobas/uci-law-sba-outline-bank') }}" target="_blank">at this link</a>, the entire codebase of the UCI Law SBA outline bank is made available with an open-source intention for two reasons. First, open-source applications encourage a full inspection of the entire codebase to find bugs and promote information security trust. Second, by making our code available, other institutions or individuals can improve upon it. Contributors are encouraged to use GitHub and submit pull requests.</p>
			</div>
			<!-- Text -->				
		</div>
		<!-- Row -->
	
		
		
	</div>
	<!-- Card: Auth All -->
</div>
<!-- Row -->

@endsection