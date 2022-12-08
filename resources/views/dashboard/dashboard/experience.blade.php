@extends('layout.grandmaster')

@section('form_details')

    <div class="row clearfix" id='formdetails'>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Experience</strong></h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                    class="zmdi zmdi-more"></i> </a>
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
                        <h2>Education</h2>
                        <section>



                            <form id='education_information' method='post'>@csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-8">
                                        <label>School Attended</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" name='school' id='school'
                                                value="{{ Auth::user()->school ?? '' }}" class="form-control date"
                                                placeholder="Input school attended">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>School Address</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" name='school_address' id='school_address'
                                                value="{{ Auth::user()->school_address ?? '' }}" class="form-control time24"
                                                placeholder="Input school address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Course Of Study</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='course' value="{{ Auth::user()->course ?? '' }}"
                                                class="form-control time12" name='course' placeholder="Input course title">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-8">
                                        <label>Degree/Diploma Earned</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="3" type="text" id='degree' class="form-control time12"
                                                value="{{ Auth::user()->degree ?? '' }}" name='degree'
                                                placeholder="Input degree">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Enrollment Year</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="date" id='enrollment_year' class="form-control time12"
                                                value="{{ Auth::user()->enrollment_year ?? '' }}" name='enrollment_year'
                                                placeholder="Input enrollment year">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Graduation Year</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="date" id='graduation_year' class="form-control time12"
                                                value="{{ Auth::user()->graduation_year ?? '' }}" name='graduation_year'
                                                placeholder="Input graduation year">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <input required minlength="7" type='submit' value='Update' class='btn btn-info'>
                                    </div>
                            </form>

                    </div>



                    </section>
                    <h2>Work</h2>
                    <section>
                        <form method='post' id='work_information'>@csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-8">
                                    <label>Facility Name</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='facility_name'
                                            value="{{ Auth::user()->facility_name ?? '' }}" name='facility_name'
                                            class="form-control date" placeholder="Input facility name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Start Date</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                                        </div>
                                        <input required minlength="7" type="date" name='start_date' value="{{ Auth::user()->start_date ?? '' }}"
                                            id='start_date' class="form-control time24" placeholder="Input work start date">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Street Address</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='street_address'
                                            value="{{ Auth::user()->street_address ?? '' }}" class="form-control time12"
                                            name='street_address' placeholder="Input street address">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-8">
                                    <label>City</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='city' value="{{ Auth::user()->city ?? '' }}"
                                            class="form-control time12" name='city'
                                            placeholder="Input City">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Postal Code</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="3" type="text" id='postal_code' value="{{ Auth::user()->postal_code ?? '' }}"
                                            class="form-control time12" name='postal_code'
                                            placeholder="Input postal code">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Job Title</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='job_title' value="{{ Auth::user()->job_title ?? '' }}"
                                            class="form-control time12" name='job_title'
                                            placeholder="Input Job Title">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Unit</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="2" type="text" id='unit' value="{{ Auth::user()->unit ?? '' }}"
                                            class="form-control time12" name='unit'
                                            placeholder="Input Unit">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Unit Bed</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="2" type="text" id='unit_beds' value="{{ Auth::user()->unit_beds ?? '' }}"
                                            class="form-control time12" name='unit_beds'
                                            placeholder="Input Unit Beds">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Patient Ratio</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                        </div>
                                        <input required minlength="2" type="text" id='patient_ratio'
                                            value="{{ Auth::user()->patient_ratio ?? '' }}" class="form-control time12"
                                            name='patient_ratio' placeholder="Input Patient Ratio">
                                    </div>
                                </div>


                            </div>
                            <div class="row clearfix">

                            <div class="col-lg-6 col-md-8">
                                <input required minlength="7" type='submit' value='Update' class='btn btn-info'>
                            </div>
                            </div>

                        </form>


                    </section>
                    <h2>Resume</h2>
                    <section>
                        <form method='post' id='resume_information'>@csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-8">
                                    <label>Upload Resume/CV</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                        </div>
                                        <input required minlength="7" type="file" id='resume' value="{{ Auth::user()->resume ?? '' }}"
                                            name='resume' class="form-control date" placeholder="Upload resume">
                                    </div>
                                </div>


                            </div>
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-8">
                                    <input required minlength="7" type='submit' value='update' class='btn btn-info'>
                                </div>
                            </div>

                        </form>



                    </section>
                    <h2>Summary</h2>
                    <section>
                        <p> Experience Summary </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('form_script')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#education_information").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
                fd.append('school', $("#school").val());
                fd.append('school_address', $("#school_address").val());
                fd.append('course', $("#course").val());
                fd.append('degree', $("#degree").val());
                fd.append('enrollment_year', $("#enrollment_year").val());
                fd.append('graduation_year', $("#graduation_year").val());

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('educationinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".experienceprogress").attr('aria-valuenow', 35);
                        $("#experienceprogress").css('width', '35%');
                        $("#experienceprogress").css('background-color', '#dc3545');
                        $(".experienceprogresstext").text('35');

                        swal("Success", 'Education Record Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!', data.responseText, 'error')
                    }
                });
            });
            $("#work_information").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
                fd.append('facility_name', $("#facility_name").val());
                fd.append('start_date', $("#start_date").val());
                fd.append('street_address', $("#street_address").val());
                fd.append('city', $("#city").val());
                fd.append('postal_code', $("#postal_code").val());
                fd.append('job_title', $("#job_title").val());
                fd.append('unit', $("#unit").val());
                fd.append('unit_beds', $("#unit_beds").val());
                fd.append('patient_ratio', $("#patient_ratio").val());

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('workinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".experienceprogress").attr('aria-valuenow', 65);
                        $("#experienceprogress").css('width', '65%');
                        $("#experienceprogress").css('background-color', '#dc3545');
                        $(".experienceprogresstext").text('65');


                        swal("Success", 'Works Record Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!',data.responseText, 'error')
                    }
                });
            });
            $("#resume_information").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
                fd.append('resume', $("#resume").val());
              


                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('resumeinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".experienceprogress").attr('aria-valuenow', 100);
                        $("#experienceprogress").css('width', '100%');
                        $("#experienceprogress").css('background-color', '#dc3545');
                        $(".experienceprogresstext").text('100');


                        swal("Success", 'Resume Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!', data.responseText, 'error')
                    }
                });
            });


        })
    </script>

@endsection
