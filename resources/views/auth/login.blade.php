@extends('auth-template')

@section('content')

<!-- Row -->
<div class="row">
	
	<!-- Card: Auth All -->
	<div class="card card_auth auth_opacity">
		
		<h3 class="clinics_login_auth">UCI Law SBA Outline Bank</h3>
		
		<img src="{{ asset('/img/uci_seal.jpg') }}" class="clinics_login_auth" />
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
			<li role="presentation"><a href="#tab2" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
			<li role="presentation"><a href="#tab3" aria-controls="messages" role="tab" data-toggle="tab">Password</a></li>
		</ul>
		<!-- Nav tabs -->
	
		<!-- Tab panes -->
		<div class="tab-content auth_tab_content">
			
			<!-- Tab 1: Login -->
			<div role="tabpanel" class="tab-pane active" id="tab1">

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			
				<!-- Form: Login -->
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">UCI Lawnet E-Mail:</label>
							<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
						</div>
					</div>
			
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">Password:</label>
							<input type="password" class="form-control input-lg" name="password">
						</div>
					</div>
					
					<hr/>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label"></label>
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
					
				</form>
				<!-- Form: Login -->
		
			</div>
			<!-- Tab 1: Login -->
			
			<!-- Tab 2: Register -->
			<div role="tabpanel" class="tab-pane" id="tab2">
				
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				
				<!-- Form: Register -->
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">First Name:</label>
							<input type="text" class="form-control input-lg" name="user_first_name" value="{{ old('user_first_name') }}">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">Last Name:</label>
							<input type="text" class="form-control input-lg" name="user_last_name" value="{{ old('user_last_name') }}">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">UCI Lawnet E-Mail:</label>
							<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">Password:</label>
							<input type="password" class="form-control input-lg" name="password">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label">Confirm Password:</label>
							<input type="password" class="form-control input-lg" name="password_confirmation">
						</div>
					</div>
					
					<hr/>
					
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label clinics_form_label"></label>
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
					
				</form>
				<!-- Form: Register -->
		
			</div>
			<!-- Tab 2: Register -->
			
			<!-- Tab 3: Password -->
			<div role="tabpanel" class="tab-pane" id="tab3">
				
				@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label clinics_form_label">UCI Lawnet E-Mail:</label>
								<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
							</div>
						</div>
						
						<hr/>
					
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label clinics_form_label"></label>
								<button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
							</div>
						</div>
				
					</form>
					
			</div>
			<!-- Tab 3: Password -->

		</div>
		<!-- Tab panes -->
	</div>
	<!-- Card: Login -->
</div>
<!-- Row -->

@endsection