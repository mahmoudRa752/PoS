<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
     <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/bootstrap.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/fonts/fontawesome/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/css/adminlte.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo mb-5" style="font-size:6rem">
        <span><b>Admin</b>LTE</span>
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="background-color:white; padding:5px">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{route('dashboard.dologin')}}" method="post">
            @csrf

          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Memmmmmmmmmmmm
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#">I forgot my password</a><br>
        <a href="" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="{{ asset('dashboard/js/adminlte.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
