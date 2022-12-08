@extends('layout.authentication')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form method='post' id='login'>@csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Log in</h5>
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
                    <input type="email" id='email' name='email' value='admin@gmail.com'
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id='password' value='Admin123' name='password'
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    Login as : 
                    <input id="admin_account" name='account' checked type="radio">
                    <label for="remember_me">Admin</label>
                    <input id="user_account" name='account' type="radio">
                    <label for="remember_me">User</label>
                </div>
                <input type='submit' value='Login' class="btn btn-primary btn-block waves-effect waves-light">
                Don't have an account yet? <a href='/register'> Sign Up
                </a>
                <div class="signin_with mt-3">
                    <p class="mb-0">or Sign Up using</p>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i
                            class="zmdi zmdi-facebook"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i
                            class="zmdi zmdi-twitter"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i
                            class="zmdi zmdi-google-plus"></i></button>
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
        <div id='card' class="card">
            <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In" />
        </div>
    </div>
</div>
<script src='{{ asset("assets/animate.css") }}'></script>
<script src='{{ asset("assets/sweetalert2.min.css") }}'></script>
<script src='{{ asset("assets/sweetalert2.all.min.js") }}'></script>

<script>
    $('body').on('submit','#login', async function(e) {
    e.preventDefault()

    let swalAlert = Swal;
swalAlert.fire("Logging in, Please wait...");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
const fd = new FormData;
fd.append('email', $("#email").val());
fd.append('password', $("#password").val());
$.ajax({
            type: 'POST',
            url: '{{ route("login") }}',
            data: fd,
            processData: false,
            contentType: false
        }).done(function(resp) {
            window.location.reload()

        }).fail(function(resp) {
         console.log(resp)
         Swal.fire('Unable to login, contact the administrator')
        });

    })
    $("#admin_account").click(function() {
        $("#email").val('admin@gmail.com')
        $("#password").val('Admin123')
    })
    $("#user_account").click(function() {
        $("#email").val('user@gmail.com')
        $("#password").val('User1234')

    })

</script>
@stop