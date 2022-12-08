<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html">
            {{-- <img src="assets/images/logo.svg" width="25" alt="Crown"> --}}
            <span class="m-l-10">User Dashboard</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="detail">
                        {{-- <h4>{{ Auth::user()->first_name }}</h4> --}}
                        {{-- <small>{{ Auth::user()->email }}</small>                         --}}
                    </div>
                </div>
            </li>
            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
            <li><a href="/admin"><i class="zmdi zmdi-apps"></i><span>Admin Dashboard</span></a></li>
            @endif
            <li><a href="/userdashboard"><i class="zmdi zmdi-home"></i><span>User Dashboard</span></a></li>
            <li><a href="/dashboard/index"><i class="zmdi zmdi-account"></i><span>Personal </span></a></li>
            <li><a href="/dashboard/preference"><i class="zmdi zmdi-account"></i><span>Preference </span></a></li>
            <li><a href="/dashboard/experience"><i class="zmdi zmdi-account"></i><span>Experience </span></a></li>
            <li><a href="/dashboard/schedule"><i class="zmdi zmdi-apps"></i><span>Schedule</span></a></li>
            <li><a href="/usertest"><i class="zmdi zmdi-assignment"></i><span>Assessment Test</span></a></li>
            <li><a href="/userdocument/{{ Auth::user()->id }}"><i class="zmdi zmdi-folder"></i><span>Documents</span></a></li>
            <li><a href="/usersideuploadeddocument"><i class="zmdi zmdi-folder"></i><span>Uploaded Document</span></a></li>
            {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Email</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>                    
                </ul>
            </li> --}}
           
        </ul>
    </div>
</aside>
