<html lang="en" class="no-js"> <!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8" />
		<title>{{ $pageTitle }}</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="The Quizzler Challenge" />
		<meta content="" name="Sinkim Yun" />
		<meta name="MobileOptimized" content="320">
		<!-- BEGIN GLOBAL MANDATORY STYLES -->   
		{{ HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css') }}       
		{{ HTML::style('assets/plugins/bootstrap/css/bootstrap.min.css') }}       
		{{ HTML::style('assets/plugins/uniform/css/uniform.default.css') }}       

		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL STYLES --> 
		{{ HTML::style('assets/plugins/select2/select2_metro.css') }}    
		<!-- END PAGE LEVEL SCRIPTS -->
		<!-- BEGIN THEME STYLES --> 
		{{ HTML::style('assets/css/style-metronic.css') }}    
		{{ HTML::style('assets/css/style.css') }}    
		{{ HTML::style('assets/css/style-responsive.css') }}    
		{{ HTML::style('assets/css/plugins.css') }}    
		{{ HTML::style('assets/css/themes/default.css') }}    
		{{ HTML::style('assets/css/pages/login.css') }}    
		{{ HTML::style('assets/css/custom.css') }}    
		<!-- END THEME STYLES -->
		{{ HTML::style('assets/favicon.ico', array('rel' => 'shortcut icon')) }}  
	</head>
	<!-- BEGIN BODY -->
	<body class="login">
		<!-- BEGIN LOGO -->
		<div class="logo">
			{{ HTML::image('assets/img/logo-big.png') }} 
		</div>
		<!-- END LOGO -->

		<!-- BEGIN LOGIN -->
		<div class="content">
			@yield('content')
		</div>
		<!-- END LOGIN -->

		<!-- BEGIN COPYRIGHT -->
		<div class="copyright">
			{{ date('Y') }} &copy; The Quizzler Challenge.
		</div>
		<!-- END COPYRIGHT -->
		
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->   
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script> 
		<![endif]-->   
		{{ HTML::script('assets/plugins/jquery-1.10.2.min.js') }}
		{{ HTML::script('assets/plugins/jquery-migrate-1.2.1.min.js') }}
		{{ HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js') }}
		{{ HTML::script('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}
		{{ HTML::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
		{{ HTML::script('assets/plugins/jquery.blockui.min.js') }}
		{{ HTML::script('assets/plugins/jquery.cookie.min.js') }}
		{{ HTML::script('assets/plugins/uniform/jquery.uniform.min.js') }}

		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		{{ HTML::script('assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}
		{{ HTML::script('assets/plugins/select2/select2.min.js') }}   
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		{{ HTML::script('assets/scripts/app.js') }}
		{{ HTML::script('assets/scripts/login.js') }}
		<!-- END PAGE LEVEL SCRIPTS --> 
		<script>
			jQuery(document).ready(function() {     
			  App.init();
			  Login.init();
			});
		</script>
		<!-- END JAVASCRIPTS -->
	</body>
</html>