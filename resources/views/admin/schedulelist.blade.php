@extends('admin.adminmaster')
@section('header')
<h5 style='float:left'> All Schedule</h5>
<!-- Button trigger modal -->


@stop
@section('subheader')
@if(Session::has('message'))
<div class='alert alert-success'>{{ Session::get('message') }}
@endif
@stop
@section('content')
<h2>All Schedule</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Create Schedule
</button>
<a href='/admincalendar' class='btn btn-info'>Schedule Calender</a>

<div class="nk-block nk-block-lg">

    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        {{-- <th class="nk-tb-col tb-col-mb"><span class="sub-text">Month</span></th> --}}

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $key => $user)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                               
                                <div class="user-info">
                                    <span class="tb-lead">{{ $user->schedule_title }} <span
                                            class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{ $user->schedule_description }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{ $user->user->name }}</span>
                        </td>
                        {{-- <td class="nk-tb-col tb-col-lg">
                            <span>{{ $user->month }}</span>
                        </td> --}}
                        <td class="nk-tb-col tb-col-md">
                            @if($user->status == 0)
                                    <span class="badge badge-danger">Not Done</span>
                                    @elseif($user->status == 2)
                                    <span class="badge badge-warning">Pending</span>
                                    @else
                                    <span class="badge badge-success">Done</span>
                                    @endif
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a id='mark_schedule' data-id="{{ $user->id }}"
                                                        data-name="{{ $user->schedule_title }}"><em
                                                            class="icon ni ni-focus"></em><span>Mark Done
                                                        </span></a></li>
                                                <li><a id='unmark_schedule' data-id="{{ $user->id }}"
                                                        data-name="{{ $user->schedule_title }}"><em
                                                            class="icon ni ni-info"></em><span>Unmark
                                                        </span></a></li>
                                                <li><a id='delete_schedule' data-id="{{ $user->id }}"
                                                        data-name="{{ $user->schedule_title }}"><em
                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div><!-- .card-preview -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='post' enctype="multipart/form-data" action='{{route("scheduletask")}}'>@csrf
                    <div id="kt_activity_today"
                        class="card-body p-0 tab-pane fade show active" role="tabpanel"
                        aria-labelledby="kt_activity_today_tab">
                       
                        <select required name="userId[]" multiple aria-label="Select Users" data-control="select2" data-placeholder="Select Users..." class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-10-t0j8" tabindex="-1" aria-hidden="true">
                            {{-- <option data-select2-id="select2-data-12-qbd7"></option> --}}
                            @foreach(App\User::all() as $user)
                            <option value='{{$user->id}}'>{{$user->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Schedule
                                    Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required
                                    class="form-control" placeholder=""
                                    minlength='3' id="schedule_title" name="schedule_title">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Schedule
                                    Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required 
                                    class="form-control" placeholder=""
                                    minlength='8' id="schedule_description" name="schedule_description"/>
                             
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Schedule
                                    Date</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type='date' multiple name="schedule_date[]" required min='{{date("Y-m-d")}}'
                                    class="form-control" placeholder=""
                                    id="schedule_ate">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                           <br><br>
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <!--end::Col-->
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Starting
                                    Time</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" required
                                    class="form-control" placeholder=""
                                    id="schedule_start_time" name="schedule_start_time">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Ending Time</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" required min="07:00" max="24:00"
                                    class="form-control" placeholder=""
                                    id="schedule_end_time" name="schedule_end_time">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                         
                            <!--end::Col-->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            
                </form>
            </div>
            
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function () {
    var $j = jQuery.noConflict();
    $( "#schedule_date" ).datepicker({ dateFormat: "yyyy-mm-dd" });
        $("#schedule_start_time").on('change',function() {
            
            
            value = $("#schedule_start_time").val()
            
            $("#schedule_end_time").attr('min',value)
           
        })
    
    })
</script>
<script>
    $(document).ready(function() {
    $('body').on('click', '#delete_schedule', function () {
            // var id = $("#delete_id").val();
            id = $(this).data('id');
            name = $(this).data('name');
            console.log(id)
            var token = $("meta[name='csrf-token']").attr("content");
            var el = this;
            // alert(user_id);
            resetAccount(el,id, name);
            });


        async function resetAccount(el,id,name) {
                const willUpdate = await swal({
                    title: "Confirm Schedule Delete",
                    text: `Are you sure you want to delete the schedule "`+name+`" ?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Delete"]
                });
                if (willUpdate) {
                    //performReset()
                    performDelete(el,id);
                } else {
                    swal("Schedule '"+ name + "' will not be deleted  :)");
                }
            }


        function performDelete(el,id)
            {
               
                try {
                        $.get('/deleteschedule/' + id,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"Schedule successfully deleted!.",'success');
                                $(el).closest( "tr" ).remove();
                                // alert.then(() => {
                                // });
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }
    



$('body').on('click', '#mark_schedule', function () {
            // var id = $("#delete_id").val();
            id = $(this).data('id');
            name = $(this).data('name');
            console.log(id)
            var token = $("meta[name='csrf-token']").attr("content");
            var el = this;
            // alert(user_id);
            markSchedule(el,id, name);
            });


        async function markSchedule(el,id,name) {
                const willUpdate = await swal({
                    title: "Confirm Schedule Approval",
                    text: `Are you sure you want to approve the schedule "`+name+`" ?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Approve"]
                });
                if (willUpdate) {
                    //performReset()
                    performMark(el,id);
                } else {
                    swal("Schedule '"+ name + "' will not be marked done  :)");
                }
            }


        function performMark(el,id)
            {
               
                try {
                        $.get('/markschedule/' + id,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"Schedule successfully deleted!.",'success');
                                window.location.reload()
                                // $(el).closest( "tr" ).remove();
                                // alert.then(() => {
                                // });
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }


            $('body').on('click', '#unmark_schedule', function () {
            // var id = $("#delete_id").val();
            id = $(this).data('id');
            name = $(this).data('name');
            console.log(id)
            var token = $("meta[name='csrf-token']").attr("content");
            var el = this;
            // alert(user_id);
            unMarkSchedule(el,id, name);
            });


        async function unMarkSchedule(el,id,name) {
                const willUpdate = await swal({
                    title: "Confirm Schedule Unmark",
                    text: `Are you sure you want to unmark the schedule "`+name+`" ?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Unmark"]
                });
                if (willUpdate) {
                    //performReset()
                    performUnmark(el,id);
                } else {
                    swal("Schedule '"+ name + "' will not be marked  :)");
                }
            }


        function performUnmark(el,id)
            {
               
                try {
                        $.get('/unmarkschedule/' + id,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"Schedule successfully unmarked!.",'success');
                                window.location.reload()
                                // $(el).closest( "tr" ).remove();
                                // alert.then(() => {
                                // });
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }
    

    
})

</script>
@stop