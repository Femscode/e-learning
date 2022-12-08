
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>User Documents</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Font Icon -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

<!-- If you use the default popups, use this. -->


<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />

<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
<style>
body{
    margin-top:20px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}


.bg-sky.box-shadow {
    box-shadow: 0px 5px 0px 0px #00a2a7
}

.bg-orange.box-shadow {
    box-shadow: 0px 5px 0px 0px #af4305
}

.bg-green.box-shadow {
    box-shadow: 0px 5px 0px 0px #4ca520
}

.bg-yellow.box-shadow {
    box-shadow: 0px 5px 0px 0px #dcbf02
}

.bg-pink.box-shadow {
    box-shadow: 0px 5px 0px 0px #e82d8b
}

.bg-purple.box-shadow {
    box-shadow: 0px 5px 0px 0px #8343e8
}

.bg-lightred.box-shadow {
    box-shadow: 0px 5px 0px 0px #d84213
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.padding-15px-lr {
    padding-left: 15px;
    padding-right: 15px;
}
.padding-5px-tb {
    padding-top: 5px;
    padding-bottom: 5px;
}
.margin-10px-bottom {
    margin-bottom: 10px;
}
.border-radius-5 {
    border-radius: 5px;
}

.margin-10px-top {
    margin-top: 10px;
}
.font-size14 {
    font-size: 14px;
}

.text-light-gray {
    color: #d6d5d5;
}
.font-size13 {
    font-size: 13px;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    background:#fff;
    border-top: 1px solid #dee2e6;
}
</style>

</head>
<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Crown"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
        <input type="search" value="" placeholder="Search..." />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#" class="main_search" title="Search..."><i class="zmdi zmdi-notifications"></i></a></li>
        <li><a href="/dashboard/test" class="main_search" title="Search..."><i class="zmdi zmdi-flag"></i></a></li>
        <li><a href="/dashboard/schedule" class="main_search" title="Search..."><i class="zmdi zmdi-calendar"></i></a></li>
        <li><a href="/userdocument/{{ Auth::user()->id }}" class="main_search" title="Search..."><i class="zmdi zmdi-google-drive"></i></a></li>
        <li><a href="/dashboard/index" class="main_search" title="Search..."><i class="zmdi zmdi-account"></i></a></li>
        <li><a href="/logout" class="main_search" title="Search..."><i class="zmdi zmdi-power"></i></a></li>
      </ul>
</div>
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
                    <a class="image" href="profile.html">
                        {{-- <img src="assets/images/profile_av.jpg" alt="User"> --}}
                    </a>
                    <div class="detail">
                        <h6>{{ Auth::user()->first_name }}</h6>
                        {{-- <small>{{ Auth::user()->email }}</small>                         --}}
                    </div>
                </div>
            </li>
            <li><a href="/dashboard/index"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="/dashboard/index"><i class="zmdi zmdi-account"></i><span>Personal </span></a></li>
            <li><a href="/dashboard/preference"><i class="zmdi zmdi-account"></i><span>Preference </span></a></li>
            <li><a href="/dashboard/experience"><i class="zmdi zmdi-account"></i><span>Experience </span></a></li>
            <li><a href="/dashboard/schedule"><i class="zmdi zmdi-apps"></i><span>Schedule</span></a></li>
            <li><a href="/usertest"><i class="zmdi zmdi-assignment"></i><span>Assessment Test</span></a></li>
            <li><a href="/userdocument/{{ Auth::user()->id }}"><i class="zmdi zmdi-folder"></i><span>Documents</span></a></li>
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

{{-- //coming here --}}
<div id='calender'></div>

<script type="text/javascript">
    var cal = $('#calendar').tuiCalendar({
        usageStatistics: false,
        defaultView: 'month',
        taskView: true,
        template: {
            monthGridHeader: function(model) {
                var date = new Date(model.date);
                var template = '<span class="tui-full-calendar-weekday-grid-date">' + date.getDate() + '</span>';
                return template;
            }
        }
    });
    cal.createSchedules([
        {
            id: '1',
            calendarId: '1',
            title: 'my schedule',
            category: 'time',
            dueDateClass: '',
            start: '2019-04-15T22:30:00+09:00',
            end: '2019-04-16T22:30:00+09:00'
        },
        {
            id: '2',
            calendarId: '1',
            title: 'second schedule',
            category: 'time',
            dueDateClass: '',
            start: '2018-01-18T17:30:00+09:00',
            end: '2018-01-19T17:31:00+09:00',
            isReadOnly: true    // schedule is read-only
        }
    ], true);
</script>
<section class="content file_manager">
    <?php   use \App\Http\Controllers\DashboardController; ?>
   

    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <form method='post' action='{{ route("schedulemonth") }}'>@csrf
            <select required name="month" id="cars">
                <option value='{{ $currentMonth }}'>{{ $currentMonth }}</option>
                <option value='January'>January</option>
                <option value='February'>February</option>
                <option value='March'>March</option>
                <option value='April'>April</option>
                <option value='May'>May</option>
                <option value='June'>June</option>
                <option value='July'>July</option>
                <option value='August'>August</option>
                <option value='September'>September</option>
                <option value='October'>October</option>
                <option value='November'>November</option>
                <option value='December'>December</option>
              </select>
              <input type='submit' class='btn btn-success' value='Filter Schedule'>
            </form>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th>DAYS</th>
                        @foreach($weeks as $week)
                        <th class="text-uppercase">{{ $week }}
                        </th>
                       @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($days as $day)
                    <tr>
                        <td class="align-middle">{{ $day }}</td>
                        <td>
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{ DashboardController::checkschedule($currentMonth,'Week 1',$day); }}</span>
                            <div class="margin-10px-top font-size14">{{ DashboardController::checkstarttime($currentMonth,'Week 1',$day); }}-{{ DashboardController::checkendtime($currentMonth,'Week 1',$day); }}</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td>
                            <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">{{ DashboardController::checkschedule($currentMonth,'Week 2',$day); }}</span>
                            <div class="margin-10px-top font-size14">{{ DashboardController::checkstarttime($currentMonth,'Week 2',$day); }}-{{ DashboardController::checkendtime($currentMonth,'Week 2',$day); }}</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>

                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">{{ DashboardController::checkschedule($currentMonth,'Week 3',$day); }}</span>
                            <div class="margin-10px-top font-size14">{{ DashboardController::checkstarttime($currentMonth,'Week 3',$day); }}-{{ DashboardController::checkendtime($currentMonth,'Week 3',$day); }}</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">{{ DashboardController::checkschedule($currentMonth,'Week 4',$day); }}</span>
                            <div class="margin-10px-top font-size14">{{ DashboardController::checkstarttime($currentMonth,'Week 4',$day); }}-{{ DashboardController::checkendtime($currentMonth,'Week 4',$day); }}</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                       
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td class="align-middle">10:00am</td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">11:00am</td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">12:00pm</td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            <div class="margin-10px-top font-size14">12:00-1:00</div>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">12:00-1:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">12:00-1:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            <div class="margin-10px-top font-size14">12:00-1:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">01:00pm</td>
                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

  <div class="cd-schedule__cover-layer"></div>
  </div>





</section>
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>    
</body>
</html>