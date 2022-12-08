<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<!--Styles-->
 <link href='{{ asset("folderasset/fullcalendar/fullcalendar.min.css")}}' rel='stylesheet' />
{{--<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.1/main.css" integrity="sha256-i907euclfcA9Lsr5vVGfyb6woFJrVA17Vpg8BnSvPts=" crossorigin="anonymous">
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script> --}}

<link href="{{ asset('fullcalendar/fullcalendar.print.min.css')}}"  rel='stylesheet' media='print' />
<script src="{{ asset('fullcalendar/moment.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/jquery.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js')}}" ></script>
 <link rel="stylesheet" href="{{ asset('fullcalendar/main.css')}}" integrity="sha256-i907euclfcA9Lsr5vVGfyb6woFJrVA17Vpg8BnSvPts=" crossorigin="anonymous">
<script src="{{ asset('fullcalendar/bootstrap.min.js')}}"></script>
<script src="{{ asset('fullcalendar/sweetalert2.all.min.js')}}" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>User Dashboard</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Custom Css -->
<link  rel="stylesheet" href="{{ asset('assets/css/style.min.css')}}">

</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            {{-- <img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Crown"> --}}
        </div>
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


<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>                   
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                    
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">RTL Version</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Mini Sidebar</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>                
            </div>                
        </div>       
        <div class="tab-pane right_chat" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John <small class="float-right">05:00PM</small></span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>

<section class="content">
    <div id='calendar'></div>
</section>
<script src="{{ asset('fullcalendar/main.min.js') }}" integrity="sha256-TdTSDSjuCyswg+ZC7ekTsOatmHRtTdToHybuyu2TZnY=" crossorigin="anonymous"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.1/main.min.js" integrity="sha256-TdTSDSjuCyswg+ZC7ekTsOatmHRtTdToHybuyu2TZnY=" crossorigin="anonymous"></script> --}}
<script>

  $(document).ready(function() {
      var events = [];
    $.ajax({
    url: '{{ Route("allcalenderschedule") }}',
    type: 'GET',
    dataType: 'JSON',
    
    success: function(data) {
    //   var events = [];
    var events = [];
        $.each(data, function(i, item) {
            
          events.push({
              id: item.id,
              username:item.username,
              user_id:item.user_id,
            start: item.schedule_date,
            title: item.schedule_title,
            start_time: item.schedule_start_time,
            end_time: item.schedule_end_time,
            backgroundColor: item.color,
          })
        })
        // callback(events);
      console.log('events', event);
    //   {events.push( {title: birthdaysList[i].name , start: birthdaysList[i].date})}

    //   events.push(event);

    //   console.log(ev)
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: moment(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
       events: events,
    
      eventClick: function(calEvent, jsEvent, view, resourceObj) {
          Swal.fire({
  title: calEvent.title,
text: calEvent.username + " : "+calEvent.start_time+ " to "+calEvent.end_time,//Event Start Date
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Mark Done',
  denyButtonText: `Unmark`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    $.get('/markschedule/'+ calEvent.id, function (data) {
			console.log(data,'the locations')
   
			});
    Swal.fire('Approved Successfully!', '', 'success')
    window.location.reload()
  } else if (result.isDenied) {
    $.get('/unmarkschedule/'+ calEvent.id, function (data) {
			console.log(data,'the locations')
   
			});
    Swal.fire('Schedule unmarked', '', 'success')
    window.location.reload()
  }
})
      }

 


    });
    }
     
  })
  });

</script>
</head>

<script src='{{ asset('adminasset/interval.js') }}'></script>
{{-- <script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->  --}}
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{ asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
</body>
</html>