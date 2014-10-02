{{ Form::open(array('url' => 'login/resetpassword', 'class' => 'forget-form')) }}
	<h3 >Forget Password ?</h3>
	<p>Enter your e-mail address below to reset your password.</p>
	<div class="form-group">
		<div class="input-icon">
			<i class="icon-envelope"></i>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" />
		</div>
	</div>
	<div class="form-actions">
		<button type="button" id="back-btn" class="btn">
		<i class="m-icon-swapleft"></i> Back
		</button>
		<button type="submit" class="btn green pull-right">
		Submit <i class="m-icon-swapright m-icon-white"></i>
		</button>            
	</div>
{{ Form::close() }}