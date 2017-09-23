<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/bootstrap/css/bootstrap.min.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/font-awesome/css/font-awesome.min.css';?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/ionicons/css/ionicons.min.css';?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/dist/css/AdminLTE.min.css';?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/plugins/iCheck/square/aero.css';?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url().'home/login';?>"><b>SiPresT</b> <br>KOMSI UGM</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login admin</p>
        <?php echo $this->session->flashdata('message_name');?>
        <form action="<?php echo base_url().'login/login';?>" method="post">
          <div class="form-group has-feedback">
            <input class="form-control"  name="username" placeholder="username" required="">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="password" required="">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>

<!--         <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
 -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().'asset/AdminLTE/bootstrap/js/bootstrap.min.js';?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/iCheck/icheck.min.js';?>"></script>
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
