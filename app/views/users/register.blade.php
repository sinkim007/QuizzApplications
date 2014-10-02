
{{ Form::open(array('url' => 'login/registerform', "class" => 'register-form')) }}
	<h3 >Sign Up</h3>
	<p>Enter your personal details below:</p>
	<div class="form-group">
		{{ Form::label('firstname', 'First Name', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-font"></i>
			{{ Form::text('firstname', Input::old('firstname')?e(Input::old('firstname')):'', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'First Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('lastname', 'Last Name', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-font"></i>
			{{ Form::text('lastname', Input::old('lastname')?e(Input::old('lastname')):'', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Last Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-envelope"></i>
			{{ Form::text('email', Input::old('email')?e(Input::old('email')):'', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address', 'Address', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-location-arrow"></i>
			{{ Form::text('address', Input::old('address')?e(Input::old('address')):'', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Address')) }}
		</div>
	</div>
	
	<div class="form-group">
		{{ Form::label('country', 'Country', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		{{ Form::select('country', Libenvironment::selectCountry(), Input::old('country')?e(Input::old('country')):'', array('class' => 'select2 form-control', 'id' => 'select2_sample4')) }}
	</div>
	<p>Enter your account details below:</p>
	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-user"></i>
			{{ Form::text('username', Input::old('username')?e(Input::old('username')):'', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Username', 'autocomplete' => 'off')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-lock"></i>
			{{ Form::password('password', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'autocomplete' => 'off', 'id' => 'register_password')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('rpassword', 'Re-type Your Password', array('class' => 'control-label visible-ie8 visible-ie9')) }}
		<div class="input-icon">
			<i class="icon-ok"></i>
			{{ Form::password('rpassword', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Re-type Your Password', 'autocomplete' => 'off')) }}
		</div>
	</div>

	<div class="form-actions">
		<button id="register-back-btn" type="button" class="btn">
		<i class="m-icon-swapleft"></i>  Back
		</button>
		<button type="submit" id="register-submit-btn" class="btn green pull-right">
		Sign Up <i class="m-icon-swapright m-icon-white"></i>
		</button>            
	</div>
</form>