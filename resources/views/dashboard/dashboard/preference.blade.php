@extends('layout.grandmaster')

@section('form_details')

    <div class="row clearfix" id='formdetails'>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Preference</strong></h2>
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
                        <h2>Work Preference</h2>
                        <section>



                            <form id='work_preference' method='post'>@csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-8">
                                        <label>Date Available</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                            </div>
                                            <input required minlength="8" type="date" name='date_available' id='date_available'
                                                value="{{ Auth::user()->date_available ?? '' }}" class="form-control date"
                                                placeholder="Choose available date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Position Type</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                            </div>
                                            <input required minlength="8" type="text" name='position_type' id='position_type'
                                                value="{{ Auth::user()->position_type ?? '' }}" class="form-control time24"
                                                placeholder="Specify position type">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-8">
                                        <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                                    </div>
                            </form>

                    </div>



                    </section>
                    <h2>Shift Preference</h2>
                    <section>
                        <form method='post' id='shift_preference'>@csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-8">
                                    <label>Shift</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                        </div>

                                        <input required minlength="8" type='text' class='form-control' value="{{ Auth::user()->shift ?? '' }}" name='shift' id='shift'
                                            placeholder='Specify Shift Option'>

                                        <!-- <input required minlength="8" type="text" id='shift'  value="{{ Auth::user()->nok_name ?? '' }}" name='shift' class="form-control date" placeholder="Input next of kin name"> -->
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Distance</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                                        </div>
                                        <input required minlength="4" type="text" name='distance' value="{{ Auth::user()->distance ?? '' }}"
                                            id='distance' class="form-control time24" placeholder="Specify distance ">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-8">
                                    <input required minlength="8" type='submit' value='Update' class='btn btn-info'>
                                </div>
                            </div>

                        </form>


                    </section>
                <!--    <h2>Work Location</h2>
                    <section>
                        <form method='post' id='account_information'>@csrf
                            <div class="row clearfix">
                       
                            </div>
                        </form>



                    </section>-->
                    <h2>Summary</h2>
                    <section>
                        <p> User Details Summary </p>
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
            $("#work_preference").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
                fd.append('date_available', $("#date_available").val());
                fd.append('position_type', $("#position_type").val());
               

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('workpreference') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#preferenceprogress").attr('aria-valuenow', 50);
                        $("#preferenceprogress").css('width', '50%');
                        $("#preferenceprogress").css('background-color', '#28a745');
                        $(".preferenceprogresstext").text('50');

                        swal("Success", 'Preference Record Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!', data.responseText, 'error')
                    }
                });
            });
            $("#shift_preference").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
               
                fd.append('shift', $("#shift").val());
                fd.append('distance', $("#distance").val());

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('shiftpreference') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#preferenceprogress").attr('aria-valuenow', 100);
                        $("#preferenceprogress").css('width', '100%');
                        $("#preferenceprogress").css('background-color', '#28a745');
                        $(".preferenceprogresstext").text('100');

                        swal("Success", 'Preference Record Updated successfully', 'success');
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


    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->

    <script src="assets/plugins/momentjs/moment.js"></script>
    <!-- Moment Plugin Js -->
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>

@endsection
