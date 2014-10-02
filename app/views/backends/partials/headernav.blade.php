<div class="header navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="header-inner">
      <!-- BEGIN LOGO -->  
      <a class="navbar-brand" href="{{ URL::to('backends/dashboard') }}">
         {{ HTML::image('assets/img/logo.png', '',array('class' => 'img-responsive')) }}
      </a>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
      <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <img src="assets/img/menu-toggler.png" alt="" />
      </a> 
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <ul class="nav navbar-nav pull-right">

         <!-- BEGIN USER LOGIN DROPDOWN -->
         <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            {{ HTML::image(Auth::user()->picture, '', array('style' => 'width: 25px; height:25px;')) }}
            <span class="username">{{ Auth::user()->lastname }} {{ Auth::user()->firstname }}</span>
            <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
               <!-- <li>
                  {{ HTML::decode(HTML::link('#', '<i class="icon-user"></i> My Profile')) }}
               </li> -->
               <li class="divider"></li>
               <li>
                  {{ HTML::decode(HTML::link('backends/logout', '<i class="icon-key"></i> Log Out')) }}
               </li>
            </ul>
         </li>
         <!-- END USER LOGIN DROPDOWN -->
      </ul>
      <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END TOP NAVIGATION BAR -->
</div>