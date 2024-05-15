<?php 
include_once("../../lib/lib.php");
extract($_POST);
if(isset($id) && $id!=''){
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne($tblSlider);	
		$img = '';
		$file_name = $_FILES['icon']['name'];
		if($file_name!=''){
			$file_ext = strtolower(pathinfo($_FILES['icon']['name'],PATHINFO_EXTENSION));
			$expensions= array("jpeg","jpg","png");
			if(in_array($file_ext,$expensions)=== false){
				$_SESSION["errorMsg"] ="Icon type not allowed, please choose a JPEG,JPG .";
				header('location:'.$_SERVER['HTTP_REFERER']);
				die;
			}
		}

	if($file_name!=''){
		$img = $insertId.date('Ymdhis').".".$file_ext;
		move_uploaded_file($_FILES["icon"]["tmp_name"],"../../assets/images/".$img);
	}else{
		$img = 	$row['image'];		
	}
	$db->where("id",$id);
	$insertId = $db->update($tblSlider,array("image"=>$img,"status"=>1,"desc"=>$desc));
	if($insertId){
		$_SESSION["msg"] ="Successfully Update";
		header('location:../addslide.php');
	}else{
		$_SESSION["errorMsg"] ="Problem in Update";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

}else{
		$img = '';
		$file_name = $_FILES['icon']['name'];
		if($file_name!=''){
			$file_ext = strtolower(pathinfo($_FILES['icon']['name'],PATHINFO_EXTENSION));
			$expensions= array("jpeg","jpg","png");
			if(in_array($file_ext,$expensions)=== false){
				$_SESSION["errorMsg"] ="Icon type not allowed, please choose a JPEG,JPG .";
				header('location:'.$_SERVER['HTTP_REFERER']);
				die;
			}
		}
		if($file_name!=''){
			$img = $insertId.date('Ymdhis').".".$file_ext;
			move_uploaded_file($_FILES["icon"]["tmp_name"],"../../assets/images/".$img);
			$insertId = $db->insert($tblSlider,array("image"=>$img,"status"=>1,"desc"=>$desc));
		}
	if($insertId){
		$_SESSION["msg"] ="Successfully Saved";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Problem in Save";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}
?>