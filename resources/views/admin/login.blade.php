<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>lms</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/animate.css/animate.css')}}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('assets/admin/stylesheets/css/style.css')}}">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
       
        <!--LOGO-->
        <div class="logo">
           <h1 class="text-center">Library Management</h1>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">

                    <form id="sign_in_adm" method="POST" action="{{ route('admin.login.submit') }}">
                       @csrf
                       <div class="input-group">
                          <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                          <div class="form-line">
                             <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                          </div>
                          @if ($errors->has('email'))
                          <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                          @endif
                       </div>
                       <br>
                       <div class="input-group">
                          <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                          <div class="form-line">
                             <input type="password" class="form-control" name="password" placeholder="Password" required>
                          </div>
                       </div>
                       <div>
                          <div class="">
                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberme" class="filled-in chk-col-pink">
                             <label for="rememberme">Remember Me</label>
                          </div>
                          <div class="text-center">
                             <button type="submit" class="btn btn-raised waves-effect g-bg-cyan btn-primary">SIGN IN</button>
                          </div>
                       </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="{{asset('assets/admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/nano-scroller/nano-scroller.js')}}"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{asset('assets/admin/javascripts/template-script.min.js')}}"></script>
<script src="{{asset('assets/admin/javascripts/template-init.min.js')}}"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>



</html>
