@extends('layout.adminmaster')
@section('head-links')
@stop

@section('content')

                            <div class="d-flex flex-wrap flex-stack mb-6">
                                <!--begin::Heading-->
                                <h3 class="fw-bolder my-2">Schedule Task
                                    <span class="fs-6 text-gray-400 fw-bold ms-1"></span>
                                </h3>
                                <!--end::Heading-->
                                <!--begin::Actions-->
                              
                                <!--end::Actions-->
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
                                                        <input type="date" name="schedule_date" required min='{{date("Y-m-d")}}'
                                                            class="form-control form-control-solid" placeholder=""
                                                            id="schedule_date">
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
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
                            <!--begin::Modals-->
                            <!--begin::Modal - Create Project-->
                            <div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-fullscreen p-12 ml-24 mr-12">
                                    <!--begin::Modal content-->
                                    <div class="modal-content rounded">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2>Schedule Task</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y m-5">
                                            <!--begin::Stepper-->
                                            <div class="stepper stepper-links d-flex flex-column"
                                                id="kt_modal_create_project_stepper">
                                                <!--begin::Container-->
                                                <div class="container">
                                                    <!--begin::Nav-->
                                                    <div class="stepper-nav justify-content-center py-2">
                                                        <!--begin::Step 1-->
                                                        <div class="stepper-item me-5 me-md-15 current"
                                                            data-kt-stepper-element="nav">
                                                            <h3 class="stepper-title">Schedule Task</h3>
                                                        </div>
                                                      
                                                        <!--end::Step 7-->
                                                    </div>
                                                    <!--end::Nav-->
                                                    <!--begin::Form-->
                                                    <form class="mx-auto w-100 mw-600px pt-15 pb-10"
                                                        novalidate="novalidate" id="kt_modal_create_project_form"
                                                        method="post">
                                                        <!--begin::Type-->
                                                        <div class="current" data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-7 pb-lg-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Schedule Task</h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">Schedule Task
                                                                        For Users

                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                               
                                                                <!--end::Input group-->
                                                                <!--begin::Actions-->
                                                               
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Type-->
                                                        <!--begin::Settings-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Project Settings
                                                                    </h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check
                                                                        <a href="#" class="link-primary">Project
                                                                            Guidelines</a>
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Dropzone-->
                                                                    <div class="dropzone"
                                                                        id="kt_modal_create_project_settings_logo">
                                                                        <!--begin::Message-->
                                                                        <div class="dz-message needsclick">
                                                                            <!--begin::Icon-->
                                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-3hx svg-icon-primary">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 12.6L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L8 12.6H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V12.6H16Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                            <!--end::Icon-->
                                                                            <!--begin::Info-->
                                                                            <div class="ms-4">
                                                                                <h3
                                                                                    class="dfs-3 fw-bolder text-gray-900 mb-1">
                                                                                    Drop files here or click to upload.
                                                                                </h3>
                                                                                <span
                                                                                    class="fw-bold fs-4 text-muted">Upload
                                                                                    up to 10 files</span>
                                                                            </div>
                                                                            <!--end::Info-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Dropzone-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fs-6 fw-bold mb-2">Customer</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <select class="form-select form-select-solid"
                                                                        data-control="select2" data-hide-search="true"
                                                                        data-placeholder="Select..."
                                                                        name="settings_customer">
                                                                        <option></option>
                                                                        <option value="1">Keenthemes</option>
                                                                        <option value="2">CRM App</option>
                                                                    </select>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                                        <span class="required">Project
                                                                            Name</span>
                                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Specify project name"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Enter Project Name"
                                                                        value="StockPro Mobile App"
                                                                        name="settings_name" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label class="required fs-6 fw-bold mb-2">Project
                                                                        Description</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <textarea class="form-control form-control-solid"
                                                                        rows="3" placeholder="Enter Project Description"
                                                                        name="settings_description">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label class="required fs-6 fw-bold mb-2">Release
                                                                        Date</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Wrapper-->
                                                                    <div
                                                                        class="position-relative d-flex align-items-center">
                                                                        <!--begin::Icon-->
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 position-absolute mx-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <!--end::Icon-->
                                                                        <!--begin::Input-->
                                                                        <input
                                                                            class="form-control form-control-solid ps-12"
                                                                            placeholder="Pick date range"
                                                                            name="settings_release_date" />
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-15">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack">
                                                                        <!--begin::Label-->
                                                                        <div class="me-5">
                                                                            <label
                                                                                class="required fs-6 fw-bold">Notifications</label>
                                                                            <div class="fs-7 fw-bold text-muted">Allow
                                                                                Notifications by Phone or Email</div>
                                                                        </div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Checkboxes-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-10">
                                                                                <!--begin::Input-->
                                                                                <input
                                                                                    class="form-check-input h-20px w-20px"
                                                                                    type="checkbox" value="email"
                                                                                    name="settings_notifications[]" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <span
                                                                                    class="form-check-label fw-bold">Email</span>
                                                                                <!--end::Label-->
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input
                                                                                    class="form-check-input h-20px w-20px"
                                                                                    type="checkbox" value="phone"
                                                                                    checked="checked"
                                                                                    name="settings_notifications[]" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <span
                                                                                    class="form-check-label fw-bold">Phone</span>
                                                                                <!--end::Label-->
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Checkboxes-->
                                                                    </div>
                                                                    <!--begin::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-stack">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="settings-previous">Project
                                                                        Type</button>
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-primary"
                                                                        data-kt-element="settings-next">
                                                                        <span class="indicator-label">Budget</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Settings-->
                                                        <!--begin::Budget-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-10 pb-lg-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Budget</h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check
                                                                        <a href="#" class="link-primary">Project
                                                                            Guidelines</a>
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                        <span class="required">Setup
                                                                            Budget</span>
                                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-trigger="hover" data-bs-html="true"
                                                                            data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Dialer-->
                                                                    <div class="position-relative w-lg-250px"
                                                                        id="kt_modal_create_project_budget_setup"
                                                                        data-kt-dialer="true" data-kt-dialer-min="50"
                                                                        data-kt-dialer-max="50000"
                                                                        data-kt-dialer-step="100"
                                                                        data-kt-dialer-prefix="$"
                                                                        data-kt-dialer-decimals="2">
                                                                        <!--begin::Decrease control-->
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
                                                                            data-kt-dialer-control="decrease">
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen042.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20" rx="10"
                                                                                        fill="black" />
                                                                                    <rect x="6.01041" y="10.9247"
                                                                                        width="12" height="2" rx="1"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                        <!--end::Decrease control-->
                                                                        <!--begin::Input control-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid border-0 ps-12"
                                                                            data-kt-dialer-control="input"
                                                                            placeholder="Amount" name="budget_setup"
                                                                            readonly="readonly" value="$50" />
                                                                        <!--end::Input control-->
                                                                        <!--begin::Increase control-->
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
                                                                            data-kt-dialer-control="increase">
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20" rx="10"
                                                                                        fill="black" />
                                                                                    <rect x="10.8891" y="17.8033"
                                                                                        width="12" height="2" rx="1"
                                                                                        transform="rotate(-90 10.8891 17.8033)"
                                                                                        fill="black" />
                                                                                    <rect x="6.01041" y="10.9247"
                                                                                        width="12" height="2" rx="1"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                        <!--end::Increase control-->
                                                                    </div>
                                                                    <!--end::Dialer-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">Budget
                                                                        Usage</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Row-->
                                                                    <div class="row g-9" data-kt-buttons="true"
                                                                        data-kt-buttons-target="[data-kt-button='true']">
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 col-lg-12 col-xxl-6">
                                                                            <!--begin::Option-->
                                                                            <label
                                                                                class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                                                                data-kt-button="true">
                                                                                <!--begin::Radio-->
                                                                                <span
                                                                                    class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="budget_usage"
                                                                                        value="1" checked="checked" />
                                                                                </span>
                                                                                <!--end::Radio-->
                                                                                <!--begin::Info-->
                                                                                <span class="ms-5">
                                                                                    <span
                                                                                        class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Precise
                                                                                        Usage</span>
                                                                                    <span
                                                                                        class="fw-bold fs-7 text-gray-600">Withdraw
                                                                                        money to your bank account per
                                                                                        transaction under $50,000
                                                                                        budget</span>
                                                                                </span>
                                                                                <!--end::Info-->
                                                                            </label>
                                                                            <!--end::Option-->
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 col-lg-12 col-xxl-6">
                                                                            <!--begin::Option-->
                                                                            <label
                                                                                class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                                                data-kt-button="true">
                                                                                <!--begin::Radio-->
                                                                                <span
                                                                                    class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="budget_usage"
                                                                                        value="2" />
                                                                                </span>
                                                                                <!--end::Radio-->
                                                                                <!--begin::Info-->
                                                                                <span class="ms-5">
                                                                                    <span
                                                                                        class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Extreme
                                                                                        Usage</span>
                                                                                    <span
                                                                                        class="fw-bold fs-7 text-gray-600">Withdraw
                                                                                        money to your bank account per
                                                                                        transaction under $50,000
                                                                                        budget</span>
                                                                                </span>
                                                                                <!--end::Info-->
                                                                            </label>
                                                                            <!--end::Option-->
                                                                        </div>
                                                                        <!--end::Col-->
                                                                    </div>
                                                                    <!--end::Row-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-15">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack">
                                                                        <!--begin::Label-->
                                                                        <div class="me-5">
                                                                            <label class="fs-6 fw-bold">Allow
                                                                                Changes in Budget</label>
                                                                            <div class="fs-7 fw-bold text-muted">If
                                                                                you need more info, please check budget
                                                                                planning</div>
                                                                        </div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Switch-->
                                                                        <label
                                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1"
                                                                                name="budget_allow" checked="checked" />
                                                                            <span
                                                                                class="form-check-label fw-bold text-muted">Allowed</span>
                                                                        </label>
                                                                        <!--end::Switch-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-stack">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="budget-previous">Project
                                                                        Settings</button>
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-primary"
                                                                        data-kt-element="budget-next">
                                                                        <span class="indicator-label">Build
                                                                            Team</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Budget-->
                                                        <!--begin::Team-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Build a Team</h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check
                                                                        <a href="#" class="link-primary">Project
                                                                            Guidelines</a>
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="mb-8">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">Invite
                                                                        Teammates</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Add project memnbers by name or email.."
                                                                        name="invite_teammates" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="mb-8">
                                                                    <!--begin::Label-->
                                                                    <div class="fs-6 fw-bold mb-2">Team Members</div>
                                                                    <!--end::Label-->
                                                                    <!--begin::Users-->
                                                                    <div class="mh-300px scroll-y me-n7 pe-7">
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-1.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                                                        Smith</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        e.smith@kpmg.com.au</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                                                        Macy</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        melody@altbox.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1"
                                                                                        selected="selected">Guest
                                                                                    </option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-26.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Admin</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        max@kt.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-4.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                                                                        Bean</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        sean@dellito.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-15.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                                                                        Cox</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        brian@exchange.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                                                                        Collins</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        mikaela@pexcom.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-8.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                                                                        Mitcham</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        f.mitcham@kpmg.com.au</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                                                                        Wild</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        olivia@corpmail.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                                                                        Owen</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        owen.neil@gmail.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1"
                                                                                        selected="selected">Guest
                                                                                    </option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-6.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                                                                        Wilson</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        dam@consilting.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                                                        Bold</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        emma@intenso.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-7.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                                                                        Crown</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        ana.cf@limtel.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1"
                                                                                        selected="selected">Guest
                                                                                    </option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                                                        Doe</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        robert@benko.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-17.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                                                        Miller</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        miller@mapple.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <span
                                                                                        class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                                                        Kunic</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        lucy.m@fentech.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2"
                                                                                        selected="selected">Owner
                                                                                    </option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-10.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                                                                        Wilder</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        ethan@loop.com.au</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1"
                                                                                        selected="selected">Guest
                                                                                    </option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3">Can Edit</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                        <!--begin::User-->
                                                                        <div class="d-flex flex-stack py-4">
                                                                            <!--begin::Details-->
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div
                                                                                    class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic"
                                                                                        src="../../../assets/media/avatars/150-17.jpg" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-5">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                                                        Miller</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        miller@mapple.com</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--end::Details-->
                                                                            <!--begin::Access menu-->
                                                                            <div class="ms-2 w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true">
                                                                                    <option value="1">Guest</option>
                                                                                    <option value="2">Owner</option>
                                                                                    <option value="3"
                                                                                        selected="selected">Can Edit
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Access menu-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Users-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Notice-->
                                                                <div class="d-flex flex-stack mb-15">
                                                                    <!--begin::Label-->
                                                                    <div class="me-5 fw-bold">
                                                                        <label class="fs-6">Adding Users by
                                                                            Team Members</label>
                                                                        <div class="fs-7 text-muted">If you need more
                                                                            info, please check budget planning</div>
                                                                    </div>
                                                                    <!--end::Label-->
                                                                    <!--begin::Switch-->
                                                                    <label
                                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value=""
                                                                            checked="checked" />
                                                                    </label>
                                                                    <!--end::Switch-->
                                                                </div>
                                                                <!--end::Notice-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-stack">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="team-previous">Budget</button>
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-primary"
                                                                        data-kt-element="team-next">
                                                                        <span class="indicator-label">Set
                                                                            Target</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Team-->
                                                        <!--begin::Targets-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Set First Target
                                                                    </h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Title-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check
                                                                        <a href="#" class="link-primary">Project
                                                                            Guidelines</a>
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <label class="fs-6 fw-bold mb-2">Target
                                                                        Title</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Enter Target Title"
                                                                        name="Project Launch" />
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="row g-9 mb-8">
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 fv-row">
                                                                        <label
                                                                            class="required fs-6 fw-bold mb-2">Assign</label>
                                                                        <select class="form-select form-select-solid"
                                                                            data-control="select2"
                                                                            data-hide-search="true"
                                                                            data-placeholder="Select a Team Member"
                                                                            name="target_assign">
                                                                            <option></option>
                                                                            <option value="1">Karina Clark</option>
                                                                            <option value="2" selected="selected">Robert
                                                                                Doe</option>
                                                                            <option value="3">Niel Owen</option>
                                                                            <option value="4">Olivia Wild</option>
                                                                            <option value="5">Sean Bean</option>
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 fv-row">
                                                                        <label class="required fs-6 fw-bold mb-2">Due
                                                                            Date</label>
                                                                        <div
                                                                            class="position-relative d-flex align-items-center">
                                                                            <!--begin::Icon-->
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-2 position-absolute mx-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                            <!--end::Icon-->
                                                                            <!--begin::Datepicker-->
                                                                            <input
                                                                                class="form-control form-control-solid ps-12"
                                                                                placeholder="Pick date range"
                                                                                name="target_due_date" />
                                                                            <!--end::Datepicker-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <label class="fs-6 fw-bold mb-2">Target
                                                                        Details</label>
                                                                    <textarea class="form-control form-control-solid"
                                                                        rows="2" name="target_details"
                                                                        placeholder="Type Target Details">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <label
                                                                        class="required fs-6 fw-bold mb-2">Tags</label>
                                                                    <input class="form-control form-control-solid"
                                                                        value="Important, Urgent" name="target_tags" />
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack">
                                                                        <!--begin::Label-->
                                                                        <div class="me-5">
                                                                            <label class="fs-6 fw-bold">Allow
                                                                                Changes in Budget</label>
                                                                            <div class="fs-7 fw-bold text-muted">If
                                                                                you need more info, please check budget
                                                                                planning</div>
                                                                        </div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Switch-->
                                                                        <label
                                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1"
                                                                                name="target_allow" checked="checked" />
                                                                            <span
                                                                                class="form-check-label fw-bold text-muted">Allowed</span>
                                                                        </label>
                                                                        <!--end::Switch-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-15">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack">
                                                                        <!--begin::Label-->
                                                                        <div class="me-5">
                                                                            <label
                                                                                class="fs-6 fw-bold">Notifications</label>
                                                                            <div class="fs-7 fw-bold text-muted">Allow
                                                                                Notifications by Phone or Email</div>
                                                                        </div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Checkboxes-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-10">
                                                                                <!--begin::Input-->
                                                                                <input
                                                                                    class="form-check-input h-20px w-20px"
                                                                                    type="checkbox" value="email"
                                                                                    name="target_notifications[]" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <span
                                                                                    class="form-check-label fw-bold">Email</span>
                                                                                <!--end::Label-->
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input
                                                                                    class="form-check-input h-20px w-20px"
                                                                                    type="checkbox" value="phone"
                                                                                    checked="checked"
                                                                                    name="target_notifications[]" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <span
                                                                                    class="form-check-label fw-bold">Phone</span>
                                                                                <!--end::Label-->
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Checkboxes-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-stack">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="targets-previous">Build a
                                                                        Team</button>
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-primary"
                                                                        data-kt-element="targets-next">
                                                                        <span class="indicator-label">Upload
                                                                            Files</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Targets-->
                                                        <!--begin::Files-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-10 pb-lg-12">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Upload Files</h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check
                                                                        <a href="#" class="link-primary">Project
                                                                            Guidelines</a>
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Dropzone-->
                                                                    <div class="dropzone"
                                                                        id="kt_modal_create_project_files_upload">
                                                                        <!--begin::Message-->
                                                                        <div class="dz-message needsclick">
                                                                            <!--begin::Icon-->
                                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-3hx svg-icon-primary">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 12.6L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L8 12.6H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V12.6H16Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                            <!--end::Icon-->
                                                                            <!--begin::Info-->
                                                                            <div class="ms-4">
                                                                                <h3
                                                                                    class="dfs-3 fw-bolder text-gray-900 mb-1">
                                                                                    Drop files here or click to upload.
                                                                                </h3>
                                                                                <span
                                                                                    class="fw-bold fs-4 text-muted">Upload
                                                                                    up to 10 files</span>
                                                                            </div>
                                                                            <!--end::Info-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Dropzone-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="mb-8">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">Uploaded
                                                                        File</label>
                                                                    <!--End::Label-->
                                                                    <!--begin::Files-->
                                                                    <div class="mh-300px scroll-y me-n7 pe-7">
                                                                        <!--begin::File-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px">
                                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/pdf.svg"
                                                                                        alt="icon" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-6">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Avionica
                                                                                        Technical Requirements</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        230kb</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--begin::Menu-->
                                                                            <div class="min-w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true"
                                                                                    data-placeholder="Edit">
                                                                                    <option></option>
                                                                                    <option value="1">Remove</option>
                                                                                    <option value="2">Modify</option>
                                                                                    <option value="3">Select</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Menu-->
                                                                        </div>
                                                                        <!--end::File-->
                                                                        <!--begin::File-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px">
                                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg"
                                                                                        alt="icon" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-6">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">9
                                                                                        Degree CURD draftplan</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        3.6mb</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--begin::Menu-->
                                                                            <div class="min-w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true"
                                                                                    data-placeholder="Edit">
                                                                                    <option></option>
                                                                                    <option value="1">Remove</option>
                                                                                    <option value="2">Modify</option>
                                                                                    <option value="3">Select</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Menu-->
                                                                        </div>
                                                                        <!--end::File-->
                                                                        <!--begin::File-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px">
                                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/css.svg"
                                                                                        alt="icon" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-6">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">User
                                                                                        CRUD Styles</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        85kb</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--begin::Menu-->
                                                                            <div class="min-w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true"
                                                                                    data-placeholder="Edit">
                                                                                    <option></option>
                                                                                    <option value="1">Remove</option>
                                                                                    <option value="2">Modify</option>
                                                                                    <option value="3">Select</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Menu-->
                                                                        </div>
                                                                        <!--end::File-->
                                                                        <!--begin::File-->
                                                                        <div
                                                                            class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px">
                                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/ai.svg"
                                                                                        alt="icon" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-6">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Design
                                                                                        Initial Logo</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        40kb</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--begin::Menu-->
                                                                            <div class="min-w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true"
                                                                                    data-placeholder="Edit">
                                                                                    <option></option>
                                                                                    <option value="1">Remove</option>
                                                                                    <option value="2">Modify</option>
                                                                                    <option value="3">Select</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Menu-->
                                                                        </div>
                                                                        <!--end::File-->
                                                                        <!--begin::File-->
                                                                        <div class="d-flex flex-stack py-4">
                                                                            <div class="d-flex align-items-center">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px">
                                                                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/tif.svg"
                                                                                        alt="icon" />
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                                <!--begin::Details-->
                                                                                <div class="ms-6">
                                                                                    <a href="#"
                                                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Tower
                                                                                        Hill Bilboard</a>
                                                                                    <div class="fw-bold text-muted">
                                                                                        27mb</div>
                                                                                </div>
                                                                                <!--end::Details-->
                                                                            </div>
                                                                            <!--begin::Menu-->
                                                                            <div class="min-w-100px">
                                                                                <select
                                                                                    class="form-select form-select-solid form-select-sm"
                                                                                    data-control="select2"
                                                                                    data-hide-search="true"
                                                                                    data-placeholder="Edit">
                                                                                    <option></option>
                                                                                    <option value="1">Remove</option>
                                                                                    <option value="2">Modify</option>
                                                                                    <option value="3">Select</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Menu-->
                                                                        </div>
                                                                        <!--end::File-->
                                                                    </div>
                                                                    <!--end::Files-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-8">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack">
                                                                        <!--begin::Label-->
                                                                        <div class="me-5">
                                                                            <label class="fs-6 fw-bold">Allow
                                                                                Changes in Budget</label>
                                                                            <div class="fs-7 fw-bold text-muted">If
                                                                                you need more info, please check budget
                                                                                planning</div>
                                                                        </div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Switch-->
                                                                        <label
                                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1"
                                                                                name="target_allow" checked="checked" />
                                                                            <span
                                                                                class="form-check-label fw-bold text-muted">Allowed</span>
                                                                        </label>
                                                                        <!--end::Switch-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-stack">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="files-previous">Set First
                                                                        Target</button>
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-primary"
                                                                        data-kt-element="files-next">
                                                                        <span class="indicator-label">Complete</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Files-->
                                                        <!--begin::Complete-->
                                                        <div data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <!--begin::Heading-->
                                                                <div class="pb-12 text-center">
                                                                    <!--begin::Title-->
                                                                    <h1 class="fw-bolder text-dark">Project Created!
                                                                    </h1>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fw-bold fs-4">If you need
                                                                        more info, please check how to create project
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Actions-->
                                                                <div class="d-flex flex-center pb-20">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-light me-3"
                                                                        data-kt-element="complete-start">Create New
                                                                        Project</button>
                                                                    <a href="#" class="btn btn-lg btn-primary"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Coming Soon">View Project</a>
                                                                </div>
                                                                <!--end::Actions-->
                                                                <!--begin::Illustration-->
                                                                <div class="text-center px-4">
                                                                    <img src="../../../assets/media/illustrations/sketchy-1/9-dark.png"
                                                                        alt="" class="mww-100 mh-350px" />
                                                                </div>
                                                                <!--end::Illustration-->
                                                            </div>
                                                        </div>
                                                        <!--end::Complete-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--begin::Container-->
                                            </div>
                                            <!--end::Stepper-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Create Project-->
                            <!--begin::Modal - Offer A Deal-->
                            <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-1000px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header py-7 d-flex justify-content-between">
                                            <!--begin::Modal title-->
                                            <h2>Offer a Deal</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--begin::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y m-5">
                                            <!--begin::Stepper-->
                                            <div class="stepper stepper-links d-flex flex-column"
                                                id="kt_modal_offer_a_deal_stepper">
                                                <!--begin::Nav-->
                                                <div class="stepper-nav justify-content-center py-2">
                                                    <!--begin::Step 1-->
                                                    <div class="stepper-item me-5 me-md-15 current"
                                                        data-kt-stepper-element="nav">
                                                        <h3 class="stepper-title">Deal Type</h3>
                                                    </div>
                                                    <!--end::Step 1-->
                                                    <!--begin::Step 2-->
                                                    <div class="stepper-item me-5 me-md-15"
                                                        data-kt-stepper-element="nav">
                                                        <h3 class="stepper-title">Deal Details</h3>
                                                    </div>
                                                    <!--end::Step 2-->
                                                    <!--begin::Step 3-->
                                                    <div class="stepper-item me-5 me-md-15"
                                                        data-kt-stepper-element="nav">
                                                        <h3 class="stepper-title">Finance Settings</h3>
                                                    </div>
                                                    <!--end::Step 3-->
                                                    <!--begin::Step 4-->
                                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                                        <h3 class="stepper-title">Completed</h3>
                                                    </div>
                                                    <!--end::Step 4-->
                                                </div>
                                                <!--end::Nav-->
                                                <!--begin::Form-->
                                                <form class="mx-auto mw-500px w-100 pt-15 pb-10"
                                                    novalidate="novalidate" id="kt_modal_offer_a_deal_form">
                                                    <!--begin::Type-->
                                                    <div class="current" data-kt-stepper-element="content">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100">
                                                            <!--begin::Heading-->
                                                            <div class="mb-13">
                                                                <!--begin::Title-->
                                                                <h2 class="mb-3">Deal Type</h2>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fw-bold fs-5">If you need more
                                                                    info, please check out
                                                                    <a href="#" class="link-primary fw-bolder">FAQ
                                                                        Page</a>.
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-15" data-kt-buttons="true">
                                                                <!--begin::Option-->
                                                                <label
                                                                    class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 mb-6 active">
                                                                    <!--begin::Input-->
                                                                    <input class="btn-check" type="radio"
                                                                        checked="checked" name="offer_type" value="1" />
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <span class="d-flex">
                                                                        <!--begin::Icon-->
                                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                                        <span class="svg-icon svg-icon-3hx">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <!--end::Icon-->
                                                                        <!--begin::Info-->
                                                                        <span class="ms-4">
                                                                            <span
                                                                                class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Personal
                                                                                Deal</span>
                                                                            <span class="fw-bold fs-4 text-muted">If
                                                                                you need more info, please check it
                                                                                out</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Option-->
                                                                <!--begin::Option-->
                                                                <label
                                                                    class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6">
                                                                    <!--begin::Input-->
                                                                    <input class="btn-check" type="radio"
                                                                        name="offer_type" value="2" />
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <span class="d-flex">
                                                                        <!--begin::Icon-->
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                                        <span class="svg-icon svg-icon-3hx">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect x="2" y="2" width="9" height="9"
                                                                                    rx="2" fill="black" />
                                                                                <rect opacity="0.3" x="13" y="2"
                                                                                    width="9" height="9" rx="2"
                                                                                    fill="black" />
                                                                                <rect opacity="0.3" x="13" y="13"
                                                                                    width="9" height="9" rx="2"
                                                                                    fill="black" />
                                                                                <rect opacity="0.3" x="2" y="13"
                                                                                    width="9" height="9" rx="2"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <!--end::Icon-->
                                                                        <!--begin::Info-->
                                                                        <span class="ms-4">
                                                                            <span
                                                                                class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Corporate
                                                                                Deal</span>
                                                                            <span
                                                                                class="fw-bold fs-4 text-muted">Create
                                                                                corporate account to manage users</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Option-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" class="btn btn-lg btn-primary"
                                                                    data-kt-element="type-next">
                                                                    <span class="indicator-label">Offer Details</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Type-->
                                                    <!--begin::Details-->
                                                    <div data-kt-stepper-element="content">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100">
                                                            <!--begin::Heading-->
                                                            <div class="mb-13">
                                                                <!--begin::Title-->
                                                                <h2 class="mb-3">Deal Details</h2>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fw-bold fs-5">If you need more
                                                                    info, please check out
                                                                    <a href="#" class="link-primary fw-bolder">FAQ
                                                                        Page</a>.
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="required fs-6 fw-bold mb-2">Customer</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <select class="form-select form-select-solid"
                                                                    data-control="select2"
                                                                    data-placeholder="Select an option"
                                                                    name="details_customer">
                                                                    <option></option>
                                                                    <option value="1" selected="selected">Keenthemes
                                                                    </option>
                                                                    <option value="2">CRM App</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-bold mb-2">Deal
                                                                    Title</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="Enter Deal Title" name="details_title"
                                                                    value="Marketing Campaign" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-bold mb-2">Deal
                                                                    Description</label>
                                                                <!--end::Label-->
                                                                <!--begin::Label-->
                                                                <textarea class="form-control form-control-solid"
                                                                    rows="3" placeholder="Enter Deal Description"
                                                                    name="details_description">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <label class="required fs-6 fw-bold mb-2">Activation
                                                                    Date</label>
                                                                <div
                                                                    class="position-relative d-flex align-items-center">
                                                                    <!--begin::Icon-->
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-2 position-absolute mx-4">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                    <!--end::Icon-->
                                                                    <!--begin::Datepicker-->
                                                                    <input
                                                                        class="form-control form-control-solid ps-12"
                                                                        placeholder="Pick date range"
                                                                        name="details_activation_date" />
                                                                    <!--end::Datepicker-->
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-15">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex flex-stack">
                                                                    <!--begin::Label-->
                                                                    <div class="me-5">
                                                                        <label
                                                                            class="required fs-6 fw-bold">Notifications</label>
                                                                        <div class="fs-7 fw-bold text-muted">Allow
                                                                            Notifications by Phone or Email</div>
                                                                    </div>
                                                                    <!--end::Label-->
                                                                    <!--begin::Checkboxes-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-custom form-check-solid me-10">
                                                                            <!--begin::Input-->
                                                                            <input
                                                                                class="form-check-input h-20px w-20px"
                                                                                type="checkbox" value="email"
                                                                                name="details_notifications[]" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <span
                                                                                class="form-check-label fw-bold">Email</span>
                                                                            <!--end::Label-->
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input
                                                                                class="form-check-input h-20px w-20px"
                                                                                type="checkbox" value="phone"
                                                                                checked="checked"
                                                                                name="details_notifications[]" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <span
                                                                                class="form-check-label fw-bold">Phone</span>
                                                                            <!--end::Label-->
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </div>
                                                                    <!--end::Checkboxes-->
                                                                </div>
                                                                <!--begin::Wrapper-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Actions-->
                                                            <div class="d-flex flex-stack">
                                                                <button type="button"
                                                                    class="btn btn-lg btn-light me-3"
                                                                    data-kt-element="details-previous">Deal
                                                                    Type</button>
                                                                <button type="button" class="btn btn-lg btn-primary"
                                                                    data-kt-element="details-next">
                                                                    <span class="indicator-label">Financing</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Budget-->
                                                    <div data-kt-stepper-element="content">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100">
                                                            <!--begin::Heading-->
                                                            <div class="mb-13">
                                                                <!--begin::Title-->
                                                                <h2 class="mb-3">Finance</h2>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fw-bold fs-5">If you need more
                                                                    info, please check out
                                                                    <a href="#" class="link-primary fw-bolder">FAQ
                                                                        Page</a>.
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                    <span class="required">Setup Budget</span>
                                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                        data-bs-toggle="popover" data-bs-trigger="hover"
                                                                        data-bs-html="true"
                                                                        data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Dialer-->
                                                                <div class="position-relative w-lg-250px"
                                                                    id="kt_modal_finance_setup" data-kt-dialer="true"
                                                                    data-kt-dialer-min="50" data-kt-dialer-max="50000"
                                                                    data-kt-dialer-step="100" data-kt-dialer-prefix="$"
                                                                    data-kt-dialer-decimals="2">
                                                                    <!--begin::Decrease control-->
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
                                                                        data-kt-dialer-control="decrease">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen042.svg-->
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2"
                                                                                    width="20" height="20" rx="10"
                                                                                    fill="black" />
                                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                                    height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                    <!--end::Decrease control-->
                                                                    <!--begin::Input control-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid border-0 ps-12"
                                                                        data-kt-dialer-control="input"
                                                                        placeholder="Amount" name="finance_setup"
                                                                        readonly="readonly" value="$50" />
                                                                    <!--end::Input control-->
                                                                    <!--begin::Increase control-->
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
                                                                        data-kt-dialer-control="increase">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2"
                                                                                    width="20" height="20" rx="10"
                                                                                    fill="black" />
                                                                                <rect x="10.8891" y="17.8033" width="12"
                                                                                    height="2" rx="1"
                                                                                    transform="rotate(-90 10.8891 17.8033)"
                                                                                    fill="black" />
                                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                                    height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                    <!--end::Increase control-->
                                                                </div>
                                                                <!--end::Dialer-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-bold mb-2">Budget Usage</label>
                                                                <!--end::Label-->
                                                                <!--begin::Row-->
                                                                <div class="row g-9" data-kt-buttons="true"
                                                                    data-kt-buttons-target="[data-kt-button='true']">
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 col-lg-12 col-xxl-6">
                                                                        <!--begin::Option-->
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                                                            data-kt-button="true">
                                                                            <!--begin::Radio-->
                                                                            <span
                                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="finance_usage"
                                                                                    value="1" checked="checked" />
                                                                            </span>
                                                                            <!--end::Radio-->
                                                                            <!--begin::Info-->
                                                                            <span class="ms-5">
                                                                                <span
                                                                                    class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Precise
                                                                                    Usage</span>
                                                                                <span
                                                                                    class="fw-bold fs-7 text-gray-600">Withdraw
                                                                                    money to your bank account per
                                                                                    transaction under $50,000
                                                                                    budget</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 col-lg-12 col-xxl-6">
                                                                        <!--begin::Option-->
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                                            data-kt-button="true">
                                                                            <!--begin::Radio-->
                                                                            <span
                                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="finance_usage"
                                                                                    value="2" />
                                                                            </span>
                                                                            <!--end::Radio-->
                                                                            <!--begin::Info-->
                                                                            <span class="ms-5">
                                                                                <span
                                                                                    class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Extreme
                                                                                    Usage</span>
                                                                                <span
                                                                                    class="fw-bold fs-7 text-gray-600">Withdraw
                                                                                    money to your bank account per
                                                                                    transaction under $50,000
                                                                                    budget</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Row-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-15">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex flex-stack">
                                                                    <!--begin::Label-->
                                                                    <div class="me-5">
                                                                        <label class="fs-6 fw-bold">Allow Changes in
                                                                            Budget</label>
                                                                        <div class="fs-7 fw-bold text-muted">If you
                                                                            need more info, please check budget planning
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Label-->
                                                                    <!--begin::Switch-->
                                                                    <label
                                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" value="1"
                                                                            name="finance_allow" checked="checked" />
                                                                        <span
                                                                            class="form-check-label fw-bold text-muted">Allowed</span>
                                                                    </label>
                                                                    <!--end::Switch-->
                                                                </div>
                                                                <!--end::Wrapper-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Actions-->
                                                            <div class="d-flex flex-stack">
                                                                <button type="button"
                                                                    class="btn btn-lg btn-light me-3"
                                                                    data-kt-element="finance-previous">Project
                                                                    Settings</button>
                                                                <button type="button" class="btn btn-lg btn-primary"
                                                                    data-kt-element="finance-next">
                                                                    <span class="indicator-label">Build Team</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Budget-->
                                                    <!--begin::Complete-->
                                                    <div data-kt-stepper-element="content">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100">
                                                            <!--begin::Heading-->
                                                            <div class="mb-13">
                                                                <!--begin::Title-->
                                                                <h2 class="mb-3">Deal Created!</h2>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fw-bold fs-5">If you need more
                                                                    info, please check out
                                                                    <a href="#" class="link-primary fw-bolder">FAQ
                                                                        Page</a>.
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Actions-->
                                                            <div class="d-flex flex-center pb-20">
                                                                <button type="button"
                                                                    class="btn btn-lg btn-light me-3"
                                                                    data-kt-element="complete-start">Create New
                                                                    Deal</button>
                                                                <a href="#" class="btn btn-lg btn-primary"
                                                                    data-bs-toggle="tooltip" title="Coming Soon">View
                                                                    Deal</a>
                                                            </div>
                                                            <!--end::Actions-->
                                                            <!--begin::Illustration-->
                                                            <div class="text-center px-4">
                                                                <img src="../../../assets/media/illustrations/sketchy-1/20-dark.png"
                                                                    alt="" class="mw-100 mh-300px" />
                                                            </div>
                                                            <!--end::Illustration-->
                                                        </div>
                                                    </div>
                                                    <!--end::Complete-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Stepper-->
                                        </div>
                                        <!--begin::Modal body-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal - Offer A Defal-->
                            <!--end::Modals-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2021©</span>
                            <a href="https://keenthemes.com/" target="_blank"
                                class="text-gray-800 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/support" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank"
                                    class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none rounded-0">
            <!--begin::Header-->
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_activities_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body position-relative" id="kt_activities_body">
                <!--begin::Content-->
                <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
                    data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                    data-kt-scroll-offset="5px">
                    <!--begin::Timeline items-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                fill="black" />
                                            <path
                                                d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <select name="country" data-control="select2"
                                        data-dropdown-parent="#kt_modal_new_address"
                                        data-placeholder="Select a Country..."
                                        class="form-select form-select-solid select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true" data-select2-id="select2-data-300-owhh">
                                        <option value="" data-select2-id="select2-data-302-xzjt">Select a Country...
                                        </option>
                                        <option value="AF" data-select2-id="select2-data-310-i06z">Afghanistan</option>
                                        <option value="AX" data-select2-id="select2-data-311-2k70">Aland Islands
                                        </option>
                                        <option value="AL" data-select2-id="select2-data-312-bvbq">Albania</option>
                                        <option value="DZ" data-select2-id="select2-data-313-3h26">Algeria</option>
                                        <option value="AS" data-select2-id="select2-data-314-xd1b">American Samoa
                                        </option>
                                        <option value="AD" data-select2-id="select2-data-315-kq8e">Andorra</option>
                                        <option value="AO" data-select2-id="select2-data-316-h9ap">Angola</option>
                                        <option value="AI" data-select2-id="select2-data-317-qvcn">Anguilla</option>
                                        <option value="AG" data-select2-id="select2-data-318-pdyu">Antigua and Barbuda
                                        </option>
                                        <option value="AR" data-select2-id="select2-data-319-ov08">Argentina</option>
                                        <option value="AM" data-select2-id="select2-data-320-6qs1">Armenia</option>
                                        <option value="AW" data-select2-id="select2-data-321-1ek6">Aruba</option>
                                        <option value="AU" data-select2-id="select2-data-322-f126">Australia</option>
                                        <option value="AT" data-select2-id="select2-data-323-ht32">Austria</option>
                                        <option value="AZ" data-select2-id="select2-data-324-uk5c">Azerbaijan</option>
                                        <option value="BS" data-select2-id="select2-data-325-sw4h">Bahamas</option>
                                        <option value="BH" data-select2-id="select2-data-326-58dv">Bahrain</option>
                                        <option value="BD" data-select2-id="select2-data-327-xbop">Bangladesh</option>
                                        <option value="BB" data-select2-id="select2-data-328-7o7g">Barbados</option>
                                        <option value="BY" data-select2-id="select2-data-329-klef">Belarus</option>
                                        <option value="BE" data-select2-id="select2-data-330-esxf">Belgium</option>
                                        <option value="BZ" data-select2-id="select2-data-331-pnix">Belize</option>
                                        <option value="BJ" data-select2-id="select2-data-332-p4qj">Benin</option>
                                        <option value="BM" data-select2-id="select2-data-333-ajeh">Bermuda</option>
                                        <option value="BT" data-select2-id="select2-data-334-tssv">Bhutan</option>
                                        <option value="BO" data-select2-id="select2-data-335-821b">Bolivia,
                                            Plurinational State of</option>
                                        <option value="BQ" data-select2-id="select2-data-336-pzo1">Bonaire, Sint
                                            Eustatius and Saba</option>
                                        <option value="BA" data-select2-id="select2-data-337-f189">Bosnia and
                                            Herzegovina</option>
                                        <option value="BW" data-select2-id="select2-data-338-wp5h">Botswana</option>
                                        <option value="BR" data-select2-id="select2-data-339-i8z0">Brazil</option>
                                        <option value="IO" data-select2-id="select2-data-340-i225">British Indian Ocean
                                            Territory</option>
                                        <option value="BN" data-select2-id="select2-data-341-35rb">Brunei Darussalam
                                        </option>
                                        <option value="BG" data-select2-id="select2-data-342-qafv">Bulgaria</option>
                                        <option value="BF" data-select2-id="select2-data-343-ws6d">Burkina Faso</option>
                                        <option value="BI" data-select2-id="select2-data-344-905p">Burundi</option>
                                        <option value="KH" data-select2-id="select2-data-345-el39">Cambodia</option>
                                        <option value="CM" data-select2-id="select2-data-346-jpch">Cameroon</option>
                                        <option value="CA" data-select2-id="select2-data-347-1jvv">Canada</option>
                                        <option value="CV" data-select2-id="select2-data-348-9385">Cape Verde</option>
                                        <option value="KY" data-select2-id="select2-data-349-uurk">Cayman Islands
                                        </option>
                                        <option value="CF" data-select2-id="select2-data-350-2yfg">Central African
                                            Republic</option>
                                        <option value="TD" data-select2-id="select2-data-351-e4px">Chad</option>
                                        <option value="CL" data-select2-id="select2-data-352-zt16">Chile</option>
                                        <option value="CN" data-select2-id="select2-data-353-oy62">China</option>
                                        <option value="CX" data-select2-id="select2-data-354-240b">Christmas Island
                                        </option>
                                        <option value="CC" data-select2-id="select2-data-355-bvle">Cocos (Keeling)
                                            Islands</option>
                                        <option value="CO" data-select2-id="select2-data-356-4sbm">Colombia</option>
                                        <option value="KM" data-select2-id="select2-data-357-y0c7">Comoros</option>
                                        <option value="CK" data-select2-id="select2-data-358-etom">Cook Islands</option>
                                        <option value="CR" data-select2-id="select2-data-359-zipf">Costa Rica</option>
                                        <option value="CI" data-select2-id="select2-data-360-v9t1">Côte d'Ivoire
                                        </option>
                                        <option value="HR" data-select2-id="select2-data-361-4j8t">Croatia</option>
                                        <option value="CU" data-select2-id="select2-data-362-v1hx">Cuba</option>
                                        <option value="CW" data-select2-id="select2-data-363-pjg3">Curaçao</option>
                                        <option value="CZ" data-select2-id="select2-data-364-uumo">Czech Republic
                                        </option>
                                        <option value="DK" data-select2-id="select2-data-365-7cql">Denmark</option>
                                        <option value="DJ" data-select2-id="select2-data-366-u5q9">Djibouti</option>
                                        <option value="DM" data-select2-id="select2-data-367-kf44">Dominica</option>
                                        <option value="DO" data-select2-id="select2-data-368-dy6b">Dominican Republic
                                        </option>
                                        <option value="EC" data-select2-id="select2-data-369-qaso">Ecuador</option>
                                        <option value="EG" data-select2-id="select2-data-370-ffzd">Egypt</option>
                                        <option value="SV" data-select2-id="select2-data-371-1vcd">El Salvador</option>
                                        <option value="GQ" data-select2-id="select2-data-372-4k4e">Equatorial Guinea
                                        </option>
                                        <option value="ER" data-select2-id="select2-data-373-oq6f">Eritrea</option>
                                        <option value="EE" data-select2-id="select2-data-374-mr79">Estonia</option>
                                        <option value="ET" data-select2-id="select2-data-375-4ot2">Ethiopia</option>
                                        <option value="FK" data-select2-id="select2-data-376-qygu">Falkland Islands
                                            (Malvinas)</option>
                                        <option value="FJ" data-select2-id="select2-data-377-ieji">Fiji</option>
                                        <option value="FI" data-select2-id="select2-data-378-27ur">Finland</option>
                                        <option value="FR" data-select2-id="select2-data-379-3swv">France</option>
                                        <option value="PF" data-select2-id="select2-data-380-04rw">French Polynesia
                                        </option>
                                        <option value="GA" data-select2-id="select2-data-381-03mk">Gabon</option>
                                        <option value="GM" data-select2-id="select2-data-382-ls5s">Gambia</option>
                                        <option value="GE" data-select2-id="select2-data-383-tcsv">Georgia</option>
                                        <option value="DE" data-select2-id="select2-data-384-hwde">Germany</option>
                                        <option value="GH" data-select2-id="select2-data-385-4t1a">Ghana</option>
                                        <option value="GI" data-select2-id="select2-data-386-9ihg">Gibraltar</option>
                                        <option value="GR" data-select2-id="select2-data-387-4wrs">Greece</option>
                                        <option value="GL" data-select2-id="select2-data-388-9ba9">Greenland</option>
                                        <option value="GD" data-select2-id="select2-data-389-t5lx">Grenada</option>
                                        <option value="GU" data-select2-id="select2-data-390-js65">Guam</option>
                                        <option value="GT" data-select2-id="select2-data-391-lpj1">Guatemala</option>
                                        <option value="GG" data-select2-id="select2-data-392-tsuw">Guernsey</option>
                                        <option value="GN" data-select2-id="select2-data-393-3dpj">Guinea</option>
                                        <option value="GW" data-select2-id="select2-data-394-iesp">Guinea-Bissau
                                        </option>
                                        <option value="HT" data-select2-id="select2-data-395-je5q">Haiti</option>
                                        <option value="VA" data-select2-id="select2-data-396-jmmf">Holy See (Vatican
                                            City State)</option>
                                        <option value="HN" data-select2-id="select2-data-397-li84">Honduras</option>
                                        <option value="HK" data-select2-id="select2-data-398-q1qb">Hong Kong</option>
                                        <option value="HU" data-select2-id="select2-data-399-k6wa">Hungary</option>
                                        <option value="IS" data-select2-id="select2-data-400-j2bv">Iceland</option>
                                        <option value="IN" data-select2-id="select2-data-401-vb73">India</option>
                                        <option value="ID" data-select2-id="select2-data-402-8m4w">Indonesia</option>
                                        <option value="IR" data-select2-id="select2-data-403-eiap">Iran, Islamic
                                            Republic of</option>
                                        <option value="IQ" data-select2-id="select2-data-404-hduu">Iraq</option>
                                        <option value="IE" data-select2-id="select2-data-405-v6ef">Ireland</option>
                                        <option value="IM" data-select2-id="select2-data-406-ng06">Isle of Man</option>
                                        <option value="IL" data-select2-id="select2-data-407-48dx">Israel</option>
                                        <option value="IT" data-select2-id="select2-data-408-95gc">Italy</option>
                                        <option value="JM" data-select2-id="select2-data-409-8gp2">Jamaica</option>
                                        <option value="JP" data-select2-id="select2-data-410-ptt2">Japan</option>
                                        <option value="JE" data-select2-id="select2-data-411-5j7h">Jersey</option>
                                        <option value="JO" data-select2-id="select2-data-412-u9ww">Jordan</option>
                                        <option value="KZ" data-select2-id="select2-data-413-l3c6">Kazakhstan</option>
                                        <option value="KE" data-select2-id="select2-data-414-grsb">Kenya</option>
                                        <option value="KI" data-select2-id="select2-data-415-crxg">Kiribati</option>
                                        <option value="KP" data-select2-id="select2-data-416-vg3o">Korea, Democratic
                                            People's Republic of</option>
                                        <option value="KW" data-select2-id="select2-data-417-wk3p">Kuwait</option>
                                        <option value="KG" data-select2-id="select2-data-418-cqcz">Kyrgyzstan</option>
                                        <option value="LA" data-select2-id="select2-data-419-gdon">Lao People's
                                            Democratic Republic</option>
                                        <option value="LV" data-select2-id="select2-data-420-cqh4">Latvia</option>
                                        <option value="LB" data-select2-id="select2-data-421-ck3r">Lebanon</option>
                                        <option value="LS" data-select2-id="select2-data-422-ovno">Lesotho</option>
                                        <option value="LR" data-select2-id="select2-data-423-5b5y">Liberia</option>
                                        <option value="LY" data-select2-id="select2-data-424-fqf5">Libya</option>
                                        <option value="LI" data-select2-id="select2-data-425-4gii">Liechtenstein
                                        </option>
                                        <option value="LT" data-select2-id="select2-data-426-gzcq">Lithuania</option>
                                        <option value="LU" data-select2-id="select2-data-427-64r6">Luxembourg</option>
                                        <option value="MO" data-select2-id="select2-data-428-aosm">Macao</option>
                                        <option value="MG" data-select2-id="select2-data-429-p486">Madagascar</option>
                                        <option value="MW" data-select2-id="select2-data-430-hnyd">Malawi</option>
                                        <option value="MY" data-select2-id="select2-data-431-22zq">Malaysia</option>
                                        <option value="MV" data-select2-id="select2-data-432-3gtb">Maldives</option>
                                        <option value="ML" data-select2-id="select2-data-433-1cwh">Mali</option>
                                        <option value="MT" data-select2-id="select2-data-434-wt9r">Malta</option>
                                        <option value="MH" data-select2-id="select2-data-435-0l7e">Marshall Islands
                                        </option>
                                        <option value="MQ" data-select2-id="select2-data-436-h5wq">Martinique</option>
                                        <option value="MR" data-select2-id="select2-data-437-a67h">Mauritania</option>
                                        <option value="MU" data-select2-id="select2-data-438-sjuh">Mauritius</option>
                                        <option value="MX" data-select2-id="select2-data-439-z6vh">Mexico</option>
                                        <option value="FM" data-select2-id="select2-data-440-xxh7">Micronesia, Federated
                                            States of</option>
                                        <option value="MD" data-select2-id="select2-data-441-cnfo">Moldova, Republic of
                                        </option>
                                        <option value="MC" data-select2-id="select2-data-442-kter">Monaco</option>
                                        <option value="MN" data-select2-id="select2-data-443-u1vr">Mongolia</option>
                                        <option value="ME" data-select2-id="select2-data-444-oylc">Montenegro</option>
                                        <option value="MS" data-select2-id="select2-data-445-716h">Montserrat</option>
                                        <option value="MA" data-select2-id="select2-data-446-lmg5">Morocco</option>
                                        <option value="MZ" data-select2-id="select2-data-447-lbz4">Mozambique</option>
                                        <option value="MM" data-select2-id="select2-data-448-n5rs">Myanmar</option>
                                        <option value="NA" data-select2-id="select2-data-449-huc9">Namibia</option>
                                        <option value="NR" data-select2-id="select2-data-450-hrpl">Nauru</option>
                                        <option value="NP" data-select2-id="select2-data-451-ptpq">Nepal</option>
                                        <option value="NL" data-select2-id="select2-data-452-akhy">Netherlands</option>
                                        <option value="NZ" data-select2-id="select2-data-453-34v8">New Zealand</option>
                                        <option value="NI" data-select2-id="select2-data-454-oejf">Nicaragua</option>
                                        <option value="NE" data-select2-id="select2-data-455-nfdj">Niger</option>
                                        <option value="NG" data-select2-id="select2-data-456-577z">Nigeria</option>
                                        <option value="NU" data-select2-id="select2-data-457-sbhi">Niue</option>
                                        <option value="NF" data-select2-id="select2-data-458-p4w1">Norfolk Island
                                        </option>
                                        <option value="MP" data-select2-id="select2-data-459-spfr">Northern Mariana
                                            Islands</option>
                                        <option value="NO" data-select2-id="select2-data-460-epfz">Norway</option>
                                        <option value="OM" data-select2-id="select2-data-461-xxtd">Oman</option>
                                        <option value="PK" data-select2-id="select2-data-462-ko28">Pakistan</option>
                                        <option value="PW" data-select2-id="select2-data-463-dnjg">Palau</option>
                                        <option value="PS" data-select2-id="select2-data-464-wbt3">Palestinian
                                            Territory, Occupied</option>
                                        <option value="PA" data-select2-id="select2-data-465-11i8">Panama</option>
                                        <option value="PG" data-select2-id="select2-data-466-r82s">Papua New Guinea
                                        </option>
                                        <option value="PY" data-select2-id="select2-data-467-4zqf">Paraguay</option>
                                        <option value="PE" data-select2-id="select2-data-468-u1z9">Peru</option>
                                        <option value="PH" data-select2-id="select2-data-469-x9d9">Philippines</option>
                                        <option value="PL" data-select2-id="select2-data-470-td7r">Poland</option>
                                        <option value="PT" data-select2-id="select2-data-471-2iai">Portugal</option>
                                        <option value="PR" data-select2-id="select2-data-472-5ecu">Puerto Rico</option>
                                        <option value="QA" data-select2-id="select2-data-473-0ofw">Qatar</option>
                                        <option value="RO" data-select2-id="select2-data-474-t4ba">Romania</option>
                                        <option value="RU" data-select2-id="select2-data-475-qycv">Russian Federation
                                        </option>
                                        <option value="RW" data-select2-id="select2-data-476-bkil">Rwanda</option>
                                        <option value="BL" data-select2-id="select2-data-477-qe3a">Saint Barthélemy
                                        </option>
                                        <option value="KN" data-select2-id="select2-data-478-4dn8">Saint Kitts and Nevis
                                        </option>
                                        <option value="LC" data-select2-id="select2-data-479-98o8">Saint Lucia</option>
                                        <option value="MF" data-select2-id="select2-data-480-8un9">Saint Martin (French
                                            part)</option>
                                        <option value="VC" data-select2-id="select2-data-481-43l6">Saint Vincent and the
                                            Grenadines</option>
                                        <option value="WS" data-select2-id="select2-data-482-7wpr">Samoa</option>
                                        <option value="SM" data-select2-id="select2-data-483-u4g3">San Marino</option>
                                        <option value="ST" data-select2-id="select2-data-484-e8fg">Sao Tome and Principe
                                        </option>
                                        <option value="SA" data-select2-id="select2-data-485-w61e">Saudi Arabia</option>
                                        <option value="SN" data-select2-id="select2-data-486-q4cj">Senegal</option>
                                        <option value="RS" data-select2-id="select2-data-487-0rbp">Serbia</option>
                                        <option value="SC" data-select2-id="select2-data-488-xwe9">Seychelles</option>
                                        <option value="SL" data-select2-id="select2-data-489-h4r5">Sierra Leone</option>
                                        <option value="SG" data-select2-id="select2-data-490-86wr">Singapore</option>
                                        <option value="SX" data-select2-id="select2-data-491-0pcy">Sint Maarten (Dutch
                                            part)</option>
                                        <option value="SK" data-select2-id="select2-data-492-h225">Slovakia</option>
                                        <option value="SI" data-select2-id="select2-data-493-ew4d">Slovenia</option>
                                        <option value="SB" data-select2-id="select2-data-494-79gm">Solomon Islands
                                        </option>
                                        <option value="SO" data-select2-id="select2-data-495-gus7">Somalia</option>
                                        <option value="ZA" data-select2-id="select2-data-496-czyn">South Africa</option>
                                        <option value="KR" data-select2-id="select2-data-497-vh8t">South Korea</option>
                                        <option value="SS" data-select2-id="select2-data-498-b39q">South Sudan</option>
                                        <option value="ES" data-select2-id="select2-data-499-44uq">Spain</option>
                                        <option value="LK" data-select2-id="select2-data-500-w039">Sri Lanka</option>
                                        <option value="SD" data-select2-id="select2-data-501-a3he">Sudan</option>
                                        <option value="SR" data-select2-id="select2-data-502-rl0s">Suriname</option>
                                        <option value="SZ" data-select2-id="select2-data-503-371a">Swaziland</option>
                                        <option value="SE" data-select2-id="select2-data-504-3p1s">Sweden</option>
                                        <option value="CH" data-select2-id="select2-data-505-87ta">Switzerland</option>
                                        <option value="SY" data-select2-id="select2-data-506-2lwg">Syrian Arab Republic
                                        </option>
                                        <option value="TW" data-select2-id="select2-data-507-ilpl">Taiwan, Province of
                                            China</option>
                                        <option value="TJ" data-select2-id="select2-data-508-5jvu">Tajikistan</option>
                                        <option value="TZ" data-select2-id="select2-data-509-ehb8">Tanzania, United
                                            Republic of</option>
                                        <option value="TH" data-select2-id="select2-data-510-t3s5">Thailand</option>
                                        <option value="TG" data-select2-id="select2-data-511-vcb8">Togo</option>
                                        <option value="TK" data-select2-id="select2-data-512-7rok">Tokelau</option>
                                        <option value="TO" data-select2-id="select2-data-513-4p12">Tonga</option>
                                        <option value="TT" data-select2-id="select2-data-514-80t5">Trinidad and Tobago
                                        </option>
                                        <option value="TN" data-select2-id="select2-data-515-38rm">Tunisia</option>
                                        <option value="TR" data-select2-id="select2-data-516-r0tg">Turkey</option>
                                        <option value="TM" data-select2-id="select2-data-517-itul">Turkmenistan</option>
                                        <option value="TC" data-select2-id="select2-data-518-arzw">Turks and Caicos
                                            Islands</option>
                                        <option value="TV" data-select2-id="select2-data-519-taty">Tuvalu</option>
                                        <option value="UG" data-select2-id="select2-data-520-rdsm">Uganda</option>
                                        <option value="UA" data-select2-id="select2-data-521-ohun">Ukraine</option>
                                        <option value="AE" data-select2-id="select2-data-522-9uqr">United Arab Emirates
                                        </option>
                                        <option value="GB" data-select2-id="select2-data-523-3nv4">United Kingdom
                                        </option>
                                        <option value="US" data-select2-id="select2-data-524-ozaw">United States
                                        </option>
                                        <option value="UY" data-select2-id="select2-data-525-2wmt">Uruguay</option>
                                        <option value="UZ" data-select2-id="select2-data-526-98f9">Uzbekistan</option>
                                        <option value="VU" data-select2-id="select2-data-527-blat">Vanuatu</option>
                                        <option value="VE" data-select2-id="select2-data-528-4gda">Venezuela, Bolivarian
                                            Republic of</option>
                                        <option value="VN" data-select2-id="select2-data-529-xxy5">Vietnam</option>
                                        <option value="VI" data-select2-id="select2-data-530-r8hm">Virgin Islands
                                        </option>
                                        <option value="YE" data-select2-id="select2-data-531-72o6">Yemen</option>
                                        <option value="ZM" data-select2-id="select2-data-532-uwwa">Zambia</option>
                                        <option value="ZW" data-select2-id="select2-data-533-dy2v">Zimbabwe</option>
                                    </select>

                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                fill="black" />
                                            <path
                                                d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n2">
                                <!--begin::Timeline heading-->
                                <div class="overflow-auto pe-3">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that speak
                                        human workshop</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
                                            <img src="../../../assets/media/avatars/150-2.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="mb-5 pe-3">
                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New
                                        Incoming Project Files:</a>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
                                            <img src="../../../assets/media/avatars/150-6.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3"
                                                src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/pdf.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance KPI App
                                                    Guidelines</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">1.9mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--begin::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3"
                                                src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT
                                                    Testing Results</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">18kb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3"
                                                src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/css.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance
                                                    Reports</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">20mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                fill="black" />
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">Task
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro Admin
                                        Dashboard project:
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="../../../assets/media/avatars/150-11.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="black" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
                                            <img src="../../../assets/media/avatars/150-3.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="../../../assets/media/demos/demo1.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="../../../assets/media/demos/demo2.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="../../../assets/media/demos/demo3.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">New case
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is assigned to you
                                        in Multi-platform Database Design project
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="overflow-auto pb-5">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="black" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">You have received a new order:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
                                            <img src="../../../assets/media/avatars/150-14.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z"
                                                    fill="black" />
                                                <path
                                                    d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-900 fw-bolder">Database Backup Process Completed!
                                                </h4>
                                                <div class="fs-6 text-gray-700 pe-7">Login into Metronic Admin
                                                    Dashboard to make sure the data integrity is OK</div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">New order
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed for
                                        Workshow Planning &amp; Budget Estimation
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                    </div>
                    <!--end::Timeline items-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-5 text-center" id="kt_activities_footer">
                <a href="activity.html" class="btn btn-bg-body text-primary">View All Activities
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                transform="rotate(-180 18 13)" fill="black" />
                            <path
                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </div>
            <!--end::Footer-->
        </div>
    </div>
    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->
    <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
        <!--begin::Messenger-->
        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                            Cox</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-bold text-muted">Active</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <div class="me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="bi bi-three-dots fs-3"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search">Add Contact</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a contact email to send an invitation"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Create Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Invite Members</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                    title="Coming soon">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                    </div>
                    <!--end::Menu-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">How likely are you to recommend our company to your
                                friends and family ?</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve
                                been subscribed to a repository on GitHub.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Ok, Understood!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">You’ll receive notifications for all issues, pull
                                requests!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">You can unwatch this repository immediately by clicking
                                here:
                                <a href="https://keenthemes.com/">Keenthemes.com</a>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Most purchased Business courses during this sale!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and
                                goals. Food and drinks provided</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(template for out)-->
                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text"></div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for out)-->
                    <!--begin::Message(template for in)-->
                    <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Right before vacation season we have the next Big Deal
                                for you.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for in)-->
                </div>
                <!--end::Messages-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <!--begin::Input-->
                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                    placeholder="Type a message"></textarea>
                <!--end::Input-->
                <!--begin:Toolbar-->
                <div class="d-flex flex-stack">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <!--begin::Send-->
                    <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                    <!--end::Send-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>
    <!--end::Chat drawer-->
    <!--begin::Exolore drawer toggle-->
    <button id="kt_explore_toggle"
        class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0"
        title="Explore Metronic" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
        <span id="kt_explore_toggle_label">Explore</span>
    </button>
    <!--end::Exolore drawer toggle-->
    <!--begin::Exolore drawer-->
    <div id="kt_explore" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
        <!--begin::Card-->
        <div class="card shadow-none rounded-0 w-100">
            <!--begin::Header-->
            <div class="card-header" id="kt_explore_header">
                <h3 class="card-title fw-bolder text-gray-700">Explore Metronic</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_explore_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body" id="kt_explore_body">
                <!--begin::Content-->
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body"
                    data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <!--begin::Header-->
                        <div class="mb-7">
                            <div class="d-flex flex-stack">
                                <h3 class="mb-0">Metronic Licenses</h3>
                                <a href="https://themeforest.net/licenses/standard" class="fw-bold"
                                    target="_blank">License FAQs</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::License-->
                        <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                            <div class="d-flex flex-stack">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Regular License
                                        </div>
                                        <i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7"
                                            data-bs-toggle="popover" data-bs-custom-class="popover-dark"
                                            data-bs-trigger="hover" data-bs-placement="top"
                                            data-bs-content="Use, by you or one client in a single end product which end users are not charged for."></i>
                                    </div>
                                    <div class="fs-7 text-muted">For single end product used by you or one client
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="text-muted fs-7 fw-bold me-n1">$</span>
                                    <span class="text-dark fs-1 fw-bolder">39</span>
                                </div>
                            </div>
                        </div>
                        <!--end::License-->
                        <!--begin::License-->
                        <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                            <div class="d-flex flex-stack">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Extended License
                                        </div>
                                        <i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7"
                                            data-bs-toggle="popover" data-bs-custom-class="popover-dark"
                                            data-bs-trigger="hover" data-bs-placement="top"
                                            data-bs-content="Use, by you or one client, in a single end product which end users can be charged for."></i>
                                    </div>
                                    <div class="fs-7 text-muted">For single end product with paying users.</div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="text-muted fs-7 fw-bold me-n1">$</span>
                                    <span class="text-dark fs-1 fw-bolder">939</span>
                                </div>
                            </div>
                        </div>
                        <!--end::License-->
                        <!--begin::License-->
                        <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                            <div class="d-flex flex-stack">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Custom License</div>
                                    </div>
                                    <div class="fs-7 text-muted">Reach us for custom license offers.</div>
                                </div>
                                <div class="text-nowrap">
                                    <a href="https://keenthemes.com/contact/" class="btn btn-sm btn-success"
                                        target="_blank">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <!--end::License-->
                        <!--begin::Purchase-->
                        <a href="https://1.envato.market/EA4JP" class="btn btn-primary mb-15 w-100">Buy Now</a>
                        <!--end::Purchase-->
                        <!--begin::Demos-->
                        <div class="mb-0">
                            <h3 class="fw-bolder text-center mb-6">Metronic Demos</h3>
                            <!--begin::Row-->
                            <div class="row g-5">
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-success rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo1.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo1"
                                                class="btn btn-sm btn-success shadow">Demo 1</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo2.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo2"
                                                class="btn btn-sm btn-success shadow">Demo 2</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo3.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo3"
                                                class="btn btn-sm btn-success shadow">Demo 3</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo4.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo4"
                                                class="btn btn-sm btn-success shadow">Demo 4</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo5.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo5"
                                                class="btn btn-sm btn-success shadow">Demo 5</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo6.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo6"
                                                class="btn btn-sm btn-success shadow">Demo 6</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo7.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo7"
                                                class="btn btn-sm btn-success shadow">Demo 7</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo8.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo8"
                                                class="btn btn-sm btn-success shadow">Demo 8</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo9.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo9"
                                                class="btn btn-sm btn-success shadow">Demo 9</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo10.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo10"
                                                class="btn btn-sm btn-success shadow">Demo 10</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo11.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo11"
                                                class="btn btn-sm btn-success shadow">Demo 11</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo12.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo12"
                                                class="btn btn-sm btn-success shadow">Demo 12</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo13.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo13"
                                                class="btn btn-sm btn-success shadow">Demo 13</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo14.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo14"
                                                class="btn btn-sm btn-success shadow">Demo 14</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo15.png" alt="demo"
                                                class="w-100" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <a href="https://preview.keenthemes.com/metronic8/demo15"
                                                class="btn btn-sm btn-success shadow">Demo 15</a>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo16.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo17.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo18.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo19.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo20.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo21.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo22.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Demo-->
                                    <div
                                        class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                        <div class="overlay-wrapper">
                                            <img src="../../../assets/media/demos/demo23.png" alt="demo"
                                                class="w-100 opacity-25" />
                                        </div>
                                        <div class="overlay-layer bg-dark bg-opacity-10">
                                            <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                soon</div>
                                        </div>
                                    </div>
                                    <!--end::Demo-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Demos-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Exolore drawer-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->
    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Invite a Friend</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">If you need more info, please check out
                            <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Google Contacts Invite-->
                    <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                        <img alt="Logo"
                            src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/brand-logos/google-icon.svg"
                            class="h-20px me-3" />Invite Gmail Contacts
                    </div>
                    <!--end::Google Contacts Invite-->
                    <!--begin::Separator-->
                    <div class="separator d-flex flex-center mb-8">
                        <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">or</span>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Textarea-->
                    <textarea class="form-control form-control-solid mb-8" rows="3"
                        placeholder="Type or paste emails here"></textarea>
                    <!--end::Textarea-->
                    <!--begin::Users-->
                    <div class="mb-10">
                        <!--begin::Heading-->
                        <div class="fs-6 fw-bold mb-2">Your Invitations</div>
                        <!--end::Heading-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-1.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                            Smith</a>
                                        <div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                            Macy</a>
                                        <div class="fw-bold text-muted">melody@altbox.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Admin</a>
                                        <div class="fw-bold text-muted">max@kt.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-4.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                            Bean</a>
                                        <div class="fw-bold text-muted">sean@dellito.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                            Cox</a>
                                        <div class="fw-bold text-muted">brian@exchange.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-muted">mikaela@pexcom.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-8.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                            Wild</a>
                                        <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                            Owen</a>
                                        <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-6.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                            Wilson</a>
                                        <div class="fw-bold text-muted">dam@consilting.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                            Bold</a>
                                        <div class="fw-bold text-muted">emma@intenso.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-7.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                            Crown</a>
                                        <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                            Doe</a>
                                        <div class="fw-bold text-muted">robert@benko.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-17.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                            Miller</a>
                                        <div class="fw-bold text-muted">miller@mapple.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                            Kunic</a>
                                        <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-10.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                            Wilder</a>
                                        <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="../../../assets/media/avatars/150-17.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                            Miller</a>
                                        <div class="fw-bold text-muted">miller@mapple.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Users-->
                    <!--begin::Notice-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <div class="me-5 fw-bold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            <span class="form-check-label fw-bold text-muted">Allowed</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Invite Friend-->
    <!--begin::Modal - Create App-->
    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>User Information</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                        id="kt_modal_create_app_stepper">
                        <!--begin::Aside-->
                        <div
                            class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Personal</h3>
                                        <div class="stepper-desc">User personal information</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--begin::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Preference</h3>
                                        <div class="stepper-desc">User preference</div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Skills</h3>
                                        <div class="stepper-desc">User skills</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Experience</h3>
                                        <div class="stepper-desc">User Experience</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Schedule</h3>
                                        <div class="stepper-desc">View Task Scheduled for Users</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--begin::Aside-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid py-lg-5 px-lg-15">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10" style='display:none'>
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">App Name</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" value='null'
                                                class="form-control form-control-lg form-control-solid" name="name"
                                                placeholder="" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">

                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip" title="Select your app category"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Options-->
                                            <div class="fv-row">
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='name'></span>
                                                            <span class="fs-7 text-muted">Full Name</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect x="2" y="2" width="9" height="9" rx="2"
                                                                            fill="black" />
                                                                        <rect opacity="0.3" x="13" y="2" width="9"
                                                                            height="9" rx="2" fill="black" />
                                                                        <rect opacity="0.3" x="13" y="13" width="9"
                                                                            height="9" rx="2" fill="black" />
                                                                        <rect opacity="0.3" x="2" y="13" width="9"
                                                                            height="9" rx="2" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='email'></span>
                                                            <span class="fs-7 text-muted">Email Address</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='phone'></span>
                                                            <span class="fs-7 text-muted">Mobile Number</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='address'></span>
                                                            <span class="fs-7 text-muted">Address</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='referrer_name'>Referrer
                                                                name</span>
                                                            <span class="fs-7 text-muted">Referral Name</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6" id='referrer_source'>Referrer
                                                                source</span>
                                                            <span class="fs-7 text-muted">Referral source</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6"
                                                                id='emergency_number'>Emergency Number</span>
                                                            <span class="fs-7 text-muted">Emergency Number</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <!--end:Input-->
                                                </label><br>
                                                <!--end::Option-->
                                            </div>
                                            <!--end:Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Preference</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                    data-bs-toggle="tooltip" title="Specify your apps framework"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-warning">
                                                            <i class="fab fa-html5 text-warning fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6" id='date_available'>Date
                                                            Available</span>
                                                        <span class="fs-7 text-muted">Date Available</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" checked="checked"
                                                        name="framework" value="1" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="fab fa-react text-success fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6" id='position_type'>Position
                                                            Type</span>
                                                        <span class="fs-7 text-muted">Position Type</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="2" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-danger">
                                                            <i class="fab fa-angular text-danger fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6" id='shift'>Shift</span>
                                                        <span class="fs-7 text-muted">Shift</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="3" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="fab fa-vuejs text-primary fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6" id='distance'>Distance</span>
                                                        <span class="fs-7 text-muted">Distance</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="4" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        {{-- <!--begin::Input group-->
											<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required fs-5 fw-bold mb-2">Database Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text" class="form-control form-control-lg form-control-solid" name="dbname" placeholder="" value="master_db" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="fv-row">
												<!--begin::Label-->
												<label class="d-flex align-items-center fs-5 fw-bold mb-4">
													<span class="required">Select Database Engine</span>
													<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select your app database engine"></i>
												</label>
												<!--end::Label-->
												<!--begin:Option-->
												<label class="d-flex flex-stack cursor-pointer mb-5">
													<!--begin::Label-->
													<span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-success">
																<i class="fas fa-database text-success fs-2x"></i>
															</span>
														</span>
														<!--end::Icon-->
														<!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">MySQL</span>
															<span class="fs-7 text-muted">Basic MySQL database</span>
														</span>
														<!--end::Info-->
													</span>
													<!--end::Label-->
													<!--begin::Input-->
													<span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine" checked="checked" value="1" />
													</span>
													<!--end::Input-->
												</label>
												<!--end::Option-->
												<!--begin:Option-->
												<label class="d-flex flex-stack cursor-pointer mb-5">
													<!--begin::Label-->
													<span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-danger">
																<i class="fab fa-google text-danger fs-2x"></i>
															</span>
														</span>
														<!--end::Icon-->
														<!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">Firebase</span>
															<span class="fs-7 text-muted">Google based app data management</span>
														</span>
														<!--end::Info-->
													</span>
													<!--end::Label-->
													<!--begin::Input-->
													<span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine" value="2" />
													</span>
													<!--end::Input-->
												</label>
												<!--end::Option-->
												<!--begin:Option-->
												<label class="d-flex flex-stack cursor-pointer">
													<!--begin::Label-->
													<span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label bg-light-warning">
																<i class="fab fa-amazon text-warning fs-2x"></i>
															</span>
														</span>
														<!--end::Icon-->
														<!--begin::Info-->
														<span class="d-flex flex-column">
															<span class="fw-bolder fs-6">DynamoDB</span>
															<span class="fs-7 text-muted">Amazon Fast NoSQL Database</span>
														</span>
														<!--end::Info-->
													</span>
													<!--end::Label-->
													<!--begin::Input-->
													<span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="dbengine" value="3" />
													</span>
													<!--end::Input-->
												</label>
												<!--end::Option-->
											</div>
											<!--end::Input group--> --}}
                                    </div>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">

                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='school_name'>School Name</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>School Name</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label id='school_address'
                                                    class="d-flex align-items-center fs-6 fw-bold form-label mb-2">School
                                                    Address </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p id='school_address'>School Address</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='course'>Course</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>Course</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"
                                                    id='degree'>
                                                    Degree
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p>Degree</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='enrollment_year'>Enrollment Year</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>Enrollment Year</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"
                                                    id='graduation_year'>
                                                    Graduation Year
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p>Graduation Year</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='facility_name'>Facility Name</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>Facility Name</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"
                                                    id='start_date'>
                                                    Start Date
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p>Start Date</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='street_address'>Street Address</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>Street Address</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"
                                                    id='city'>
                                                    City
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p>City</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2"
                                                    id='postal_code'>Postal Code</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <p>Postal Code</p>

                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->

                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"
                                                    id='job_title'>
                                                    Job Title
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <p>Job Title</p>
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->

                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100 text-center">
                                        <!--begin::Heading-->
                                        <h1 class="fw-bolder text-dark mb-3">Release!</h1>
                                        <!--end::Heading-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-3">Submit your app to kickstart your
                                            project.</div>
                                        <!--end::Description-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-4 py-15">
                                            <img src="../../../assets/media/illustrations/sketchy-1/9-dark.png" alt=""
                                                class="mw-100 mh-300px" />
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                </div>
                                <!--end::Step 5-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-10">
                                    <!--begin::Wrapper-->
                                    <div class="me-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                            <span class="svg-icon svg-icon-3 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                                                        fill="black" />
                                                    <path
                                                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                            transform="rotate(-180 18 13)" fill="black" />
                                                        <path
                                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">Next
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                        transform="rotate(-180 18 13)" fill="black" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Create App-->
    <!--begin::Modal - Upgrade plan-->
    <div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header justify-content-end border-0 pb-0">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Upgrade a Plan</h1>
                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                            <a href="#" class="link-primary fw-bolder">Pricing Guidelines</a>.
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Plans-->
                    <div class="d-flex flex-column">
                        <!--begin::Nav group-->
                        <div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
                            <a href="#"
                                class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active"
                                data-kt-plan="month">Monthly</a>
                            <a href="#" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3"
                                data-kt-plan="annual">Annual</a>
                        </div>
                        <!--end::Nav group-->
                        <!--begin::Row-->
                        <div class="row mt-10">
                            <!--begin::Col-->
                            <div class="col-lg-6 mb-10 mb-lg-0">
                                <!--begin::Tabs-->
                                <div class="nav flex-column">
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    checked="checked" value="startup" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">Startup
                                                </h2>
                                                <div class="fw-bold opacity-50">Best for startups</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="39"
                                                data-kt-plan-price-annual="399">39</span>
                                            <span class="fs-7 opacity-50">/
                                                <span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="advanced" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Advanced</h2>
                                                <div class="fw-bold opacity-50">Best for 100+ team size</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="339"
                                                data-kt-plan-price-annual="3399">339</span>
                                            <span class="fs-7 opacity-50">/
                                                <span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="enterprise" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">
                                                    Enterprise
                                                    <span class="badge badge-light-success ms-2 fs-7">Most
                                                        popular</span>
                                                </h2>
                                                <div class="fw-bold opacity-50">Best value for 1000+ team</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bolder" data-kt-plan-price-month="999"
                                                data-kt-plan-price-annual="9999">999</span>
                                            <span class="fs-7 opacity-50">/
                                                <span data-kt-element="period">Mon</span></span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <div
                                        class="nav-link btn btn-outline btn-outline-dashed btn-color-dark d-flex flex-stack text-start p-6">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="custom" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">Custom
                                                </h2>
                                                <div class="fw-bold opacity-50">Requet a custom license</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <a href="#" class="btn btn-sm btn-primary">Contact Us</a>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Tab link-->
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <!--begin::Tab content-->
                                <div class="tab-content rounded h-100 bg-light p-10">
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-bold">Optimal for 10+ team size and new startup
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active
                                                    Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project
                                                    Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Finance
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Accounting
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Network
                                                    Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Unlimited Cloud
                                                    Space</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade" id="kt_upgrade_plan_advanced">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-bold">Optimal for 100+ team size and grown
                                                company</div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active
                                                    Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project
                                                    Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Finance
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Accounting
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Network
                                                    Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-muted flex-grow-1">Unlimited Cloud
                                                    Space</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade" id="kt_upgrade_plan_enterprise">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bolder text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-bold">Optimal for 1000+ team and enterpise</div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 10 Active
                                                    Users</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Up to 30 Project
                                                    Integrations</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Analytics
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Finance
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Accounting
                                                    Module</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Network
                                                    Platform</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud
                                                    Space</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                            fill="black" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Plans-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-center flex-row-fluid pt-12">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upgrade Plan</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Upgrade plan-->
    <!--end::Modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <script>
        var hostUrl = "https://preview.keenthemes.com/metronic8/demo1/assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('adminasset/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('adminasset/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javas'cript Bundle-->
    <!--begin::Page Custo'm Javascript(used by this page)-->
    <script src="{{ asset('adminasset/js/custom/modals/create-project.bundle.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/modals/offer-a-deal.bundle.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('adminasset/js/custom/intro.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#schedule_start_time").on('change', function() {
                $start = $("#schedule_start_time").val()
               
                $("#schedule_end_time").attr('min',$start)
                
            })

            const startDateEl = $("#schedule_start_time");
    function handleEndDateOnChange(e) {
        alert('very good')
        document.getElementById("schedule_end_time").min = startDateEl.val();
    }
            $('body').on('submit', '#schedule_form',async function (e) {
            // $("#schedule_form").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);

                fd.append('id', $("#id").val());
                fd.append('schedule_task', $("#schedule_task").val());
                fd.append('schedule_title', $("#schedule_title").val());
                fd.append('schedule_date', $("#schedule_date").val());
                fd.append('schedule_start_time', $("#schedule_start_time").val());
                fd.append('schedule_end_time', $("#schedule_end_time").val());

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('scheduletask') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {


                        swal("Success", 'Task Scheduled Successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!', 'Not Updated', 'error')
                    }
                });
            });
            $(".kt_toolbar_primary_button_class").click(function() {
                var id = $(this).data("id");

                $("#name,#school,#facility_home,#start_date, #street_address, #city, #postal_code, #job_title, #school_address,#course, #degree, #enrollment_year, #graduation_year, #email, #phone, #address, #date_available, #position_type, #shift, #distance")
                    .each(function() {
                        $(this).empty()
                        console.log('wmpty')

                    })
                $.get('{{ route('show_user_details') }}?id=' + id, function(data) {

                    $("#name").append(data.name)
                    $("#email").append(data.email)
                    $("#phone").append(data.phone)
                    $("#address").append(data.address)
                    $("#date_available").append(data.date_available)
                    $("#position_type").append(data.position_type)
                    $("#shift").append(data.shift)
                    $("#distance").append(data.distance)
                    $("#school").append(data.school)
                    $("#school_address").append(data.school_address)
                    $("#course").append(data.course)
                    $("#degree").append(data.degree)
                    $("#enrollment_year").append(data.enrollment_year)
                    $("#graduation_year").append(data.graduation_year)
                    $("#facility_home").append(data.facility_home)
                    $("#start_date").append(data.start_date)
                    $("#street_address").append(data.street_address)
                    $("#city").append(data.city)
                    $("#postal_code").append(data.postal_code)
                    $("#job_title").append(data.job_title)
                    // $("#city").append(data.city)
                    // $("#nok_name").append(data.nok_name)
                    // $("#e_phone").append(data.nok_phone)

                    console.log(data)



                });




            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/dark/pages/profile/Admin Dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Nov 2021 06:16:55 GMT -->

</html>
