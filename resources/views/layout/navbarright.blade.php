<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#" class="main_search" title="Search..."><i class="zmdi zmdi-notifications"></i></a></li>
        <li><a href="/dashboard/test" class="main_search" title="Search..."><i class="zmdi zmdi-flag"></i></a></li>
        <li><a href="/dashboard/schedule" class="main_search" title="Search..."><i class="zmdi zmdi-calendar"></i></a></li>
        <li><a href="/userdocument/{{ Auth::user()->id }}" class="main_search" title="Search..."><i class="zmdi zmdi-google-drive"></i></a></li>
        <li><a href="/dashboard/index" class="main_search" title="Search..."><i class="zmdi zmdi-account"></i></a></li>
        <li><a onclick='return confirm("You are about to log out")' href="/logout" class="main_search" title="Search..."><i class="zmdi zmdi-power"></i></a></li>
      </ul>
</div>