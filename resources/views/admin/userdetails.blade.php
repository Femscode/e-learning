@extends('admin.adminmaster')
@section('header')
<h5>User Details</h5>
@stop
@section('content')

<div class="container-xl wide-lg">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Users / <strong class="text-primary small">{{ $user->name }}</strong></h3>
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <li>User Email: <span class="text-base">{{ $user->email }}</span></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="/userlist" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                    <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
      
    </div>
</div>
<div class="card card-preview">
    <div class="card-inner" >
        <ul class="nav nav-tabs mt-n3" style='border:1px solid black;border-style:double; padding:10px'>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Personal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span>Preference</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem7"><em class="icon ni ni-bell"></em><span>Experience</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem8"><em class="icon ni ni-link"></em><span>Credentials</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabItem5">
                <div class="card-inner" style='border:1px solid black'>
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Personal Information</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Full Name</span>
                                    <span class="profile-ud-value">{{ $user->name }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email</span>
                                    <span class="profile-ud-value">{{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Mobile Number</span>
                                    <span class="profile-ud-value">@if($user->phone !== null)<p>{{ $user->phone}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Address</span>
                                    <span class="profile-ud-value">@if($user->address !== null)<p>{{ $user->address}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Next Of Kin Details</span>
                                    <span class="profile-ud-value">@if($user->nok_name !== null && $user->nok_phone !== null && $user->nok_address !== null)<p>{{ $user->nok_name}}, {{ $user->nok_phone }}, {{ $user->nok_address }}</p> @else <p style='color:red'>(Information not fully provided)</p> @endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Referrer Name and Source</span>
                                    <span class="profile-ud-value">@if( $user->referral_name !== null && $user->referral_source !== null)<p>{{ $user->referral_name}}, {{ $user->referral_source}}</p> @else <p style='color:red'> (Information not fully provided)</p>@endif</span>
                                </div>
                            </div>
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Additional Information</h6>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Position Type</span>
                                    <span class="profile-ud-value">@if(  $user->position_type !== null)<p> {{ $user->position_type }} </p> @else <p style='color:red'>(Not yet provided)</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">School And Address </span>
                                    <span class="profile-ud-value">@if(  $user->school !== null && $user->school_address !== null)<p> {{ $user->school }}, {{ $user->school_address }}  </p> @else <p style='color:red'>(Information not fully provided)</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Course And Degree Earned</span>
                                    <span class="profile-ud-value">@if(  $user->course !== null && $user->degree !== null)<p> {{ $user->course }}, {{ $user->degree }}  </p> @else <p style='color:red'>(Information not fully provided)</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Enrollment And Graduation Year</span>
                                    <span class="profile-ud-value">@if($user->enrollment_year !== null && $user->graduation_year)<p>{{date('d/m/Y',strtotime($user->enrollment_year)) }} - {{date('d/m/Y',strtotime($user->graduation_year))}} @else<p style='color:red'>(Information not fully provided)</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Resume/CV</span>
                                    <span class="profile-ud-value">@if($user->resume !== null)
                                        <a href='/downloadresume/{{$user->id}}' class='btn btn-primary btn-sm'>Download Resume</a>
                                             @else<p style='color:red'>(Resume not uploaded)</p>@endif</span>
                                </div>
                            </div>
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                   
                </div><!-- .card-inner -->
            </div>
            <div class="tab-pane " id="tabItem6">
                <div class="card-inner" style='border:1px solid black'>
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Preference Information</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Date Available</span>
                                    <span class="profile-ud-value">@if($user->date_available !== null)<p>{{ $user->date_available}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Position Type</span>
                                    <span class="profile-ud-value">@if($user->position_type !== null)<p>{{ $user->position_type}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Shift</span>
                                    <span class="profile-ud-value">@if($user->shift !== null)<p>{{ $user->shift}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Alternative Shift</span>
                                    <span class="profile-ud-value">@if($user->distance !== null)<p>{{ $user->distance}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                           
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                  
                   
                </div>
            </div>
            <div class="tab-pane" id="tabItem7">
                <div class="card-inner" style='border:1px solid black'>
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Education Information</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">School Name</span>
                                    <span class="profile-ud-value">@if($user->school !== null)<p>{{ $user->school}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">School Address</span>
                                    <span class="profile-ud-value">@if($user->school_address !== null)<p>{{ $user->school_address}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Course Of Study</span>
                                    <span class="profile-ud-value">@if($user->course !== null)<p>{{ $user->course}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Degree</span>
                                    <span class="profile-ud-value">@if($user->degree !== null)<p>{{ $user->degree}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Enrollment Year</span>
                                    <span class="profile-ud-value">@if($user->enrollment_year !== null)<p>{{ $user->enrollment_year}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Graduation Year</span>
                                    <span class="profile-ud-value">@if($user->graduation_year !== null)<p>{{ $user->graduation_year}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Work Information</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Facility Name</span>
                                    <span class="profile-ud-value">@if($user->facility_name !== null)<p>{{ $user->facility_name}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Start Date</span>
                                    <span class="profile-ud-value">@if($user->start_date !== null)<p>{{ $user->start_date}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Street Address</span>
                                    <span class="profile-ud-value">@if($user->street_address !== null)<p>{{ $user->street_address}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">City</span>
                                    <span class="profile-ud-value">@if($user->city !== null)<p>{{ $user->city}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Postal Code</span>
                                    <span class="profile-ud-value">@if($user->postal_code !== null)<p>{{ $user->postal_code}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Job Title</span>
                                    <span class="profile-ud-value">@if($user->job_title !== null)<p>{{ $user->job_title}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                </div>
            </div>
            <div class="tab-pane" id="tabItem8">
                <div class="card-inner" style='border:1px solid black'>
                    @if($credential !== null)
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Licenses</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->licenses_license !== null)<p>{{ $credential->licenses_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->licenses_state !== null)<p>{{ $credential->licenses_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->licenses_expiration !== null)<p>{{ $credential->licenses_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->licenses_license_number !== null)<p>{{ $credential->licenses_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->licenses_image !== null)
                                        <a href='/downloadlicense/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Client Specific</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->client_specific_certification !== null)<p>{{ $credential->client_specific_certification}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                           
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->client_specific_expiration !== null)<p>{{ $credential->client_specific_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->client_specific_license_number !== null)<p>{{ $credential->client_specific_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->client_specific_image !== null)
                                        <a href='/downloadclientspecific/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Pre Employment</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->pre_employment_license !== null)<p>{{ $credential->pre_employment_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->pre_employment_state !== null)<p>{{ $credential->pre_employment_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->pre_employment_expiration !== null)<p>{{ $credential->pre_employment_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->pre_employment_license_number !== null)<p>{{ $credential->pre_employment_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->pre_employment_image !== null)
                                        <a href='/downloadpreemployment/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Certifications</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->certifications_license !== null)<p>{{ $credential->certifications_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->certifications_state !== null)<p>{{ $credential->certifications_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->certifications_expiration !== null)<p>{{ $credential->certifications_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->certifications_license_number !== null)<p>{{ $credential->certifications_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->certifications_image !== null)
                                        <a href='/downloadcertifications/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Medical</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->medical_license !== null)<p>{{ $credential->medical_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->medical_state !== null)<p>{{ $credential->medical_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->medical_expiration !== null)<p>{{ $credential->medical_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->medical_license_number !== null)<p>{{ $credential->medical_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->medical_image !== null)
                                        <a href='/downloadmedical/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Trainings</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->trainings_license !== null)<p>{{ $credential->trainings_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->trainings_state !== null)<p>{{ $credential->trainings_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->trainings_expiration !== null)<p>{{ $credential->trainings_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->trainings_license_number !== null)<p>{{ $credential->trainings_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->trainings_image !== null)
                                        <a href='/downloadtrainings/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                        
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Additional Cert</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->additional_cert_license !== null)<p>{{ $credential->additional_cert_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->additional_cert_state !== null)<p>{{ $credential->additional_cert_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->additional_cert_expiration !== null)<p>{{ $credential->additional_cert_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->additional_cert_license_number !== null)<p>{{ $credential->additional_cert_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->additional_cert_image !== null)
                                        <a href='/downloadadditionalcert/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                             
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Background Checks</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->background_checks_license !== null)<p>{{ $credential->background_checks_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->background_checks_state !== null)<p>{{ $credential->background_checks_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->background_checks_expiration !== null)<p>{{ $credential->background_checks_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->background_checks_license_number !== null)<p>{{ $credential->background_checks_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->background_checks_image !== null)
                                        <a href='/downloadbackgroundchecks/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Hr</h5>
                            {{-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> --}}
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License</span>
                                    <span class="profile-ud-value">@if($credential->hr_license !== null)<p>{{ $credential->hr_license}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">State</span>
                                    <span class="profile-ud-value">@if($credential->hr_state !== null)<p>{{ $credential->hr_state}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Expiration</span>
                                    <span class="profile-ud-value">@if($credential->hr_expiration !== null)<p>{{ $credential->hr_expiration}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Number</span>
                                    <span class="profile-ud-value">@if($credential->hr_license_number !== null)<p>{{ $credential->hr_license_number}}</p> @else <p style='color:red'>Not yet provided</p>@endif</span>
                                </div>
                            </div>
                            
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">License Image</span>
                                    
                                    <span class="profile-ud-value">@if($credential->hr_image !== null)
                                        <a href='/downloadhr/{{$credential->id}}' class='btn btn-primary btn-sm'>Download Image</a>
                                             @else<p style='color:red'>(Image not uploaded)</p>@endif</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @else
                    <p class='alert alert-danger'>No credential uploaded yet</p>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
@stop