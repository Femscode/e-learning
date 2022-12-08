@extends('layout.master')
@section('title', 'Dashboard')


@section('parentPageTitle', 'Form')


@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/charts-c3/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/multi-select/css/multi-select.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css')}}" />
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />


@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic" id='personal'>
                <div class="body">
                    <a href='{{ route('dashboard', ['index']) }}'>

                        <h6>Personal</h6>
                    </a>
                    <h2><a class='personalprogresstext'>{{ $personalprogress }}</a>% <small class="info">of 100
                        </small></h2>
                    <small><a class='personalprogresstext'>{{ $personalprogress }}</a>% completed</small>
                    <div class="progress">
                        <div class="progress-bar" id='personalprogress' role="progressbar"
                            aria-valuenow="{{ $personalprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $personalprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <a href='{{ route('dashboard', ['preference']) }}'>
            <div class="col-lg-3 col-md-6 col-sm-12" id='preference'>
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>Preference</h6>
                        <h2><a class='preferenceprogresstext'>{{ $preferenceprogress }}</a>% <small
                                class="info">of 100 </small></h2>
                        <small><a class='preferenceprogresstext'>{{ $preferenceprogress }}</a>% completed</small>
                        <div class="progress">
                            <div class="progress-bar " id='preferenceprogress' role="progressbar" aria-valuenow="38"
                                aria-valuemin="{{ $preferenceprogress }}" aria-valuemax="100"
                                style="width: {{ $preferenceprogress }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <div class="col-lg-3 col-md-6 col-sm-12" id='credentials'>
            <div class="card widget_2 big_icon email">
                <div class="body">
                    <a href='{{ route('dashboard', ['credentials']) }}'>
                    <h6>Credentials</h6>
                    </a>
                    <h2><a class='experienceprogresstext'>{{ $experienceprogress }}</a>% <small class="info">of
                            100 </small></h2>
                    <small><a class='experienceprogresstext'>{{ $experienceprogress }}</a>%completed</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon domains">
                <div class="body">
                    <a href='{{ route('dashboard', ['experience']) }}'>

                        <h6>Experience</h6>
                    </a>
                    <h2><a class='experienceprogresstext'>{{ $experienceprogress }}</a>% <small class="info">of
                            100 </small></h2>
                    <small><a class='experienceprogresstext'>{{ $experienceprogress }}</a>%completed</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon account">
                <div class="body">
                    <a href='{{ route('dashboard', ['skills']) }}'>

                        <h6>Skills</h6>
                    </a>
                    <h2>3 <small class="info"></small></h2>
                    <small>Total skills</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon home">
                <div class="body">
                    <a href='{{ route('usertest') }}'>

                    <h6>Test</h6>
                    </a>
                    <h2>{{ count($test) }} <small class="info"></small></h2>
                    <small>Total Available Assigned</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon apps">
                <div class="body">
                    <a href='/userdocument/{{Auth::user()->id}}'>
                    <h6>Documents</h6>
                    </a>
                    <h2>{{ count($document) }}<small class="info"></small></h2>
                    <small>Total Document Assigned</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon calender">
                <div class="body">
                    <a href='{{ route('dashboard', ['schedule']) }}'>
                    <h6>Schedule</h6>
                    </a>
                    <h2>{{ count($schedule) }} <small class="info"></small></h2>
                    <small>Task Scheduled</small>
                    <div class="progress">
                        <div class="progress-bar" id='experienceprogress' role="progressbar"
                            aria-valuenow="{{ $experienceprogress }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $experienceprogress }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('form_details')


@stop
@section('page-script')
    <script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/sparkline.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/form-wizard.js') }}"></script>
    
<script src="{{ asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
    @yield('form_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
