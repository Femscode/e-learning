@extends('layout.adminmaster')
@section('head-links')
@stop

@section('content')

<div class="row g-6 g-xl-9">
    <!--begin::Col-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        <h3 class="fw-bolder my-2">Schedule Task
            <span class="fs-6 text-gray-400 fw-bold ms-1"></span>
        </h3>
        <!--end::Heading-->
        <!--begin::Actions-->
      
        <!--end::Actions-->
    </div>
</div>
    <!--end::Toolbar-->
    <!--begin::Row-->
    <div class='card'>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
            <div class='alert alert-success'>{{Session::get('message')}}</div>
            @endif
            <!--begin::Tab Content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                {{-- <form id='schedule_form' enctype="multipart/form-data" action='{{route("schedule_task")}}'>@csrf --}}
                <form method='post' enctype="multipart/form-data" action='{{route("scheduletask")}}'>@csrf
                    <div id="kt_activity_today"
                        class="card-body p-0 tab-pane fade show active" role="tabpanel"
                        aria-labelledby="kt_activity_today_tab">
                        {{-- <select multiple='multiple' id='id' name="id[]" data-control="select2"
                            data-dropdown-parent="#kt_modal_new_address"
                            data-placeholder="Select a Country..."
                            class="form-select form-select-solid select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true"
                            data-select2-id="select2-data-300-owhh" required>
                            <option value=''>Select user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    data-select2-id="select2-data-302-xzjt">{{ $user->email }}
                                </option>
                            @endforeach
                        </select> --}}

                        <select required name="userId[]" multiple aria-label="Select Users" data-control="select2" data-placeholder="Select Users..." class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-10-t0j8" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="select2-data-12-qbd7"></option>
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
                                    class="form-control form-control-solid" placeholder=""
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
                                    class="form-control form-control-solid" placeholder=""
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
                                    class="form-control form-control-solid" placeholder=""
                                    id="schedule_date">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                            {{-- <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Month</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <select name="schedule_month[]" multiple="" aria-label="Select month" data-hide-search="true" data-control="select2" data-placeholder="Select month" class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-14-115z" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-15-tbnw"></option>
                                                                                  
                                <option value=''>Select Months</option>
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
                               
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Week</label>
                                    <select name="schedule_week[]" multiple="" aria-label="Select week" data-hide-search="true" data-control="select2" data-placeholder="Select week" class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-13-118z" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-14-tbnw"></option>
                                  
                                    <option value=''>Select Weeks</option>
                                    <option value='Week 1'>Week 1</option>
                                    <option value='Week 2'>Week 2</option>
                                    <option value='Week 3'>Week 3</option>
                                    <option value='Week 4'>Week 4</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Week</label>
                                <select name="schedule_day[]" multiple="" aria-label="Select days" data-hide-search="true" data-control="select2" data-placeholder="Select days" class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-18-111z" tabindex="-1" aria-hidden="true">

                                    <option value=''>Select Days</option>
                                    <option value='Monday'>Monday</option>
                                    <option value='Tuesday'>Tuesday</option>
                                    <option value='Wednesday'>Wednesday</option>
                                    <option value='Thursday'>Thursday</option>
                                    <option value='Friday'>Friday</option>
                                    <option value='Saturday'>Saturday</option>
                                   
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                                </div>
                            <!--end::Col-->
                            </div> --}}
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
                                    class="form-control form-control-solid" placeholder=""
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
                                    class="form-control form-control-solid" placeholder=""
                                    id="schedule_end_time" name="schedule_end_time">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div>
                            <!--begin::Col-->
                            {{-- <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Task</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type="file" class="form-control form-control-solid"
                                    placeholder="" name="task"
                                    id="schedule_task">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">
                                </div>
                            </div> --}}
                            <!--end::Col-->
                        </div>
                    </div>

                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit"
                            class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
            
                </form>
          
                <!--end::Tab Content-->
        </div>
    </div>
    <!--end::Pagination-->
   

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

@stop