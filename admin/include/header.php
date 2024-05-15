<?php 
include_once("../lib/lib.php");
// if(!isset($_SESSION['admin_registration_id'])){
//   $_SESSION['admin_registration_id'];
//   header("location:".base_url);
//   exit;
// }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
<link rel="icon" type="image/png" href="../assets/images/favi.png" sizes="50x61">

<link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

 <link rel="stylesheet" href="../assets/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

   <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">

 <link rel="stylesheet" href="../assets/plugins/iCheck/minimal/_all.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <style>
 .alert{padding:2px 25px 0px 15px !important;}
 </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>P</b>OCK</span>
      <span class="logo-lg" style="font-size:12px !important;"><b>Pock Mart</b><strong></strong></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                 <a href="myprofile.php" >Profile</a>
              </li>  <li class="user-footer">
                 <a href="changepassword.php" >Change Password</a>
              </li> 
              <li class="user-footer">
                 <a href="logout.php" >Sign out</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>