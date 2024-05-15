<?php 
include_once("../../lib/lib.php");
extract($_POST);
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
	$db->where("id",$id);
	$c = $db->getOne('blog');
$image = '';
	if($_FILES["image"]["tmp_name"]!=''){
			$extension=array("jpeg","jpg","png","gif");
			$file_name=$_FILES["image"]["name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension)) {
				$filename=basename($file_name,$ext);
				$image=date('Ymshis').".".$ext;
				move_uploaded_file($_FILES["image"]["tmp_name"],"../../assets/images/".$image);
			}
	}else{
		$image = $c['image'];
	}

	$array = array("title"=>$title,"description"=>$description,"date"=>date('Y-m-d'),"image"=>$image);
	$db->where("id",$id);
	$insertId = $db->update('blog',$array);
	if($insertId){
		$_SESSION["msg"] ="Successfully Updated";
		header('location:../addblog.php');
	}else{

		$_SESSION["errorMsg"] ="Not Updated";

		header('location:'.$_SERVER['HTTP_REFERER']);

	}
}else{
$image = '';
	if($_FILES["image"]["tmp_name"]!=''){
			$extension=array("jpeg","jpg","png","gif");
			$file_name=$_FILES["image"]["name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension)) {
				$filename=basename($file_name,$ext);
				$image=date('Ymshis').".".$ext;
				move_uploaded_file($_FILES["image"]["tmp_name"],"../../assets/images/".$image);
			}
	}
		$array = array("title"=>$title,"description"=>$description,"date"=>date('Y-m-d'),"image"=>$image);
		//print_r($array);
$insertId = $db->insert('blog',$array);
		$i=0;
if($insertId){
	$_SESSION["msg"] ="Successfully Created";
	header('location:'.$_SERVER['HTTP_REFERER']);
}else{
	$_SESSION["errorMsg"] ="Not Saved";
	header('location:'.$_SERVER['HTTP_REFERER']);
}
}
?>