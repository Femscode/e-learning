@extends('layout.grandmaster')

@section('form_details')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<div class="card">
    <div class="header">
        <h2><strong>EXPERIENCE</strong> </h2>

    </div>
    <div class="body">
        {{-- <p></p> --}}
        <!-- Nav tabs -->
        <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home_with_icon_title"> <i
                        class="zmdi zmdi-home"></i> EDUCATION </a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile_with_icon_title"><i
                        class="zmdi zmdi-account"></i> WORK </a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages_with_icon_title"><i
                        class="zmdi zmdi-email"></i> RESUME </a></li>
            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings_with_icon_title"><i
                        class="zmdi zmdi-settings"></i> SETTINGS </a></li> --}}
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home_with_icon_title"> <b></b>
                <form class="repeater" id='education_information' enctype='multiple/form-data'>@csrf

                    <div class="repeater1">
                        <div data-repeater-list>
                            <div data-repeater-item>
                                {{-- <td> --}}
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-8">
                                            <label>School Attended</label>
                                            <div class="input-group masked-input">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="zmdi zmdi-account"></i></span>
                                                </div>
                                                <input required minlength="7" type="text" name='school[]' id='school'
                                                    value="{{ Auth::user()->school ?? '' }}"
                                                    class="school form-control date"
                                                    placeholder="Input school attended">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-8">
                                            <label>School Address</label>
                                            <div class="input-group masked-input mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="zmdi zmdi-email"></i></span>
                                                </div>
                                                <input required minlength="7" type="text" name='school_address[]'
                                                    id='school_address' value="{{ Auth::user()->school_address ?? '' }}"
                                                    class="school_address form-control time24"
                                                    placeholder="Input school address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-8">
                                            <label>Course Of Study</label>
                                            <div class="input-group masked-input mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                                </div>
                                                <input required minlength="7" type="text" id='course'
                                                    value="{{ Auth::user()->course ?? '' }}"
                                                    class="course form-control time12" name='course[]'
                                                    placeholder="Input course title">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-8">
                                            <label>Degree/Diploma Earned</label>
                                            <div class="input-group masked-input mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                                </div>
                                                <input required minlength="3" type="text" id='degree'
                                                    class="degree form-control time12"
                                                    value="{{ Auth::user()->degree ?? '' }}" name='degree[]'
                                                    placeholder="Input degree">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-8">
                                            <label>Enrollment Year</label>
                                            <div class="input-group masked-input mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                                </div>
                                                <input id='enrollment_year' required minlength="7" type="date"
                                                    id='enrollment_year' class="enrollment_year form-control time12"
                                                    value="{{ Auth::user()->enrollment_year ?? '' }}"
                                                    name='enrollment_year[]' placeholder="Input enrollment year">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-8">
                                            <label>Graduation Year</label>
                                            <div class="input-group masked-input mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                                </div>
                                                <input id='graduation_year' required minlength="7" type="date"
                                                    id='graduation_year' class="graduation_year form-control time12"
                                                    value="{{ Auth::user()->graduation_year ?? '' }}"
                                                    name='graduation_year[]' placeholder="Input graduation year">
                                            </div>
                                        </div>

                                    </div>
                                    <input data-repeater-delete type="button" class='btn btn-danger' value="Delete" />
                                    {{--
                                </td> --}}

                            </div>
                        </div>

                    </div>
                    <input data-repeater-create type="button" class='btn btn-primary' value="Add" />
                    <input type='submit' value='update' class='btn btn-success'>
                </form>

            </div>
            <div role="tabpanel" class="tab-pane" id='profile_with_icon_title'> <b>Work Information</b>
                <form class='repeater' method='post' id='work_information'>@csrf
                    <div class='repeater1'>
                        <div data-repeater-list>
                            <div data-repeater-item>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-8">
                                        <label>Facility Name</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='facility_name'
                                                value="{{ Auth::user()->facility_name ?? '' }}" name='facility_name[]'
                                                class="facility_name form-control date"
                                                placeholder="Input facility name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Start Date</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                                            </div>
                                            <input min='{{ date("Y-m-d") }}' required minlength="7" type="date"
                                                name='start_date[]' value="{{ Auth::user()->start_date ?? '' }}"
                                                id='start_date' class="start_date form-control time24"
                                                placeholder="Input work start date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Street Address</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='street_address'
                                                value="{{ Auth::user()->street_address ?? '' }}"
                                                class="street_address form-control time12" name='street_address[]'
                                                placeholder="Input street address">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-8">
                                        <label>City</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='city'
                                                value="{{ Auth::user()->city ?? '' }}" class="city form-control time12"
                                                name='city[]' placeholder="Input City">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Postal Code</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="3" type="text" id='postal_code'
                                                value="{{ Auth::user()->postal_code ?? '' }}"
                                                class="postal_code form-control time12" name='postal_code[]'
                                                placeholder="Input postal code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Job Title</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='job_title'
                                                value="{{ Auth::user()->job_title ?? '' }}"
                                                class="job_title form-control time12" name='job_title[]'
                                                placeholder="Input Job Title">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-delete type="button" class='btn btn-danger' value="Delete" />

                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">

                        <div class="col-lg-6 col-md-8">
                            <input data-repeater-create type="button" class='btn btn-primary' value="Add" />

                            <input required minlength="7" type='submit' value='Update' class='btn btn-info'>
                        </div>
                    </div>

                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages_with_icon_title"> <b></b>
                <form method='post' id='resume_information' enctype='multipart/form-data'>@csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-8">
                            <label>Upload Resume/CV</label>
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                </div>
                                <input required minlength="7" type="file" id='resume'
                                    value="{{ Auth::user()->resume ?? '' }}" name='resume' class="form-control date"
                                    placeholder="Upload resume">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8">
                            <label>Upload CPR Card</label>
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                </div>
                                <input required minlength="7" type="file" id='cpr_card'
                                    value="{{ Auth::user()->cpr_card ?? '' }}" name='cpr_card' class="form-control date"
                                    placeholder="Upload resume">
                            </div>
                        </div>


                    </div>
                    <div class="row clearfix">

                        <div class="col-lg-6 col-md-8">
                            <input required minlength="7" type='submit' value='update' class='btn btn-info'>
                        </div>
                    </div>

                </form>
            </div>
            {{-- <div role="tabpanel" class="tab-pane" id="settings_with_icon_title"> <b>Settings Content</b>
                <p> Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation
                    electram moderatius.
                    Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                    pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                    sadipscing mel. </p>
            </div> --}}
        </div>
    </div>
</div>

{{-- <form class="repeater" method='post' action="{{ route('educationinformation') }}" enctype='multiple/form-data'>
    @csrf --}}

    {{-- <form class="repeater">
        <table class="repeater1">
            <tbody data-repeater-list>
                <tr data-repeater-item>
                    <td>
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
                                    <input required minlength="7" type="text" id='course'
                                        value="{{ Auth::user()->course ?? '' }}" class="form-control time12"
                                        name='course' placeholder="Input course title">
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
                                    <input id='enrollment_year' required minlength="7" type="date" id='enrollment_year'
                                        class="form-control time12" value="{{ Auth::user()->enrollment_year ?? '' }}"
                                        name='enrollment_year' placeholder="Input enrollment year">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <label>Graduation Year</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-app"></i></span>
                                    </div>
                                    <input id='graduation_year' required minlength="7" type="date" id='graduation_year'
                                        class="form-control time12" value="{{ Auth::user()->graduation_year ?? '' }}"
                                        name='graduation_year' placeholder="Input graduation year">
                                </div>
                            </div>

                        </div>
                        <input data-repeater-delete type="button" class='btn btn-danger' value="Delete" />
                    </td>

                </tr>
            </tbody>

        </table>
        <input data-repeater-create type="button" class='btn btn-primary' value="Add" />
    </form> --}}
    <script>
        $('.repeater').repeater();
    </script>
    @endsection

    @section('form_script')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        $("#enrollment_year").on('change',function() {
            
            
            value = $("#enrollment_year").val()
            
            $("#graduation_year").attr('min',value)
           
        });
    



            $("#education_information").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();
                var school = $(".school");
                var school_address = $(".school_address");
                var course = $(".course");
                var degree = $(".degree");
                var enrollment_year = $(".enrollment_year");
                var graduation_year = $(".graduation_year");
                for(var i = 0; i < school.length; i++){
    console.log($(school[i]).val(), 'the valye');
    fd.append('school[]', $(school[i]).val());
                fd.append('school_address[]', $(school_address[i]).val());
                fd.append('course[]', $(course[i]).val());
                fd.append('degree[]', $(degree[i]).val());
                fd.append('enrollment_year[]', $(enrollment_year[i]).val());
                fd.append('graduation_year[]', $(graduation_year[i]).val());


                    }
              
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
                var facility_name = $(".facility_name");
                var start_date = $(".start_date");
                var street_address = $(".street_address");
                var city = $(".city");
                var postal_code = $(".postal_code");
                var job_title = $(".job_title");
                for(var i = 0; i < facility_name.length; i++){
    console.log($(facility_name[i]).val(), 'the work');
    fd.append('facility_name[]', $(facility_name[i]).val());
                fd.append('start_date[]', $(start_date[i]).val());
                fd.append('street_address[]', $(street_address[i]).val());
                fd.append('city[]', $(city[i]).val());
                fd.append('postal_code[]', $(postal_code[i]).val());
                fd.append('job_title[]', $(job_title[i]).val());


                    }

                // fd.append('id', id);
                // fd.append('facility_name', $("#facility_name").val());
                // fd.append('start_date', $("#start_date").val());
                // fd.append('street_address', $("#street_address").val());
                // fd.append('city', $("#city").val());
                // fd.append('postal_code', $("#postal_code").val());
                // fd.append('job_title', $("#job_title").val());
                

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


            $("#resume").on('change', function(e) {

var file = e.target.files[0];
console.log(file);
$("#resume_information").on('submit', async function(e){
e.preventDefault();
// $("#kt_modal_new_address_submit").attr('disabled',true)
// var formData = new FormData($(this).parents('form')[0]);
console.log(formData,'this is the fucking formdate')
    fd = new FormData();
    fd.append('resume', file);

    console.log(fd, 'this is the fd');

    $.ajax({
        type: 'POST',
        url: "{{ route('resumeinformation') }}",
        // data: fd,
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            swal("Success", 'Resume Updated successfully', 'success');
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
            // $("#resume_information").on('submit', async function(e) {
            //     e.preventDefault();
            //     // var id = $("#profileId").val();

            //     fd = new FormData();

            //     // fd.append('id', id);
            //     fd.append('resume', $("#resume").val());
              


            //     console.log(fd, 'this is the fd');

            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('resumeinformation') }}",
            //         data: fd,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         success: (data) => {
            //             $(".experienceprogress").attr('aria-valuenow', 100);
            //             $("#experienceprogress").css('width', '100%');
            //             $("#experienceprogress").css('background-color', '#dc3545');
            //             $(".experienceprogresstext").text('100');


            //             swal("Success", 'Resume Updated successfully', 'success');
            //             console.log(data)
            //             // window.location.reload();
            //         },
            //         error: function(data) {
            //             console.log(data);
            //             swal('Oops!', data.responseText, 'error')
            //         }
            //     });
            // });


        })
    </script>

    @endsection