<?php 
include_once("../../lib/lib.php");
extract($_POST);

 $id= $_REQUEST['id'];
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne($tblSlider);	
if(!empty($row)){
	$url = '../../assets/images/'.$row['image'];;
	$db->where("id",$_REQUEST['id']);
	$d = $db->delete($tblSlider);
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