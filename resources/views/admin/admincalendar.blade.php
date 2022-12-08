@extends('admin.adminmaster')
@section('header')
<h5>Schedule Calender</h5>
@stop
@section('content')
     <div class="nk-content-inner">
                        <div class="nk-content-body p-0">
                            <div class="nk-block">
                                <div class="card bg-transparent">
                                    <div class="card-inner py-3 border-bottom border-light rounded-0">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h3 class="nk-block-title page-title">Calendar</h3>
                                                </div><!-- .nk-block-head-content -->
                                                <div class="nk-block-head-content d-flex">
                                                    <a href="#" class="link link-primary" data-toggle="modal" data-target="#addEventPopup"><em class="icon ni ni-plus"></em> <span>Add Event</span></a>
                                                </div><!-- .nk-block-head-content -->
                                            </div><!-- .nk-block-between -->
                                        </div><!-- .nk-block-head -->
                                    </div>
                                </div>
                                <div class="card mt-0">
                                    <div class="card-inner">
                                        <div id="calendar" class="nk-calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop
@section('script')
 
<script src="{{ asset('fullcalendar/moment.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/jquery.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js')}}" ></script>
<script src="{{ asset('fullcalendar/bootstrap.min.js')}}"></script>
<script src="{{ asset('fullcalendar/sweetalert2.all.min.js')}}" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script>

{{-- <script src="{{ asset('fullcalendar/main.min.js') }}" integrity="sha256-TdTSDSjuCyswg+ZC7ekTsOatmHRtTdToHybuyu2TZnY=" crossorigin="anonymous"></script> --}}

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
@stop