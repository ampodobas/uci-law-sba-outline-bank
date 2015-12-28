@extends('app')

@section('content')

	<div class="row page_title_icon_container">
		<h2>Edit User</h2>
	</div>
	
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

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}

	<div class="form-group">
    	{!! Form::label('user_first_name', 'First Name') !!}
        {!! Form::text('user_first_name', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
    	{!! Form::label('user_last_name', 'Last Name') !!}
        {!! Form::text('user_last_name', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
    	{!! Form::label('projected_graduation_year', 'Projected Graduation Year') !!}
        {!! Form::text('projected_graduation_year', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        Roles
        @foreach($roles as $role)
            <?php $checked = in_array($role->id, $userRoles->lists('id')); ?>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('role[]', $role->id, $checked) !!} {{ $role->display_name }}
                    </label>
                </div>
        @endforeach
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@stop