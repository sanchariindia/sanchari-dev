<?php 
include_once("../../lib/lib.php");
$old = $_POST["old"];
$new = $_POST["new"];
$conf = $_POST["conf"];

$db->where ("id", $_SESSION['pock_admin_registration_id']);
$user = $db->getOne ("admin");

	if($user["password"]!=$old){
		
		$_SESSION["errorMsg"] = "old password is not correct!";
		header("location:../changepassword.php");
		exit();
	}
	
if($new!=$conf){

	$_SESSION["errorMsg"] = "new and confirm password is not match!";
	header("location:../changepassword.php");
	exit();
}

$data = Array ("password" => $conf);
	$db->where ("id", $_SESSION['pock_admin_registration_id']);
	$db->update ("admin", $data);

	$_SESSION["msg"] = "Password change successfully!";
	header("location:../changepassword.php");






?>