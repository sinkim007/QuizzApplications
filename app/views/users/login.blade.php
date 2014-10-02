@extends('layouts.masterlogin')
@section('content')
	<!-- BEGIN LOGIN FORM -->
	{{ Form::open(array('url' => 'login/loginform', 'class' => 'login-form')) }}
		<h3 class="form-title">Login to your account</h3>
		<div class="alert alert-error hide">
			<button class="close" data-dismiss="alert"></button>
			<span>Enter any username and password.</span>
		</div>
		<div class="form-group">
			{{ Form::label('username', 'Username', array('class' => 'control-label visible-ie8 visible-ie9')) }}
			<div class="input-icon">
				<i class="icon-user"></i>
				{{ Form::text('username', Input::old('username')?e(Input::old('username')):'', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Username')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password', array('class' => 'control-label visible-ie8 visible-ie9')) }}
			<div class="input-icon">
				<i class="icon-lock"></i>
				{{ Form::password('password', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password')) }}
			</div>
		</div>
		<div class="form-group">
			@if(Session::has('flash_message'))
                <div class="widget-footer">
                    <p class="glyphicons restart" style="color: #b94a48;"><i></i>{{ Session::get('flash_message') }}</p>
                </div>
            @endif
		</div>
		<div class="form-actions">
			<label class="checkbox">
				{{ Form::checkbox('remember', 0, array()) }}Remember me
			</label>
			<button type="submit" class="btn green pull-right">
				Login <i class="m-icon-swapright m-icon-white"></i>
			</button>            
		</div>
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				no worries, click <a href="javascript:;"  id="forget-password">here</a>
				to reset your password.
			</p>
		</div>
		<div class="create-account">
			<p>
				Don't have an account yet ?&nbsp; 
				<a href="javascript:;" id="register-btn" >Create an account</a>
			</p>
		</div>
	{{ Form::close() }}
	<!-- END LOGIN FORM -->        
	<!-- BEGIN FORGOT PASSWORD FORM -->
	@include('users.forgetpassword')
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	@include('users.register')
	<!-- END REGISTRATION FORM -->
@stop