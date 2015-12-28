@extends('auth-template')

@section('content')

<div class="row">
			
	<!-- Card: Login -->
	<div class="card card_auth auth_opacity">
		
		<h3 class="clinics_login_auth">UCI Law SBA Outline Bank</h3>
		
		<img src="{{ asset('/img/uci_seal.jpg') }}" class="clinics_login_auth" />
		
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
				<label class="col-md-4 control-label">First Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="user_first_name" value="{{ old('user_first_name') }}">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Last Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="user_last_name" value="{{ old('user_last_name') }}">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">UCI Lawnet E-Mail:</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}">
				</div>
			</div>
	
			<div class="form-group">
				<label class="col-md-4 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password">
				</div>
			</div>
	
			<div class="form-group">
				<label class="col-md-4 control-label">Confirm Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password_confirmation">
				</div>
			</div>
	
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
						Register
					</button>
				</div>
			</div>
		</form>
		<!-- Form: Register -->
	</div>
	<!-- Card: Login -->

</div>
@endsection