<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('Aset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('Aset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('Aset/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $erorr)
                {{$erorr}}<br/>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>PWEB</b>UKRIM</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register User baru</p>

            <form id="form-registration" action="{{route('register.create')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="nama" required class="form-control" placeholder="Nama User">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="username" required class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <a href="{{route('login.index')}}" class="btn btn-outline-primary">kembali</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('Aset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Aset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{URL::asset('Aset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('Aset/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('Aset/plugin/js/adminlte.min.js')}}"></script>

<script>
    $(function () {
        // $.validator.addMethod("strong_password", function (value, element) {
        //     let password = value;
        //     if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
        //         return false;
        //     }
        //     return true;
        // }, function (value, element) {
        //     let password = $(element).val();
        //     if (!(/^(.{8,20}$)/.test(password))) {
        //         return 'Password must be between 8 to 20 characters long.';
        //     }
        //     else if (!(/^(?=.*[A-Z])/.test(password))) {
        //         return 'Password must contain at least one uppercase.';
        //     }
        //     else if (!(/^(?=.*[a-z])/.test(password))) {
        //         return 'Password must contain at least one lowercase.';
        //     }
        //     else if (!(/^(?=.*[0-9])/.test(password))) {
        //         return 'Password must contain at least one digit.';
        //     }
        //     else if (!(/^(?=.*[@#$%&])/.test(password))) {
        //         return "Password must contain special characters from @#$%&.";
        //     }
        //     return false;
        // });

        $('#form-registration').validate({
            // rules : {
            //     password : {
            //         strong_password : true
            //     }
            // },
            messages : {
                nama : {
                    required: "input nama tidak boleh kosong"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid')
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass()('is-invalid')
            }
        });
    });
</script>
</body>
</html>
