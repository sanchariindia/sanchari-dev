<?php 
include_once("../../lib/lib.php");
extract($_POST);
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){

	$array = array("qty"=>$qty);
	$db->where("id",$id);
	$insertId = $db->update($tblQty,$array);
	if($insertId){
		$_SESSION["msg"] ="Successfully Updated";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Updated";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

}else{

		$array = array("qty"=>$qty,"status"=>1);
		$insertId = $db->insert($tblQty,$array);
	
	if($insertId){
		$_SESSION["msg"] ="Successfully Created";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Created";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}
?>