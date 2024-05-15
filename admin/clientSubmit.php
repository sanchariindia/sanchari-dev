<?php 
include_once("../../lib/lib.php");
extract($_POST);
if(isset($id) && $id!=''){
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne('client');	

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
			move_uploaded_file($_FILES["icon"]["tmp_name"],"../../images/images/".$img);
			//$imagepath = $img;
			//$save = "../../assets/images/" . $imagepath; //This is the new file you saving
			//$file = "../../assets/images/" . $imagepath; //This is the original file
			//list($width, $height) = getimagesize($file) ;
			//$modwidth = 100;
			//$diff = $width / $modwidth;
			//$modheight = $height / $diff;
			//$tn = imagecreatetruecolor($modwidth, $modheight) ;
			//$image = imagecreatefromjpeg($file);
			//imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
			//imagejpeg($tn, $save, 100);
		}else{
			$img = 	$row['image'];		
		}
	$db->where("id",$id);
//	$insertId = $db->update($tblSlider,array("image"=>$img,"line"=>$line,"line2"=>$line2,"status"=>1));
	$insertId = $db->update('client',array("type"=>$line,"image"=>$img,"status"=>1));

	if($insertId){
		$_SESSION["msg"] ="Successfully Update";
		header('location:../clients.php');
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
			$img = date('Ymdhis').".".$file_ext;
			move_uploaded_file($_FILES["icon"]["tmp_name"],"../../assets/images/".$img);
			//$imagepath = $img;
			//$save = "../../assets/images/" . $imagepath; //This is the new file you saving
			//$file = "../../assets/images/" . $imagepath; //This is the original file
			//list($width, $height) = getimagesize($file) ;
			//$modwidth = 100;
			//$diff = $width / $modwidth;
			//$modheight = $height / $diff;
			//$tn = imagecreatetruecolor($modwidth, $modheight) ;
			//$image = imagecreatefromjpeg($file);
			//imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
			//imagejpeg($tn, $save, 100);
		
		//	$insertId = $db->insert($tblSlider,array("image"=>$img,"line"=>$line,"line2"=>$line2,"status"=>1));
			$insertId = $db->insert('client',array("type"=>$line,"image"=>$img,"status"=>1));
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