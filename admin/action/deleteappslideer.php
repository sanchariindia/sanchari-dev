<?php 
include_once("../../lib/lib.php");
extract($_POST);

 $id= $_REQUEST['id'];
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne($tblBanner);	
if(!empty($row)){
	$url = '../../assets/slider/'.$row['image'];;
	$db->where("id",$_REQUEST['id']);
	$d = $db->delete($tblBanner);
	unlink($url);
	if($d){
		$_SESSION["msg"] ="Successfully Deleted";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Deleted";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}else{
		$_SESSION["errorMsg"] ="Not Deleted";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>