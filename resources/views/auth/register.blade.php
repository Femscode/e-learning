@extends('layout.authentication')
@section('title', 'Register')
@section('content')
{{-- <script src="{{ asset('fullcalendar/sweetalert2.all.min.js')}}" integrity="sha256-jAlCMntTd9fGH88UcgMsYno5+/I0cUCWdSjJ9qHMFRY=" crossorigin="anonymous"></script> --}}
   
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form method='post' id='register'>@csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Sign Up</h5>
                <span>Register as a new member</span>
            </div>
            <div class="body">
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
                <div class="input-group mb-3">
                    <input type="text" minlength="3" id='first_name' name='first_name' class="form-control"
                        placeholder="First Name">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" minlength="3" id='last_name' name='last_name' class="form-control"
                        placeholder="Last Name">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" minlength="8" id='email' name='email' class="form-control"
                        placeholder="Enter Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" minlength="8" id='password' name='password' class="form-control"
                        placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" minlength="8" id='confirm_password' placeholder='Confirm password'
                        type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="checkbox">
                    <input id="remember_me" required type="checkbox">
                    <label for="remember_me">I read and agree to the <a href="javascript:void(0);">terms of
                            usage</a></label>
                </div>
                <input type='submit' class="btn btn-primary btn-block waves-effect waves-light" value='SIGN UP'>
                <div class="signin_with mt-3">
                    <a class="link" href="/login">You already have a membership?</a>
                </div>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>,

        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signup.svg')}}" alt="Sign Up" />
        </div>
    </div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src='{{ asset("assets/animate.css") }}'></script>
<script src='{{ asset("assets/sweetalert2.min.css") }}'></script>
<script src='{{ asset("assets/sweetalert2.all.min.js") }}'></script>
<script>
   $(document).ready(function() {
   
// swal('good')
   })
$('body').on('submit','#register', async function(e) {
    e.preventDefault()
    
    
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const fd = new FormData;
let swalAlert = Swal;
swalAlert.fire("Creating your account. Please wait...");
fd.append('email', $("#email").val());
fd.append('first_name', $("#first_name").val());
fd.append('last_name', $("#last_name").val());
fd.append('password', $("#password").val());
fd.append('confirm_password', $("#confirm_password").val());
$.ajax({
            type: 'POST',
            url: '{{ route("register") }}',
            data: fd,
            processData: false,
            contentType: false
        }).done(function(resp) {

        window.location.reload()
        }).fail(function(resp) {
         console.log(resp)
        });

    })

// var json = {
//     "email" : 'newfasanyafemi@gmail.com',
//     "fname" : 'fasanya',
//     "lname" : 'oluwapelumi',
//     "password" : 'asdfghjkl',
//     "uid" : 'uid',

// }
        // fd.append('regdata' , JSON.stringify(json));
        // $.ajax({
        //     type: 'POST',
        //     url: 'https://editor.crownpersonalcare.com/crowndocs/pages/create',
        //     data: fd,
        //     processData: false,
        //     contentType: false
        // }).done(function(resp) {
          
        // }).fail(function(resp) {
         
        // });
// }

// var json = {
//     "email" : 'fasanyafemi@gmail.com',
   
//     "password" : 'password',
   

// }
//         fd.append('regdata' , JSON.stringify(json));
//         $.ajax({
//             type: 'POST',
//             url: 'https://editor.crownpersonalcare.com/crowndocs/pages/login',
//             data: fd,
//             processData: false,
//             contentType: false
//         }).done(function(resp) {
          
//         }).fail(function(resp) {
         
//         });

</script>
@stop