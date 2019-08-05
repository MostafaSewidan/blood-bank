<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('Adminlte/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('Adminlte/css/fontAwesome.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('Adminlte/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('Adminlte/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('Adminlte/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('Adminlte/css/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>   <![endif]

     Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
@include('adminDashBord.adminLayout.errorMassage')
<div class="login-box">
    <div class="login-logo">
        <h1><b>Blood</b>Bank</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open(['url'=>'login' , 'method'=>'post']) !!}
        <div class="form-group has-feedback">
            {!! Form::email('email' , old('email') ,
             ['class'=>'form-control' ,'placeholder'=>'Email','required'=>'true','autocomplete'=>'email', 'autofocus'=>'true']) !!}

            <span class="fas fa-envelope form-control-feedback" style="padding-top: .7pc"></span>

        </div>
        <div class="form-group has-feedback">
            {!! Form::password('password' , ['class'=>'form-control' ,'placeholder'=>'Password','required'=>'true','autocomplete'=>'current-password']) !!}
            <span class="fas fa-lock form-control-feedback" style="padding-top: .7pc"></span>
        </div>
        <div class="row" style="padding-left: 2pc">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('Adminlte/css/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('Adminlte/css/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('Adminlte/css/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('Adminlte/css/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Adminlte/js/demo.js')}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
