@extends('layout.grandmaster')

@section('form_details')

    <div class="row clearfix" id='formdetails'>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>User Details</strong></h2>
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
                        <h2>Personal Information</h2>
                        <section>
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


                            <form id='personal_information' method='post'>@csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-8">
                                        <label>Name</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" name='name' id='name' value="{{ Auth::user()->name ?? '' }}"
                                                class="form-control date" placeholder="Input your name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Email Address</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                            </div>
                                            <input required minlength="7" type="email" name='email' id='email'
                                                value="{{ Auth::user()->email ?? '' }}" class="form-control time24"
                                                placeholder="Input email address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <label>Phone Number</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                            </div>
                                            <input required minlength="11" type="number" id='phone' value="{{ Auth::user()->phone ?? '' }}"
                                                class="form-control time12" name='phone' placeholder="Input mobile number">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-8">
                                        <label>Location address</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-house"></i></span>
                                            </div>
                                            <input required minlength="7" type="text" id='address' class="form-control time12"
                                                value="{{ Auth::user()->address ?? '' }}" name='address'
                                                placeholder="Input full address details">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                        <input required minlength="7" type='submit' value='Update' class='btn btn-info'>
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
                                        <input required minlength="7" type="text" id='nok_name' value="{{ Auth::user()->nok_name ?? '' }}"
                                            name='name' class="form-control date" placeholder="Input next of kin name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Next Of Kin Email Address</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                                        </div>
                                        <input required minlength="7" type="email" name='nok_email' value="{{ Auth::user()->nok_email ?? '' }}"
                                            id='nok_email' class="form-control time24" placeholder="Input email address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Next Of Kin Phone Number</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                        </div>
                                        <input required minlength="11" type="number" id='nok_phone' value="{{ Auth::user()->nok_phone ?? '' }}"
                                            class="form-control time12" name='nok_phone' placeholder="Input mobile number">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-8">
                                    <label>Next Of Kin address</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='nok_address' value="{{ Auth::user()->nok_address ?? '' }}"
                                            class="form-control time12" name='nok_address'
                                            placeholder="Input full address of next of kin">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-8">
                                    <input required minlength="7" type='submit' value='Update' class='btn btn-info'>
                                </div>
                            </div>

                        </form>


                    </section>
                    <h2>Referral Information</h2>
                    <section>
                        <form method='post' id='account_information'>@csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-8">
                                    <label>Referral Name</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='referral_name'
                                            value="{{ Auth::user()->referral_name ?? '' }}" name='referral_name'
                                            class="form-control date" placeholder="Input Referrer Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <label>Referral Source</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                        </div>
                                        <input required minlength="7" type="text" id='referral_source'
                                            value="{{ Auth::user()->referral_source ?? '' }}" name='referral_source'
                                            class="form-control time24" placeholder="Referrer Source">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-8">
                                    <input required minlength="7" type='submit' value='update' class='btn btn-info'>
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
@endsection

@section('form_script')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#personal_information").on('submit', async function(e) {
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
                    url: "{{ route('personalinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".personalprogress").attr('aria-valuenow', 35);
                        $("#personalprogress").css('width', '35%');
                        $("#personalprogress").css('background-color', '#dc3545');
                        $(".personalprogresstext").text('35');

                        swal("Success", 'Personal Record Updated successfully', 'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data,'this is the error message');
                        console.log(data.responseText,'this is the error ressponse text');
                        swal('Oops!',data.responseText, 'error')
                    }
                });
            });
            $("#nok_information").on('submit', async function(e) {
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
                    url: "{{ route('nokinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#personalprogress").attr('aria-valuenow', 75);
                        $("#personalprogress").css('width', '75%');
                        $("#personalprogress").css('background-color', '#ffc107');
                        $(".personalprogresstext").text('75');

                        swal("Success", 'Next Of Kin Record Updated successfully',
                            'success');
                        console.log(data)
                        // window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Oops!', data.responseText, 'error')
                    }
                });
            });
            $("#account_information").on('submit', async function(e) {
                e.preventDefault();
                // var id = $("#profileId").val();

                fd = new FormData();

                // fd.append('id', id);
                fd.append('referral_name', $("#referral_name").val());
                fd.append('referral_source', $("#referral_source").val());
               

                console.log(fd, 'this is the fd');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('accountinformation') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#personalprogress").attr('aria-valuenow', 100);
                        $("#personalprogress").css('width', '100%');
                        $("#personalprogress").css('background-color', '#28a745');
                        $(".personalprogresstext").text('100');


                        swal("Success", 'Referrer Record Updated successfully', 'success');
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
