<?php 
include_once("../../lib/lib.php");
extract($_POST);

	$db->where("id",$_REQUEST['id']);
	$d = $db->update($tblBrand,array("status"=>0));
	if($d){
		$_SESSION["msg"] ="Successfully Deleted";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Deleted";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>