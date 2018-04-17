
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ABC Elementary | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/css/vendor/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/theme/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/css/plugins/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>ABC Elementary</b> Admin
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="/login" method="POST" id="form-validate">

    @csrf

      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Username" name="username">
      </div>
      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="row">
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
    </form>

    @if(session()->has('message'))
        <div class="alert alert-danger" id="alert_message">
              <i class="fa fa-times"></i> {{ session()->get('message') }}
        </div>
    @endif

    <a href="#">I forgot my password</a><br>
    <a href="#" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/js/vendor/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/vendor/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/js/plugins/icheck.min.js"></script>

<!-- jQuery Validate -->
<script src="/js/vendor/jquery.validate.min.js"></script>
<!-- Custom Form Validation -->
<script src="/js/vendor/form-validation.js"></script>

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
