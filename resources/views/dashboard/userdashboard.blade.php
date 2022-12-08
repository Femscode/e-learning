<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>User Dashboard</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script>

<link href="{{ asset('fullcalendar/fullcalendar.print.min.css')}}"  rel='stylesheet' media='print' />
<script src="{{ asset('fullcalendar/moment.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/jquery.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js')}}" ></script>
 <link rel="stylesheet" href="{{ asset('fullcalendar/main.css')}}" integrity="sha256-i907euclfcA9Lsr5vVGfyb6woFJrVA17Vpg8BnSvPts=" crossorigin="anonymous">
<script src="{{ asset('fullcalendar/bootstrap.min.js')}}"></script>
<script src="{{ asset('fullcalendar/sweetalert2.all.min.js')}}" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script>

<!-- Light Gallery Plugin Css -->
<link rel="stylesheet" href="assets/plugins/light-gallery/css/lightgallery.css">
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
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
        <li><a href="/userdocument/2" class="main_search" title="Search..."><i class="zmdi zmdi-google-drive"></i></a></li>
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
                    <div class="detail">
                        {{-- <h4>{{ Auth::user()->first_name }}</h4> --}}
                        {{-- <small>{{ Auth::user()->email }}</small>                         --}}
                    </div>
                </div>
            </li>
            @if(Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2)
            <li><a href="/admin"><i class="zmdi zmdi-apps"></i><span>Admin Dashboard</span></a></li>
            @endif
            <li><a href="/dashboard/index"><i class="zmdi zmdi-home"></i><span>User Dashboard</span></a></li>
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
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User Profile</h2>
                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                {{-- <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile-edit.html" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div> --}}
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="profile.html">
                                @if($user->profilePic !== null)
                                <img src="assets/images/profile_av.jpg" class="rounded-circle shadow " alt="profile-image">
                                @else
                                <img src="{{ asset('profilePic/'.$user->image.'') }}" style='max-width:200px;height:200px' class="rounded-circle shadow " alt="profile-image">
                                @endif
                            </a>
                            <h4 class="m-t-10">{{ $user->name }}</h4> 
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Change Picture</button>
                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="title" id="defaultModalLabel">Update Profile Picture</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="mx-auto w-100 mw-600px pt-15 pb-10"
                                            action='{{route("updatePic")}}' enctype="multipart/form-data"
                                            method="post">@csrf
                                            <!--begin::Type-->
                                            <div class="current" data-kt-stepper-element="content">
                                                <!--begin::Wrapper-->
                                                <div class="w-100">
                                                    <!--begin::Heading-->
                                                    <div class="pb-7 pb-lg-12">
                                                     </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-15" data-kt-buttons="true">

                                                    <input required type='file' name='image' accept='image/*' class='form-control'>
                                                                  
                                                     
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                 
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Type-->
                                            
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default btn-round waves-effect">Update</button>
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                  
                                    <p class="text-muted">{{ $user->address }}</p>
                                </div>
                                <div class="col-4">                                    
                                    <small><a href='/test'>Test</a></small>
                                    <h5>{{ count(App\Test::all()) }}</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small><a href='/schedule'>Schedule</a></small>
                                    <h5>{{ count(App\Schedule::all()) }}</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small><a href='#'>Task</a></small>
                                    <h5>5</h5>
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Email address: </small>
                            <p>{{ $user->email }}</p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            @if($user->phone !== null)
                            <p>{{ $user->phone }}</p>
                            @else
                            <p class='text-danger'>Not yet provided</p>
                            @endif
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <div><a href="/dashboard/personal">Personal</a></div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blue " role="progressbar" aria-valuenow="{{ $personalprogress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $personalprogress }}%"> <span class="sr-only">62% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div><a href="/dashboard/preference">Preference</a></div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-green " role="progressbar" aria-valuenow="{{ $preferenceprogress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $preferenceprogress }}%"> <span class="sr-only">87% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div><a href="/dashboard/experience">Experience</a></div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $experienceprogress }}%"> <span class="sr-only">32% Complete</span> </div>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div>Angular</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                    </div>
                                </li> --}}
                            </ul>
                            {{-- <span>Please make sure you provide your full information.</span> --}}
                        </div>
                    </div>  
                    <div class="card">
                        <div class="card w_data_1">
                            <div class="body">
                                <div class="w_icon pink"><a href='/userdocument/{{ Auth::user()->id }}'><i class="zmdi zmdi-file"></i></a></div>
                                <h4 class="mt-3 mb-0"><a href='/userdocument/{{ Auth::user()->id }}'>{{ count($files) }}</a></h4>
                                <span class="text-muted"><a href='/userdocument/{{ Auth::user()->id }}'>Document Assigned</a></span>
                                <div class="w_description text-success">
                                    <i class="zmdi zmdi-trending-up"></i>
                                    <span>{{ count($files) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card w_data_1">
                            <div class="body">
                                <div class="w_icon cyan"><a href='/userdocument/{{ Auth::user()->id }}'><i class="zmdi zmdi-folder"></i></a></div>
                                <h4 class="mt-3 mb-1"><a href='/userdocument/{{ Auth::user()->id }}'>{{ count($folders) }}</a></h4>
                                <span class="text-muted"><a href='/userdocument/{{ Auth::user()->id }}'>Folder Assigned</a></span>
                                <div class="w_description text-success">
                                    <i class="zmdi zmdi-trending-up"></i>
                                    <span>{{ count($folders) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>                 
                                     
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Test Assigned</strong> </h2>
                        </div>
                        <div class="body">
                            {{-- <p>All available test</p> --}}
                            <div  class="list-unstyled row clearfix">
                                @foreach($tests as $test)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30">
                                    @if($test->images !== null)
                                    <a href=""> <img class="img-fluid img-thumbnail" style='max-width:200px' src="{{ asset('/testimages/'.$test->images.'')}}" alt=""> </a>
                                    @else
                                    <a href=""> <img class="img-fluid img-thumbnail" style='max-width:200px' src="{{ asset('assets/images/test.jpg')}}" alt=""> </a>
                                    @endif
                                    <div class="blogitem-content">
                                        <div class="blogitem-header">
                                            <div class="blogitem-meta">
                                                <span><i class="zmdi zmdi-time"></i> Time allocated: <a href="javascript:void(0);">{{$test->minutes}} minutes</a></span>
                                                <span><i class="zmdi zmdi-apps"></i> Number of questions:<a href='#'>{{$test->questions->count()}}</a></span>
                                            </div>
                                        </div>
                                        <h5 style='min-height:60px'><a >{{Str::limit($test->name,35)}}</a></h5>
                                        <p style='min-height:40px'>{{Str::limit($test->description,25)}}</p>
        
                                        @if(!in_array($test->id,$wasTestCompleted))
                                        <a class='btn btn-info' href="{{route('starttest',[$test->id])}}">
                                            Start Test
                                        </a>
                                        @else
                                        <a  class='btn btn-info' href="/result/user/{{auth()->user()->id}}/quiz/{{$test->id}}">View Result</a>
                                        
                                        <span class="float-right">Completed</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="assets/images/image-gallery/2.jpg" > <img class="img-fluid img-thumbnail" src="assets/images/image-gallery/2.jpg" alt=""> </a> </div> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src='{{ asset('adminasset/interval.js') }}'></script>   
<script src="{{ asset('fullcalendar/main.min.js') }}" integrity="sha256-TdTSDSjuCyswg+ZC7ekTsOatmHRtTdToHybuyu2TZnY=" crossorigin="anonymous"></script>
<script>

  $(document).ready(function() {
      var events = [];
    $.ajax({
    url: '{{ Route("calenderschedule") }}',
    type: 'GET',
    dataType: 'JSON',
    
    success: function(data) {
    //   var events = [];
    var events = [];
        $.each(data, function(i, item) {
            
          events.push({
              id: item.id,
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
            text: "From "+calEvent.start_time+ " to "+calEvent.end_time,//Event Start Date
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Mark Done',
  denyButtonText: `Not Done`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    $.get('/pendschedule/'+ calEvent.id, function (data) {
			console.log(data,'the locations')
   
			});
    Swal.fire('Marked Done, waiting for approval!', '', 'success')
    window.location.reload()
  } else if (result.isDenied) {
    Swal.fire('Not marked done are not saved', '', 'info')
  }
})
      }

 


    });
    }
     
  })
  });

</script>

<script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{ asset('assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script> <!-- Light Gallery Plugin Js --> 
<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script><!--/ calender javascripts --> 

<script src="{{ asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{ asset('assets/js/pages/medias/image-gallery.js')}}"></script>
{{-- <script src="assets/js/pages/calendar/calendar.js"></script> --}}
</body>
</html>