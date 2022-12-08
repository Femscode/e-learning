@extends('layout.adminmaster')
@section('head-links')
@stop

@section('content')

{{-- <div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Heading-->
   
    <span class="fs-6 text-gray-400 fw-bold ms-1"></span>
    </h3>
    <!--end::Heading-->
    <!--begin::Actions-->
   
    <!--end::Actions-->
</div> --}}
<!--end::Toolbar-->
<!--begin::Row-->
{{-- <div class="row g-6 g-xl-9"> --}}
   

    <div class="post d-flex flex-column-fluid" id="kt_post">
    <div class='card' style='max-width:1200px'>
        
        <div class="card-body">
            <div class="d-flex my-2 float-left">
            <h2 style='color:black'>All Users</h2>
        </div>
        {{-- <!--begin::Table container-->
        <form method='post' action='{{ route("adminsortschedule") }}'>@csrf
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">
               
                <select required name='user_id' class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign" data-select2-id="select2-data-10-v0xq" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-12-wqfg">Select user...</option>
                   @foreach(App\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                   @endforeach
                </select>
            </div>
            <div class="col-md-6 fv-row">
                <select required name='month' class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign" data-select2-id="select2-data-10-v0xq" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-12-wqfg">Select month...</option>
                  
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col-md-6 fv-row fv-plugins-icon-container" >   
                <select rquired name='week' class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select week" name="target_assign" data-select2-id="select2-data-10-v0xq" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-12-wqfg">Select week...</option>
                    <option value='Week 1'>Week 1</option>
                    <option value='Week 2'>Week 2</option>
                    <option value='Week 3'>Week 3</option>
                    <option value='Week 4'>Week 4</option>
                </select>
            </div>
            <div class="col-md-6 fv-row" >
                
                <input type='submit' value='Filter' class='btn btn-success'>
            </div>
        </div>
    </form> --}}
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id='scheduletable'>
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                        
                        <th class="min-w-50px">#</th>
                        <th class="min-w-100px">Name</th>
                        <th class="min-w-100px">Email</th>
                        <th class="min-w-100px">Phone</th>
                       
                        <th class="min-w-100px">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                           {{ $user->phone ?? "Not yet provided" }}
                        </td>
                        <td>
                            <a href='/userdetails/{{ $user->id }}' class='btn btn-primary btn-sm'>View 
                        </td>
                        
                        {{-- <td>
                            <div class="ms-2">
                                <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                            <rect x="17" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                            <rect x="3" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true" style="">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href='/userdetails/{{ $user->id }}' class="menu-link px-3">View Details</a>
                                    </div>
                                     <div class="menu-item px-3">
                                        <a id class="menu-link px-3">Delete User</a>
                                    </div>
                                     <div class="menu-item px-3">
                                        <a  class="menu-link text-danger px-3">Delete</a>
                                    </div> 
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                                <!--end::More-->
                            </div>
                            
                        </td> --}}
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>

<!--end::Col-->
</div>
<!--end::Row-->

<div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Change Profile Picture</h2>
                
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <div class="container">
                    <!--begin::Nav-->
                    <div class="stepper-nav justify-content-center py-2">
                       
                        <!--begin::Step 7-->
                        
                        <!--end::Step 7-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto w-100 mw-600px pt-15 pb-10"
                        action='{{route("updatePic")}}' enctype="multipart/form-data"
                        method="post">@csrf
                        <!--begin::Type-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-7 pb-lg-12">
                                    <!--begin::Title-->
                                    <h1 class="fw-bolder text-dark">Update Profile Picture</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    
                                    <!--end::Descrixomption-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-15" data-kt-buttons="true">
                                    <!--begin::Option-->
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 mb-6 active">
                                        <!--begin::Input-->
                                       
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
                                                    class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Upload Profile Picture
                                                    </span>
                                                <span
                                                    class="fw-bold fs-4 text-muted">
                                                <input required type='file' name='image' accept='image/*' class='form-control'>
                                                </span>
                                            </span>
                                            <!--end::Info-->
                                        </span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                 
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-lg btn-primary"
                                        data-kt-element="type-next">
                                        <span class="indicator-label">Upload 
                                            </span>
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
                        <!--end::Type-->
                        
                    </form>
                    <!--end::Form-->
                </div>
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
                                        <option value="1" selected="selected">Crown
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
                                            data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;Crown*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
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
@section('script')
<script src='{{ asset('adminasset/interval.js') }}'></script>
<script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
<script>
var oTable = $('#scheduletable').DataTable();   //using Capital D, which is mandatory to retrieve "api" datatables' object, latest jquery Datatable
$('#myInput').keyup(function(){
      oTable.search($(this).val()).draw() ;
});


</script>
<script>
          $(document).ready(function(){

$(document).on('click', '.page-link', function(event){
   event.preventDefault(); 
   var page = $(this).attr('href').split('page=')[1];
   fetch_data(page);
});

function fetch_data(page)
{
 var _token = $("input[name=_token]").val();
 $.ajax({
     url:"{{ route('schedulepagination') }}",
     method:"POST",
     data:{_token:_token, page:page},
     success:function(data)
     {
      $('#table_data').html(data);
     }
   });
}

});
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
@stop