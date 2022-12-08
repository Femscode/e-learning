@extends('layout.master')
@section('title', 'Dashboard')


@section('parentPageTitle', 'Form')


@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-steps/jquery.steps.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic" id='personal'>
            <div class="body">
                <h6>Personal</h6>
                <h2><a class='personalprogresstext'>{{$personalprogress}}</a>% <small class="info">of 100 </small></h2>
                <small><a class='personalprogresstext'>{{$personalprogress}}</a>% completed</small>
                <div class="progress" >
                    <div class="progress-bar" id='personalprogress' role="progressbar" aria-valuenow="{{$personalprogress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$personalprogress}}%;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-12" id='preference'>
        <div class="card widget_2 big_icon sales">
            <div class="body">
                <h6>Preference</h6>
                <h2><a class='preferenceprogresstext'>{{$preferenceprogress}}</a> <small class="info">of 100 </small></h2>
                <small><a class='preferenceprogresstext'>{{$preferenceprogress}}</a>completed</small>
                <div class="progress">
                    <div class="progress-bar " id='preferenceprogress' role="progressbar" aria-valuenow="38" aria-valuemin="{{$preferenceprogress}}" aria-valuemax="100" style="width: {{$preferenceprogress}}%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12" id='credentials'>
        <div class="card widget_2 big_icon email">
            <div class="body">
                <h6>Credentials</h6>
                <h2><a class='credentialsprogresstext'>{{$credentialsprogress}}</a>% <small class="info">of 100 </small></h2>
                <small><a class='credentialsprogresstext'>{{$credentialsprogress}}</a>%completed</small>
                <div class="progress">
                    <div class="progress-bar" id='credentialsprogress' role="progressbar" aria-valuenow="{{$credentialsprogress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$credentialsprogress}}%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Experience</h6>
                <h2>8 <small class="info">of 10</small></h2>
                <small>Total Registered Domain</small>
                <div class="progress">
                    <div class="progress-bar l-purple" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="40" style="width: 40%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Skills</h6>
                <h2>8 <small class="info">of 10</small></h2>
                <small>Total Registered Domain</small>
                <div class="progress">
                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Test</h6>
                <h2>8 <small class="info">of 10</small></h2>
                <small>Total Registered Domain</small>
                <div class="progress">
                    <div class="progress-bar l-yellow" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Documents</h6>
                <h2>8 <small class="info">of 10</small></h2>
                <small>Total Registered Domain</small>
                <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix" id='formdetails'>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>User Details</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="wizard_vertical">
                    <h2>Personal Information</h2>
                    <section>
                       


                 <form id='personal_information' method='post' >@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text" name='name' id='name' value="{{Auth::user()->name ?? ''}}" class="form-control date" placeholder="Input your name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Email Address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type="text" name='email' id='email'  value="{{Auth::user()->email ?? ''}}" class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Phone Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="number" id='phone' value="{{Auth::user()->phone ?? ''}}" class="form-control time12" name='phone' placeholder="Input mobile number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <label>Location address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="text" id='address' class="form-control time12"  value="{{Auth::user()->address ?? ''}}" name='address' placeholder="Input full address details">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <input type='submit' value='Update' class='btn btn-info'>
                    </div>
                 </form>
                   
                </div>



                    </section>
                    <h2>Next Of Kins Details</h2>
                    <section>
         <form method='post' id='nok_information'>@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text" id='nok_name'  value="{{Auth::user()->nok_name ?? ''}}" name='name' class="form-control date" placeholder="Input next of kin name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Email Address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                            </div>
                            <input type="text" name='nok_email' value="{{Auth::user()->nok_email ?? ''}}"  id='nok_email' class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Phone Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="number" id='nok_phone' value="{{Auth::user()->nok_phone ?? ''}}"  class="form-control time12" name='nok_phone' placeholder="Input mobile number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="text" id='nok_address' value="{{Auth::user()->nok_address ?? ''}}" class="form-control time12" name='nok_address' placeholder="Input full address of next of kin">
                        </div>
                    </div>
             
                    <div class="col-lg-6 col-md-8">
                        <input type='submit' value='Update' class='btn btn-info'>
                    </div>
                </div>

         </form>


                    </section>
                    <h2>Account Information</h2>
                    <section>
        <form method='post' id='account_information'>@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Account Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text"  id='account_name' value="{{Auth::user()->account_name ?? ''}}"  name='account_name' class="form-control date" placeholder="Input your account name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Bank Name</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type="text" id='bank_name' value="{{Auth::user()->bank_name ?? ''}}"  name='bank_name' class="form-control time24" placeholder="Bank Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Account Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-calender"></i></span>
                            </div>
                            <input type="number" class="form-control time12"  value="{{Auth::user()->account_number ?? ''}}" id='account_number' name='account_number' placeholder="Input Account Number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                       <input type='submit' value='update' class='btn btn-info'>
                    </div>
             
                   
                </div>
        </form>



                    </section>
                    <h2>Summary</h2>
                    <section>
                        <p> User Details Summary </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card mcard_4">
            <div class="body">
                <ul class="header-dropdown list-unstyled">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                        <ul class="dropdown-menu slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="img">
                    <img src="{{asset('assets/images/lg/avatar1.jpg')}}" class="rounded-circle" alt="profile-image">
                </div>
                <div class="user">
                    <h5 class="mt-3 mb-1">Eliana Smith</h5>
                    <small class="text-muted">UI/UX Desiger</small>
                </div>
                <ul class="list-unstyled social-links">
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-dribbble"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>                
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
            <div class="body">
                <div class="w_icon pink"><i class="zmdi zmdi-bug"></i></div>
                <h4 class="mt-3 mb-0">12.1k</h4>
                <span class="text-muted">Bugs Fixed</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>15.5%</span>
                </div>
            </div>
        </div>
        <div class="card w_data_1">
            <div class="body">
                <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                <h4 class="mt-3 mb-1">01.8k</h4>
                <span class="text-muted">Submitted Tickers</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>95.5%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="chat-widget">
                    <ul class="list-unstyled">
                        <li class="left">
                            <img src="{{asset('assets/images/xs/avatar3.jpg')}}" class="rounded-circle" alt="">
                            <ul class="list-unstyled chat_info">
                                <li><small>Frank 11:00AM</small></li>
                                <li><span class="message bg-blue">Hello, Michael</span></li>
                                <li><span class="message bg-blue">How are you!</span></li>
                            </ul>
                        </li>
                        <li class="right">
                            <ul class="list-unstyled chat_info">
                                <li><small>11:10AM</small></li>
                                <li><span class="message">Hello, Frank</span></li>
                            </ul>
                        </li>
                        <li class="right">
                            <ul class="list-unstyled chat_info">
                                <li><small>11:11AM</small></li>
                                <li><span class="message">I'm fine what about you?</span></li>
                            </ul>
                        </li>
                        <li class="left">
                            <img src="{{asset('assets/images/xs/avatar2.jpg')}}" class="rounded-circle" alt="">
                            <ul class="list-unstyled chat_info">
                                <li><small>Gary 11:13AM</small></li>
                                <li><span class="message bg-indigo">Hello, Michael and Frank</span></li>
                            </ul>
                        </li>
                        <li class="left">
                            <img src="{{asset('assets/images/xs/avatar5.jpg')}}" class="rounded-circle" alt="">
                            <ul class="list-unstyled chat_info">
                                <li><small>Hossein 11:14AM</small></li>
                                <li><span class="message bg-amber">Hello, team</span></li>
                                <li><span class="message bg-amber">Please let me know your requirements.</span></li>
                                <li><span class="message bg-amber">How would like to connect with us?</span></li>
                            </ul>
                        </li>
                        <li class="right">
                            <ul class="list-unstyled chat_info">
                                <li><small>11:15AM</small></li>
                                <li><span class="message">Hello, Hossein</span></li>
                                <li><span class="message">Meeting on conference room at 12:00PM</span></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">Tim Hank</a>
                            <a class="dropdown-item" href="javascript:void(0);">Hossein Shams</a>
                            <a class="dropdown-item" href="javascript:void(0);">John Smith</a>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter text here..." aria-label="Text input with dropdown button">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-mail-send"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="header">
                <h2><strong>Visitors</strong> Statistics</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="world-map-markers" class="jvector-map"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Distribution</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body text-center">
                <div id="chart-pie" class="c3_chart d_distribution"></div>
                <button class="btn btn-primary mt-4 mb-4">View More</button>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Traffic</strong> Source</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div id="chart-area-step" class="c3_chart d_traffic"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <span> More than 30% percent of users come from direct links. Check details page for more information.</span>
                        <div class="progress mt-4">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                        <div class="d-flex bd-highlight mt-4">
                            <div class="flex-fill bd-highlight">
                                <h5 class="mb-0">21,521 <i class="zmdi zmdi-long-arrow-up"></i></h5>
                                <small>Today</small>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <h5 class="mb-0">%12.35 <i class="zmdi zmdi-long-arrow-down"></i></h5>
                                <small>Last month %</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@stop
@section('page-script')
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>


<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>   
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>
<script>
    $(document).ready(function() {
    
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#personal_information").on('submit', async function(e){
	e.preventDefault();
	// var id = $("#profileId").val();
	
				fd = new FormData();
				
				// fd.append('id', id);
				fd.append('name', $("#name").val());
				fd.append('email', $("#email").val());
				fd.append('phone', $("#phone").val());
				fd.append('address', $("#address").val());
				
				  console.log(fd, 'this is the fd');

				$.ajax({
					type: 'POST',
					url: "{{route('personalinformation')}}",
					data: fd,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
                        $(".personalprogress").attr('aria-valuenow',35);
                        $("#personalprogress").css('width','35%');
                        $("#personalprogress").css('background-color','#dc3545');
                        $(".personalprogresstext").text('35');

						swal("Success", 'Personal Record Updated successfully', 'success');
						console.log(data)
						// window.location.reload();
						 },
					error: function(data) { 
						console.log(data);
						swal('Oops!','Not Updated','error')
					}
				});
});
$("#nok_information").on('submit', async function(e){
	e.preventDefault();
	// var id = $("#profileId").val();
	
				fd = new FormData();
				
				// fd.append('id', id);
				fd.append('nok_name', $("#nok_name").val());
				fd.append('nok_email', $("#nok_email").val());
				fd.append('nok_phone', $("#nok_phone").val());
				fd.append('nok_address', $("#nok_address").val());
				
				  console.log(fd, 'this is the fd');

				$.ajax({
					type: 'POST',
					url: "{{route('nokinformation')}}",
					data: fd,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
                        $("#personalprogress").attr('aria-valuenow',75);
$("#personalprogress").css('width','75%');
$("#personalprogress").css('background-color','#ffc107');
$(".personalprogresstext").text('75');

						swal("Success", 'Next Of Kin Record Updated successfully', 'success');
						console.log(data)
						// window.location.reload();
						 },
					error: function(data) { 
						console.log(data);
						swal('Oops!','Not Updated','error')
					}
				});
});
$("#account_information").on('submit', async function(e){
	e.preventDefault();
	// var id = $("#profileId").val();
	
				fd = new FormData();
				
				// fd.append('id', id);
				fd.append('bank_name', $("#bank_name").val());
				fd.append('account_name', $("#account_name").val());
				fd.append('account_number', $("#account_number").val());
				
				
				  console.log(fd, 'this is the fd');

				$.ajax({
					type: 'POST',
					url: "{{route('accountinformation')}}",
					data: fd,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
                        $("#personalprogress").attr('aria-valuenow',100);
                        $("#personalprogress").css('width','100%');
                        $("#personalprogress").css('background-color','#28a745');
                        $(".personalprogresstext").text('100');


						swal("Success", 'Account Record Updated successfully', 'success');
						console.log(data)
						// window.location.reload();
						 },
					error: function(data) { 
						console.log(data);
						swal('Oops!','Not Updated','error')
					}
				});
});
$("body").on('submit','#preference_information',async function(e) {
   e.preventDefault()
	
				fd = new FormData();
				
				// fd.append('id', id);
				fd.append('institution', $("#institution").val());
				fd.append('industry', $("#industry").val());
				fd.append('stack', $("#stack").val());
				fd.append('country', $("#country").val());
				
				
				  console.log(fd, 'this is the fd');

				$.ajax({
					type: 'POST',
					url: "{{route('preferenceinformation')}}",
					data: fd,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
                        $("#preferenceprogress").attr('aria-valuenow',100);
                        $("#preferenceprogress").css('width','100%');
                        $("#preferenceprogress").css('background-color','#28a745');
                        $(".preferenceprogresstext").text('100');


						swal("Success", 'Preference Record Updated successfully', 'success');
						console.log(data)
						// window.location.reload();
						 },
					error: function(data) { 
						console.log(data);
						swal('Oops!','Not Updated','error')
					}
				});
});		

$("body").on('submit','#credentials_information',async function(e) {
   e.preventDefault()
	
				fd = new FormData();
				
				// fd.append('id', id);
				fd.append('certificate1', $("#certificate1").val());
				fd.append('certificate2', $("#certificate2").val());
				
				
				  console.log(fd, 'this is the fd');

				$.ajax({
					type: 'POST',
					url: "{{route('credentialsinformation')}}",
					data: fd,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
                        $("#credentialsprogress").attr('aria-valuenow',100);
                        $("#credentialsprogress").css('width','100%');
                        $("#credentialsprogress").css('background-color','#28a745');
                        $(".credentialsprogresstext").text('100');


						swal("Success", 'Preference Record Updated successfully', 'success');
						console.log(data)
						// window.location.reload();
						 },
					error: function(data) { 
						console.log(data);
						swal('Oops!','Not Updated','error')
					}
				});
});	

        $("#preference").click( function() {
           $("#formdetails").empty()
           $("#formdetails").append(
               `
               <div class="row clearfix" >
            <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Preference</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="wizard_vertical">
                    <h2>Preference</h2>
                    <section>
                       
            <form id='preference_information'>@csrf

                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Institution Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text" name='institution' value='{{Auth::user()->institution ?? ""}}' id='institution' class="form-control date" placeholder="Input your institution name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Country</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type="text" name='country' value='{{Auth::user()->country ?? ""}}' id='country' class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Industry</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="text" id='industry' value='{{Auth::user()->industry ?? ""}}' class="form-control time12" name='industry' placeholder="Input mobile number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <label>Stack</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-acccount"></i></span>
                            </div>
                            <input type="text" value='{{Auth::user()->stack ?? ""}}' class="form-control time12" id='stack' name='stack' placeholder="input stack">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <input id='preference_information_button' type='submit' value='update' class='btn btn-info'>
                    </div>
             
                   
                </div>

</form>

                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>`
           )


        });
        $("#personal").click(function() {
            $("#formdetails").empty()
            
            $("#formdetails").append(
                `
                <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>User Details</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="wizard_vertical">
                    <h2>Personal Information</h2>
                    <section>
                       


                 <form id='personal_information' method='post' >@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text" name='name' id='name' value="{{Auth::user()->name ?? ''}}" class="form-control date" placeholder="Input your name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Email Address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type="text" name='email' id='email'  value="{{Auth::user()->email ?? ''}}" class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Phone Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="number" id='phone' value="{{Auth::user()->phone ?? ''}}" class="form-control time12" name='phone' placeholder="Input mobile number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <label>Location address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="text" id='address' class="form-control time12"  value="{{Auth::user()->address ?? ''}}" name='address' placeholder="Input full address details">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <input type='submit' value='Update' class='btn btn-info'>
                    </div>
                 </form>
                   
                </div>



                    </section>
                    <h2>Next Of Kins Details</h2>
                    <section>
         <form method='post' id='nok_information'>@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text" id='nok_name'  value="{{Auth::user()->nok_name ?? ''}}" name='name' class="form-control date" placeholder="Input next of kin name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Email Address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                            </div>
                            <input type="text" name='nok_email' value="{{Auth::user()->nok_email ?? ''}}"  id='nok_email' class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin Phone Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="number" id='nok_phone' value="{{Auth::user()->nok_phone ?? ''}}"  class="form-control time12" name='nok_phone' placeholder="Input mobile number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <label>Next Of Kin address</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input type="text" id='nok_address' value="{{Auth::user()->nok_address ?? ''}}" class="form-control time12" name='nok_address' placeholder="Input full address of next of kin">
                        </div>
                    </div>
             
                    <div class="col-lg-6 col-md-8">
                        <input type='submit' value='Update' class='btn btn-info'>
                    </div>
                </div>

         </form>


                    </section>
                    <h2>Account Information</h2>
                    <section>
        <form method='post' id='account_information'>@csrf
                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>Account Name</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                            </div>
                            <input type="text"  id='account_name' value="{{Auth::user()->account_name ?? ''}}"  name='account_name' class="form-control date" placeholder="Input your account name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Bank Name</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <input type="text" id='bank_name' value="{{Auth::user()->bank_name ?? ''}}"  name='bank_name' class="form-control time24" placeholder="Bank Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>Account Number</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-calender"></i></span>
                            </div>
                            <input type="number" class="form-control time12"  value="{{Auth::user()->account_number ?? ''}}" id='account_number' name='account_number' placeholder="Input Account Number">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                       <input type='submit' value='update' class='btn btn-info'>
                    </div>
             
                   
                </div>
        </form>



                    </section>
                    <h2>Summary</h2>
                    <section>
                        <p> User Details Summary </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
                `
            )
            
        })

        $("#credentials").click(function() {
            $("#formdetails").empty()
            $("#formdetails").append(
                `
               <div class="row clearfix" >
            <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Credentials</strong></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="wizard_vertical">
                    <h2>Preference</h2>
                    <section>
                       
            <form id='credentials_information' enctype='multipart/form-data'>@csrf

                    <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <label>College Certificate</label>
                        <div class="input-group masked-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-file"></i></span>
                            </div>
                            <input type="file" name='certifificate1' value='{{Auth::user()->institution ?? ""}}' id='certificate1' class="form-control date" placeholder="Input your institution name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <label>CAC certificate</label>
                        <div class="input-group masked-input mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-file"></i></span>
                            </div>
                            <input type="file" name='certificate2' value='{{Auth::user()->country ?? ""}}' id='certificate2' class="form-control time24" placeholder="Input email address">
                        </div>
                    </div>
                   

                 
                    <div class="col-lg-6 col-md-8">
                        <input id='preference_information_button' type='submit' value='update' class='btn btn-info'>
                    </div>
             
                   
                </div>

</form>

                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>`            )
        })
           })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
