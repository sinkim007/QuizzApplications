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
      <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
      {{ HTML::style('assets/plugins/gritter/css/jquery.gritter.css') }} 
      {{ HTML::style('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }} 
      {{ HTML::style('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }} 
      {{ HTML::style('assets/plugins/jqvmap/jqvmap/jqvmap.css') }} 
      {{ HTML::style('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }} 

      <!-- END PAGE LEVEL PLUGIN STYLES -->
      <!-- BEGIN THEME STYLES --> 
      {{ HTML::style('assets/css/style-metronic.css') }} 
      {{ HTML::style('assets/css/style.css') }} 
      {{ HTML::style('assets/css/style-responsive.css') }}
      {{ HTML::style('assets/css/plugins.css') }}
      {{ HTML::style('assets/css/pages/tasks.css') }}
      {{ HTML::style('assets/css/themes/default.css', array('id' => 'style_color')) }}
      {{ HTML::style('assets/css/custom.css') }}
      <!-- END THEME STYLES -->
      {{ HTML::style('assets/favicon.ico', array('rel' => 'shortcut icon')) }}
   </head>
   <!-- END HEAD -->
   <!-- BEGIN BODY -->
   <body class="page-header-fixed">
      <!-- BEGIN HEADER -->
      @include('backends.partials.headernav')
      <!-- END HEADER -->
      <div class="clearfix"></div>
      <!-- BEGIN CONTAINER -->
      <div class="page-container">
         <!-- BEGIN SIDEBAR -->
         @include('backends.partials.sidebar')
         <!-- END SIDEBAR -->
         <!-- BEGIN PAGE -->
         <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
               <div class="col-md-12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                  <h3 class="page-title">
                     {{ $pageTitle }} <small></small>
                  </h3>
                  <ul class="page-breadcrumb breadcrumb">
                     @if(Auth::user()->user_role_id==2)
                        <li class="btn-group">
                           {{ HTML::decode(HTML::link($urlAddBack, $btnAddBack, array('class' => 'btn blue', 'style' => 'color: #fff;'))) }}                        
                        </li>
                     @endif   
                     <li>
                        <i class="icon-home"></i>
                        <a href="{{ URL::to('backends/dashboard') }}">Home</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">{{ $pageTitle }}</a></li>
                  
                     <li class="pull-right">
                        <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                           <i class="icon-calendar"></i>
                           <span></span>
                           <i class="icon-angle-down"></i>
                        </div>
                     </li>
                  </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <div class="row">
               @yield('content')        
            </div>
            <!-- END PAGE HEADER-->
         </div>
         <!-- END PAGE -->
      </div>
      <!-- END CONTAINER -->
      <!-- BEGIN FOOTER -->
      <div class="footer">
         <div class="footer-inner">
            {{ date('Y') }} &copy; The Quizzler Challenge.
         </div>
         <div class="footer-tools">
            <span class="go-top">
            <i class="icon-angle-up"></i>
            </span>
         </div>
      </div>
      <!-- END FOOTER -->
      <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
      <!-- BEGIN CORE PLUGINS -->   
      <!--[if lt IE 9]>
      <script src="assets/plugins/respond.min.js"></script>
      <script src="assets/plugins/excanvas.min.js"></script> 
      <![endif]-->   
      {{ HTML::script('assets/plugins/jquery-1.10.2.min.js') }}
      {{ HTML::script('assets/plugins/jquery-migrate-1.2.1.min.js') }}
      @yield('javaScript')
      
      <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
      {{ HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}
      {{ HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js') }}
      {{ HTML::script('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}
      {{ HTML::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
      {{ HTML::script('assets/plugins/jquery.blockui.min.js') }}
      {{ HTML::script('assets/plugins/jquery.cookie.min.js') }}
      {{ HTML::script('assets/plugins/uniform/jquery.uniform.min.js') }}

      <!-- END CORE PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/jquery.vmap.js') }}
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}
      {{ HTML::script('assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}
      {{ HTML::script('assets/plugins/flot/jquery.flot.js') }}
      {{ HTML::script('assets/plugins/flot/jquery.flot.resize.js') }}
      {{ HTML::script('assets/plugins/jquery.pulsate.min.js') }}
      {{ HTML::script('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}
      {{ HTML::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
      {{ HTML::script('assets/plugins/gritter/js/jquery.gritter.js') }}
      {{ HTML::script('assets/plugins/gritter/js/jquery.gritter.js') }}
   

      <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
      {{ HTML::script('assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}
      {{ HTML::script('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}
      {{ HTML::script('assets/plugins/jquery.sparkline.min.js') }}

      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
      {{ HTML::script('assets/scripts/app.js') }}
      {{ HTML::script('assets/scripts/index.js') }}
      {{ HTML::script('assets/scripts/tasks.js') }}
     
      <!-- END PAGE LEVEL SCRIPTS -->  
      <script>
         jQuery(document).ready(function() {    
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initDashboardDaterange();
            Index.initIntro();
            Tasks.initDashboardWidget();
         });
      </script>
      <!-- END JAVASCRIPTS -->
   </body>
   <!-- END BODY -->
</html>