<div class="page-sidebar navbar-collapse collapse">
   <!-- BEGIN SIDEBAR MENU -->        
   <ul class="page-sidebar-menu">
      <li>
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
         <div class="sidebar-toggler hidden-phone"></div>
         <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
      </li>
      <li>
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <form class="sidebar-search" action="{{ URL::to('backends/dashboard') }}" method="GET">
            <div class="form-container">
               <div class="input-box">
                  <a href="javascript:;" class="remove"></a>
                  <input type="text" placeholder="Search..."/>
                  <input type="button" class="submit" value=" "/>
               </div>
            </div>
         </form>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
      </li>
      <li class="start {{ isset($activeD)?$activeD:''}}">
         {{ HTML::decode(HTML::link('backends/dashboard', ' <i class="icon-home"></i><span class="title">Dashboard</span><span class="selected"></span>')) }}
      </li>
      @if(Auth::user()->user_role_id==2)
         <li class="start {{ isset($activeU)?$activeU:''}}">
            {{ HTML::decode(HTML::link('backends/users', ' <i class="icon-user"></i><span class="title">Users</span><span class="selected"></span>')) }}
         </li>
      @endif   
      <li class="last ">
         {{ HTML::decode(HTML::link('backends/logout', '<i class="icon-key"></i><span class="title">Log Out</span>')) }}
      </li>
   </ul>
   <!-- END SIDEBAR MENU -->
</div>