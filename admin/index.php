<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="login.php" method="post" id="login" name="login">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="username" id="username" required='required'>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" class="form-control" placeholder="Password"  required='required' name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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

          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" name="submit" id="submit">

        </div>

        <!-- /.col -->

      </div>

    </form>

    <a href="#">I forgot my password</a><br>

    <a href="register.html" class="text-center">Register a new membership</a>

  </div>

</div>

<script src="../assets/jquery/dist/jquery.min.js"></script>

<script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../assets/plugins/iCheck/icheck.min.js"></script>

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