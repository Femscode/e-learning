@extends('layout.adminmaster')
@section('head-links')
@stop

@section('content')

<div class="row g-6 g-xl-9">
    <!--begin::Col-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        {{-- <h3 class="fw-bold my-2">Schedule Task
            <span class="fs-6 text-gray-400 fw-bold ms-1"></span>
        </h3> --}}
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
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0" style='color:black'>Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                        {{-- <a href="/metronic8/demo1/../demo1/dark/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> --}}
                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6 text-red">{{ $user->email }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Contact Phone 
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Phone number must be active" aria-label="Phone number must be active"></i></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2 text-red" >@if($user->phone !== null)<p>{{ $user->phone}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                {{-- <span class="badge badge-success">Verified</span> --}}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a href="#" class="fw-bold fs-6 text-gray-800 text-hover-primary text-red">@if($user->address !== null)<p>{{ $user->address}}</p> @else <p style='color:red'>Not yet provided</p>@endif</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Next Of Kin Details 
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Country of origination" aria-label="Country of origination"></i></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">@if($user->nok_name !== null && $user->nok_phone !== null && $user->nok_address !== null)<p>{{ $user->nok_name}}, {{ $user->nok_phone }}, {{ $user->nok_address }}</p> @else <p style='color:red'>(Information not fully provided)</p> @endif</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Referral Name and Source</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">@if( $user->referral_name !== null && $user->referral_source !== null)<p>{{ $user->referral_name}}, {{ $user->referral_source}}</p> @else <p style='color:red'> (Information not fully provided)</p>@endif</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Position Type</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800"> @if(  $user->position_type !== null)<p> {{ $user->position_type }} </p> @else <p style='color:red'>(Not yet provided)</p>@endif</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">School Name and address</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800"> @if(  $user->school !== null && $user->school_address !== null)<p> {{ $user->school }}, {{ $user->school_address }}  </p> @else <p style='color:red'>(Information not fully provided)</p>@endif</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Course and Degree Earned</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">@if(  $user->course !== null && $user->degree !== null)<p> {{ $user->course }}, {{ $user->degree }}  </p> @else <p style='color:red'>(Information not fully provided)</p>@endif</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Enrollment and Graduation Year</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">@if($user->enrollment_year !== null && $user->graduation_year)<p>{{date('d/m/Y',strtotime($user->enrollment_year)) }} - {{date('d/m/Y',strtotime($user->graduation_year))}} @else<p style='color:red'>(Information not fully provided)</p>@endif</span>
                            </div>
                            <!--begin::Label-->
                        </div>

                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Resume/CV</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">@if($user->resume !== null)
                                    <a href='/downloadresume/{{$user->id}}' class='btn btn-success btn-sm'>Download Resume</a>
                                         @else<p style='color:red'>(Resume not uploaded)</p>@endif</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        
                    </div>
                    <!--end::Card body-->
                </div>
        </div>
    </div>
    {{-- 
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
                                            <h1 class="fw-bold text-dark">Schedule Task</h1>
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
                                            <h1 class="fw-bold text-dark">Project Settings
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
                                                            class="dfs-3 fw-bold text-gray-900 mb-1">
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
                                            <h1 class="fw-bold text-dark">Budget</h1>
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
                                                    data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bold mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
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
                                                                class="fs-4 fw-bold text-gray-800 mb-2 d-block">Precise
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
                                                                class="fs-4 fw-bold text-gray-800 mb-2 d-block">Extreme
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
                                            <h1 class="fw-bold text-dark">Build a Team</h1>
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Admin</a>
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John
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
                                            <h1 class="fw-bold text-dark">Set First Target
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
                                            <h1 class="fw-bold text-dark">Upload Files</h1>
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
                                                            class="dfs-3 fw-bold text-gray-900 mb-1">
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Avionica
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">9
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">User
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Design
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
                                                                class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Tower
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
                                            <h1 class="fw-bold text-dark">Project Created!
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
                                            <a href="#" class="link-primary fw-bold">FAQ
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
                                                        class="fs-3 fw-bold text-gray-900 mb-2 d-block">Personal
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
                                                        class="fs-3 fw-bold text-gray-900 mb-2 d-block">Corporate
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
                                            <a href="#" class="link-primary fw-bold">FAQ
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
                                            <a href="#" class="link-primary fw-bold">FAQ
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
                                                data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bold mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
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
                                                            class="fs-4 fw-bold text-gray-800 mb-2 d-block">Precise
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
                                                            class="fs-4 fw-bold text-gray-800 mb-2 d-block">Extreme
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
                                            <a href="#" class="link-primary fw-bold">FAQ
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
    </div>--}}

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $("#schedule_start_time").on('change',function() {
            
            
            value = $("#schedule_start_time").val()
            
            $("#schedule_end_time").attr('min',value)
           
        })
    
    })
</script>

@stop