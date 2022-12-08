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

</head>

<body class="theme-blush">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48"
                    alt="Crown"></div>
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
            <li><a href="/dashboard/schedule" class="main_search" title="Search..."><i
                        class="zmdi zmdi-calendar"></i></a></li>
            <li><a href="/userdocument/{{ Auth::user()->id }}" class="main_search" title="Search..."><i
                        class="zmdi zmdi-google-drive"></i></a></li>
            <li><a href="/dashboard/index" class="main_search" title="Search..."><i class="zmdi zmdi-account"></i></a>
            </li>
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
                            {{-- <small>{{ Auth::user()->email }}</small> --}}
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
                <li><a href="/usersideuploadeddocument"><i class="zmdi zmdi-folder"></i><span>Uploaded Document</span></a></li>
                {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>App</span></a>
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


    <section class="content file_manager">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Upload Document To Admin</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Crown</a>
                            </li>
                            <li class="breadcrumb-item"><a href="file-dashboard.html">User upload</a></li>
                            <li class="breadcrumb-item active">Documents</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                        <button class="btn btn-success btn-icon float-right" type="button"><i
                                class="zmdi zmdi-upload"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="nav nav-tabs pl-0 pr-0">
                                {{-- <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#doc">Documents</a></li> --}}
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" style='margin-right:0px' data-toggle="modal" data-target="#exampleModalCenter">
                                    Upload Document 
                                </button>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pdf">Folders</a></li> --}}
                                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#xls">XLS</a></li>
                                --}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="doc">
                                    <div class="row clearfix">
                                        @foreach($files as $document)
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a>
                                                        <div class="float-right">
                                                            <a href='/downloaduploadeddocument/{{$document->id}}' target="_blank"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-success">
                                                                <i class="zmdi zmdi-eye"></i>
                                                            </a>
                                                            <a href='/downloaduploadeddocument/{{$document->id}}'
                                                                class="btn btn-icon btn-icon-mini btn-round btn-primary">
                                                                <i class="zmdi zmdi-download"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-file-text"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">{{$document->name}}</p>
                                                            <small>Size: 42KB <span class="date text-muted">{{date('F
                                                                    d,Y',strtotime($document->created_at))}}</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="pdf">
                                    <div class="row clearfix">
                                        <table
                                            class="table table-hover mb-0 c_table footable footable-1 footable-paging footable-paging-center breakpoint-lg"
                                            style="">
                                            <thead>
                                                <tr class="footable-header">
                                                    <th class="footable-sortable footable-first-visible"
                                                        style="display: table-cell;">Name<span
                                                            class="fooicon fooicon-sort"></span></th>

                                                    <th data-breakpoints="xs" class="footable-sortable"
                                                        style="display: table-cell;">Owner<span
                                                            class="fooicon fooicon-sort"></span></th>
                                                    <th data-breakpoints="xs sm md" class="footable-sortable"
                                                        style="display: table-cell;">Date Assigned<span
                                                            class="fooicon fooicon-sort"></span></th>
                                                    <th data-breakpoints="xs"
                                                        class="footable-sortable footable-last-visible"
                                                        style="display: table-cell;">File size<span
                                                            class="fooicon fooicon-sort"></span></th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <tr>
                                                  
                                            <tfoot>
                                                <tr class="footable-paging">
                                                    <td colspan="4">
                                                        <ul class="pagination">
                                                            <li class="footable-page-nav disabled" data-page="first"><a
                                                                    class="footable-page-link" href="#">«</a></li>
                                                            <li class="footable-page-nav disabled" data-page="prev"><a
                                                                    class="footable-page-link" href="#">‹</a></li>
                                                            <li class="footable-page visible active" data-page="1"><a
                                                                    class="footable-page-link" href="#">1</a></li>
                                                            <li class="footable-page visible" data-page="2"><a
                                                                    class="footable-page-link" href="#">2</a></li>
                                                            <li class="footable-page-nav" data-page="next"><a
                                                                    class="footable-page-link" href="#">›</a></li>
                                                            <li class="footable-page-nav" data-page="last"><a
                                                                    class="footable-page-link" href="#">»</a></li>
                                                        </ul>
                                                        <div class="divider"></div><span class="label label-default">1
                                                            of 2</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane" id="xls">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2019.xls</p>
                                                            <small>Size: 103KB <span class="date text-muted">Jan 24,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2019.xls</p>
                                                            <small>Size: 103KB <span class="date text-muted">Jan 24,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2019.xls</p>
                                                            <small>Size: 103KB <span class="date text-muted">Jan 24,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">
                                                        <div class="hover">
                                                            <button type="button"
                                                                class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            <p class="m-b-5 text-muted">Report2016.xls</p>
                                                            <small>Size: 68KB <span class="date text-muted">Dec 12,
                                                                    2016</span></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('createuploadeddocument')}}" enctype='multipart/form-data' method="POST">@csrf
                    <!--begin::Modal header-->

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->

                           
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Select Multiple Files</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" type='file' multiple placeholder="" name="files[]" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                           
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
</body>

</html>