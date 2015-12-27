@extends('auth-template')

@section('content')

<!-- Row -->
<div class="row">
	
	<!-- Card: Auth All -->
	<div class="card card_features auth_opacity">
		
		<h3 class="clinics_login_auth">Features</h3>
		
		<img src="{{ asset('/img/uci_seal.jpg') }}" class="clinics_login_auth" />
		
		<hr/>
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/cloud_documents.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">Upload Documents By...</h3>
				<p>Upload verified PDFs according to a specific course, professor, semester, or year. Choose whether or not to show your name when documents are listed or searched for.</p>
			</div>
			<!-- Text -->			
		</div>
		<!-- Row -->
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">Solid Foundation</h3>
				<p>The UCI Law Outline Bank is developed on a rock-solid foundation of modern web application frameworks, middleware, and technologies, primarily Laravel 5.1.</p>
			</div>
			<!-- Text -->	
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/laravel_icon.png') }}" class="features_icon">
			</div>
			<!-- Icon -->		
		</div>
		<!-- Row -->
		
		<!-- Row -->
		<div class="card_features_row">
			<!-- Icon -->
			<div class="col-sm-4">
				<img src="{{ asset('/img/open_source.png') }}" class="features_icon">
			</div>
			<!-- Icon -->
			<!-- Text -->
			<div class="col-sm-8">
				<h3 class="left">100% Open Source</h3>
				<p>Available under an Apache license <a href="{{ url('https://github.com/ampodobas/uci-law-sba-outline-bank') }}" target="_blank">at this link</a>, the entire codebase of the UCI Law SBA outline bank is made available with an open-source intention for two reasons. First, open-source applications promote better review and security. Second, by making our code available, other institutions or individuals can improve upon it.</p>
			</div>
			<!-- Text -->			
		</div>
		<!-- Row -->
	
		
		
	</div>
	<!-- Card: Auth All -->
</div>
<!-- Row -->

@endsection