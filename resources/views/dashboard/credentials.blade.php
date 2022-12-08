@extends('layout.master')
@section('title', 'Dashboard')


@section('parentPageTitle', 'Form')


@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/charts-c3/plugin.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" />--}}
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css')}}" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css')}}">

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css')}}">


@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic" id='personal'>
            <div class="body">
                <a href='/dashboard/index'>

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

    <a href='/dashboard/preference'>
        <div class="col-lg-3 col-md-6 col-sm-12" id='preference'>
            <div class="card widget_2 big_icon sales">
                <div class="body">
                    <h6>Preference</h6>
                    <h2><a class='preferenceprogresstext'>{{ $preferenceprogress }}</a>% <small class="info">of 100
                        </small></h2>
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
                <a href='/dashboard/preference'>
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
                <a href='/dashboard/experience'>

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
                <a href='/dashboard/skills'>

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
                <a href='/usertest'>

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
                <a href='/dashboard/schedule'>
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

<div class="row clearfix" id='formdetails'>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Credentials</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i>
                        </a>

                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="wizard_vertical">
                    <h2>Licenses</h2>
                    <section>



                        <form id='save_licenses' method='post'>@csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-8">
                                    <label>License</label>
                                    <div class="input-group masked-input">

                                        <select class='form-control' name='licenses_license' id='licenses_license'>
                                            <option selected value='{{ $credential->licenses_license ?? ""  }}'>{{ $credential->licenses_license ?? "Select Certificate"  }}</option>

                                            <option value='Hawaii'>Hawaill</option>
                                            <option value='Hawaii'>Hawaill</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>State</label>
                                    <div class="input-group masked-input mb-3">


                                        <select class='form-control' name='licenses_state' id='licenses_state'>
                                            <option selected value='{{ $credential->licenses_state ?? ""  }}'>{{ $credential->licenses_state ?? "Select State"  }}</option>
                                            <option value='Hawaii'>Hawaii</option>
                                            <option value='Hawaii'>Hawaii</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Expiration</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                        </div>
                                        <input type='date' value="{{ $credential->licenses_expiration ?? '' }}" name='licenses_expiration' id='licenses_expiration' required
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>License Number</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                        </div>
                                        <input type='text' value="{{ $credential->licenses_license_number ?? '' }}" name='licenses_license_number' id='licenses_license_number'
                                            required class='form-control'>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Image</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                        </div>
                                        <input type='file' name='licenses_image' id='licenses_image' required
                                            class='form-control'>

                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-8">
                                    <label></label>
                                    <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                                </div>
                        </form>

                </div>
                </section>



                <h2>Client Specific</h2>
                <section>



                    <form id='save_client_specific' method='post'>@csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-8">
                                <label>License</label>
                                <div class="input-group masked-input">

                                    <select class='form-control' required name='client_specific_certification'
                                        id='client_specific_certification'>
                                        <option selected value='{{ $credential->client_specific_certification ?? ""  }}'>{{ $credential->client_specific_certification ?? "Select Certificate"  }}</option>

                                        <option value='Hawaii'>Hawaill</option>
                                        <option value='Hawaii'>Hawaill</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-8">
                                <label>Expiration</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input type='date' value="{{ $credential->client_specific_expiration ?? '' }}" name='client_specific_expiration' id='client_specific_expiration'
                                        required class='form-control'>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <label>License Number</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input type='date' value="{{ $credential->client_specific_expiration ?? '' }}" name='client_specific_license_number'
                                        id='client_specific_license_number' required class='form-control'>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <label>Image</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input type='file' name='client_specific_image' id='client_specific_image' required
                                        class='form-control'>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-8">
                                <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                            </div>
                    </form>

            </div>
            </section>
            <h2>Pre-Employment</h2>
            <section>



                <form id='save_pre_employment' method='post'>@csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-8">
                            <label>License</label>
                            <div class="input-group masked-input">

                                <select class='form-control' required name='pre_employment_license'
                                    id='pre_employment_license'>
                                    <option selected value='{{ $credential->pre_employment_license ?? ""  }}'>{{ $credential->pre_employment_license ?? "Select Certificate"  }}</option>

                                    <option value='Hawaii'>Hawaill</option>
                                    <option value='Hawaii'>Hawaill</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <label>State</label>
                            <div class="input-group masked-input mb-3">


                                <select class='form-control' required name='pre_employment_state'
                                    id='pre_employment_state'>
                                    <option selected value='{{ $credential->pre_employment_state ?? ""  }}'>{{ $credential->pre_employment_state ?? "Select State"  }}</option>

                                    <option value='Hawaii'>Hawaii</option>
                                    <option value='Hawaii'>Hawaii</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <label>Expiration</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                <input type='date' value="{{ $credential->pre_employment_expiration ?? '' }}" name='pre_employment_expiration' id='pre_employment_expiration'
                                    required class='form-control'>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <label>License Number</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                <input type='text'value="{{ $credential->pre_employment_license_number ?? '' }}" name='pre_employment_license_number'
                                    id='pre_employment_license_number' required class='form-control'>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <label>Image</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                <input type='file' name='pre_employment_image' id='pre_employment_image' required
                                    class='form-control'>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8">
                            <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                        </div>
                </form>

        </div>
        </section>
        <h2>Certifications</h2>
        <section>



            <form id='save_certifications' method='post'>@csrf
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>License</label>
                        <div class="input-group masked-input">

                            <select class='form-control' required name='certifications_license'
                                id='certifications_license'>
                                <option selected value='{{ $credential->certifications_license ?? ""  }}'>{{ $credential->certifications_license ?? "Select Certificate"  }}</option>

                                <option value='Hawaii'>Hawaill</option>
                                <option value='Hawaii'>Hawaill</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>State</label>
                        <div class="input-group masked-input mb-3">


                            <select class='form-control' required name='certifications_state' id='certifications_state'>
                                <option selected value='{{ $credential->certifications_state ?? ""  }}'>{{ $credential->certifications_state ?? "Select State"  }}</option>

                                <option value='Hawaii'>Hawaii</option>
                                <option value='Hawaii'>Hawaii</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Expiration</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type='date' value="{{ $credential->certifications_expiration ?? '' }}" name='certifications_expiration' id='certifications_expiration' required
                                class='form-control'>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>License Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type='text' value="{{ $credential->certifications_license_number ?? '' }}" name='certifications_license_number' id='certifications_license_number'
                                required class='form-control'>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Image</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type='file' name='certifications_image' id='certifications_image' required
                                class='form-control'>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                    </div>
            </form>

    </div>
    </section>
    <h2>Medical & Other Screenings</h2>
    <section>



        <form id='save_medical' method='post'>@csrf
            <div class="row clearfix">
                <div class="col-lg-6 col-md-8">
                    <label>License</label>
                    <div class="input-group masked-input">

                        <select class='form-control' required name='medical_license' id='medical_license'>
                            <option selected value='{{ $credential->medical_license ?? ""  }}'>{{ $credential->medical_license ?? "Select Certificate"  }}</option>

                            <option value='Hawaii'>Hawaill</option>
                            <option value='Hawaii'>Hawaill</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <label>State</label>
                    <div class="input-group masked-input mb-3">


                        <select class='form-control' required name='medical_state' id='medical_state'>
                            <option selected value='{{ $credential->medical_state ?? ""  }}'>{{ $credential->medical_state ?? "Select State"  }}</option>

                            <option value='Hawaii'>Hawaii</option>
                            <option value='Hawaii'>Hawaii</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <label>Expiration</label>
                    <div class="input-group masked-input mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                        <input type='date' value="{{ $credential->medical_expiration ?? '' }}" name='medical_expiration' id='medical_expiration' required
                            class='form-control'>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <label>License Number</label>
                    <div class="input-group masked-input mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                        <input type='text' value="{{ $credential->medical_license_number ?? '' }}" name='medical_license_number' id='medical_license_number' required
                            class='form-control'>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <label>Image</label>
                    <div class="input-group masked-input mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                        <input type='file' name='medical_image' id='medical_image' required class='form-control'>

                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                </div>
        </form>

</div>
</section>
<h2>Trainings</h2>
<section>



    <form id='save_trainings' method='post'>@csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-8">
                <label>License</label>
                <div class="input-group masked-input">

                    <select class='form-control' required name='trainings_license' id='trainings_license'>
                        <option selected value='{{ $credential->trainings_license ?? ""  }}'>{{ $credential->trainings_license ?? "Select Certificate"  }}</option>

                        <option value='Hawaii'>Hawaill</option>
                        <option value='Hawaii'>Hawaill</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>State</label>
                <div class="input-group masked-input mb-3">


                    <select class='form-control' required name='trainings_state' id='trainings_state'>
                        <option selected value='{{ $credential->trainings_state ?? ""  }}'>{{ $credential->trainings_state ?? "Select State"  }}</option>

                        <option value='Hawaii'>Hawaii</option>
                        <option value='Hawaii'>Hawaii</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Expiration</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='date' value="{{ $credential->trainings_expiration ?? '' }}" name='trainings_expiration' id='trainings_expiration' required
                        class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>License Number</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='text' value="{{ $credential->trainings_license_number ?? '' }}" name='trainings_license_number' id='trainings_license_number' required
                        class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Image</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='file' name='trainings_image' id='trainings_image' required class='form-control'>

                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
            </div>
    </form>

    </div>
</section>
<h2>Additional Certs/Authorizations</h2>
<section>



    <form id='save_additional_cert' method='post'>@csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-8">
                <label>License</label>
                <div class="input-group masked-input">

                    <select class='form-control' required name='additional_certs_license' id='additional_certs_license'>
                        <option selected value='{{ $credential->additional_certs_license ?? ""  }}'>{{ $credential->additional_certs_license ?? "Select Certificate"  }}</option>

                        <option value='Hawaii'>Hawaill</option>
                        <option value='Hawaii'>Hawaill</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>State</label>
                <div class="input-group masked-input mb-3">


                    <select class='form-control' required name='additional_certs_state' id='additional_certs_state'>
                        <option selected value='{{ $credential->additional_certs_state ?? ""  }}'>{{ $credential->additional_certs_state ?? "Select State"  }}</option>

                        <option value='Hawaii'>Hawaii</option>
                        <option value='Hawaii'>Hawaii</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Expiration</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='date' value="{{ $credential->additional_certs_expiration ?? '' }}" name='additional_certs_expiration' id='additional_certs_expiration' required
                        class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>License Number</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='text' value="{{ $credential->additional_certs_license_number ?? '' }}" name='additional_certs_license_number' id='additional_certs_license_number'
                        required class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Image</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='file' name='additional_cert_image' id='additional_cert_image' required
                        class='form-control'>

                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <input required type='submit' value='Update' class='btn btn-info'>
            </div>
    </form>

    </div>
</section>
<h2>Background Checks & Clearances</h2>
<section>



    <form id='save_background_checks' method='post'>@csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-8">
                <label>License</label>
                <div class="input-group masked-input">

                    <select class='form-control' required name='background_checks_license'
                        id='background_checks_license'>
                        <option selected value='{{ $credential->background_checks_license ?? ""  }}'>{{ $credential->background_checks_license ?? "Select Certificate"  }}</option>

                        <option value='Hawaii'>Hawaill</option>
                        <option value='Hawaii'>Hawaill</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>State</label>
                <div class="input-group masked-input mb-3">


                    <select class='form-control' required name='background_checks_state' id='background_checks_state'>
                        <option selected value='{{ $credential->background_checks_state ?? ""  }}'>{{ $credential->background_checks_state ?? "Select State"  }}</option>

                        <option value='Hawaii'>Hawaii</option>
                        <option value='Hawaii'>Hawaii</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Expiration</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='date' value="{{ $credential->background_checks_expiration ?? '' }}" name='background_checks_expiration' id='background_checks_expiration' required
                        class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>License Number</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='text' value="{{ $credential->background_checks_license_number ?? '' }}" name='background_checks_license_number' id='background_checks_license_number'
                        required class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Image</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='file' name='background_checks_image' id='background_checks_image' required
                        class='form-control'>

                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
            </div>
    </form>

    </div>
</section>
<h2>HR</h2>
<section>



    <form id='save_hr' method='post'>@csrf
        <div class="row clearfix">
            <div class="col-lg-6 col-md-8">
                <label>License</label>
                <div class="input-group masked-input">

                    <select class='form-control' required name='hr_license' id='hr_license'>
                        <option selected value='{{ $credential->hr_license ?? ""  }}'>{{ $credential->hr_license ?? "Select Certificate"  }}</option>

                        <option value='Hawaii'>Hawaill</option>
                        <option value='Hawaii'>Hawaill</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>State</label>
                <div class="input-group masked-input mb-3">


                    <select class='form-control' required name='hr_state' id='hr_state'>
                        <option selected value='{{ $credential->hr_state ?? ""  }}'>{{ $credential->hr_state ?? "Select State"  }}</option>

                        <option value='Hawaii'>Hawaii</option>
                        <option value='Hawaii'>Hawaii</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Expiration</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='date' name='hr_expiration' id='hr_expiration' required class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>License Number</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='text' name='hr_license_number' id='hr_license_number' required class='form-control'>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <label>Image</label>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                    <input type='file' name='hr_image' id='hr_image' required class='form-control'>

                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
            </div>
    </form>

    </div>
</section>

<h2>Summary</h2>
<section>
    <p> Credentials Summary </p>
</section>
</div>
</div>
</div>
</div>
</div>


@stop
@section('page-script')

<script src="{{ asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script>
    $(document).ready(function() {
         
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
        $("body").on("change","#licenses_image", function(e) {
    
            var file = e.target.files[0];
            console.log(file);
         
            $("body").on("submit","#save_licenses", async function(e){
            e.preventDefault();
            
                fd = new FormData();
                fd.append('licenses_license',$("#licenses_license").val())
                fd.append('licenses_state',$("#licenses_state").val())
                fd.append('licenses_expiration',$("#licenses_expiration").val())
                fd.append('licenses_license_number',$("#licenses_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savelicenses') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#client_specific_image", function(e) {

      
            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_client_specific", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('client_specific_certification',$("#client_specific_certification").val())
                // fd.append('client_specific_state',$("#client_specific_state").val())
                fd.append('client_specific_expiration',$("#client_specific_expiration").val())
                fd.append('client_specific_license_number',$("#client_specific_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('saveclientspecific') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#pre_employment_image", function(e) {
        
            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_pre_employment", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('pre_employment_license',$("#pre_employment_license").val())
                fd.append('pre_employment_state',$("#pre_employment_state").val())
                fd.append('pre_employment_expiration',$("#pre_employment_expiration").val())
                fd.append('pre_employment_license_number',$("#pre_employment_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savepreemployment') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#certifications_image", function(e) {

        
            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_certifications", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('certifications_license',$("#certifications_license").val())
                fd.append('certifications_state',$("#certifications_state").val())
                fd.append('certifications_expiration',$("#certifications_expiration").val())
                fd.append('certifications_license_number',$("#certifications_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savecertifications') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#medical_image", function(e) {

            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_medical", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('medical_license',$("#medical_license").val())
                fd.append('medical_state',$("#medical_state").val())
                fd.append('medical_expiration',$("#medical_expiration").val())
                fd.append('medical_license_number',$("#medical_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savemedical') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#trainings_image", function(e) {

            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_trainings", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('trainings_license',$("#trainings_license").val())
                fd.append('trainings_state',$("#trainings_state").val())
                fd.append('trainings_expiration',$("#trainings_expiration").val())
                fd.append('trainings_license_number',$("#trainings_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savetrainings') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#additional_cert_image", function(e) {

            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_additional_cert", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('additional_cert_license',$("#additional_cert_license").val())
                fd.append('additional_cert_state',$("#additional_cert_state").val())
                fd.append('additional_cert_expiration',$("#additional_cert_expiration").val())
                fd.append('additional_cert_license_number',$("#additional_cert_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('saveadditionalcerts') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#background_checks_image", function(e) {

            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_background_checks", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('background_checks_license',$("#background_checks_license").val())
                fd.append('background_checks_state',$("#background_checks_state").val())
                fd.append('background_checks_expiration',$("#background_checks_expiration").val())
                fd.append('background_checks_license_number',$("#background_checks_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savebackgroundchecks') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
        $("body").on("change","#hr_image", function(e) {

            var file = e.target.files[0];
            console.log(file);
            $("body").on("submit","#save_hr", async function(e){

            e.preventDefault();
            
                fd = new FormData();
                fd.append('hr_license',$("#hr_license").val())
                fd.append('hr_state',$("#hr_state").val())
                fd.append('hr_expiration',$("#hr_expiration").val())
                fd.append('hr_license_number',$("#hr_license_number").val())
                fd.append('license_image', file);
            
                console.log(fd, 'this is the fd');
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('savehr') }}",
                    // data: fd,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        swal("Success", 'Credentials Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    
                    
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Oops!", 'Something went wrong', 'error');
                    }
                });
                });
        });
    
        });
</script>


<script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/forms/form-wizard.js')}}"></script>


<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/sparkline.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/index.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/forms/form-wizard.js') }}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop