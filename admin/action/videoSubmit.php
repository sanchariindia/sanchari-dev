<?php 
include_once("../../lib/lib.php");
extract($_POST);
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){

	$db->where("id",$id);
	$c = $db->getOne('video');
	$array = array("video"=>$video);
	$db->where("id",$id);
	$insertId = $db->update('video',$array);
	if($insertId){
		$_SESSION["msg"] ="Successfully Updated";
		header('location:../video.php');
	}else{
		$_SESSION["errorMsg"] ="Not Updated";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

}else{

		$array = array("video"=>$video);
		$insertId = $db->insert('video',$array);
	
	if($insertId){
		$_SESSION["msg"] ="Successfully Created";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Created";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}
?>