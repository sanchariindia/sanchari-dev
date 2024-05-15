<?php
include_once("../lib/variable.php");
session_start();
unset($_SESSION['ldd_vendor_registration_id']);
unset($_SESSION['ldd_vendor_registration_name']);
unset($_SESSION['ldd_vendor_token']);
session_destroy();
header("location:".base_url);