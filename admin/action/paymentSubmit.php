<?php 
include_once("../../lib/lib.php");
extract($_POST);
$img = '';
if(isset($submit)){
	if(isset($id) && $id!=''){
		$db->where("id",$id);
		$rs = $db->getOne('product'); 
		if($_FILES["image"]["tmp_name"]!=''){
				$extension=array("jpeg","jpg","png","gif",'JPG','JPEG');
				$file_name=$_FILES["image"]["name"];
				$ext=pathinfo($file_name,PATHINFO_EXTENSION);
				if(in_array($ext,$extension)) {
					$filename=basename($file_name,$ext);
					$image=date('Ymshis').".".$ext;
					move_uploaded_file($_FILES["image"]["tmp_name"],"../../assets/images/".$image);
				}
		}else{
			$image = $rs['image'];	
		}
		$array = array("bank_name"=>$bank_name,"ifsc"=>$ifsc,"type"=>$type,"ac"=>$ac,"branch"=>$branch,"image"=>$image);
		$db->where("id",$id);
		$insertId = $db->update('payment',$array);
		$i=0;
		if($insertId){
			$_SESSION["msg"] ="Successfully Update";
			header('location:../addpayment.php');
		}else{
			$_SESSION["errorMsg"] ="Not Saved";
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
			

			$array = array("bank_name"=>$bank_name,"ifsc"=>$ifsc,"type"=>$type,"ac"=>$ac,"branch"=>$branch,"image"=>$image);
			$insertId = $db->insert('payment',$array);
					$i=0;
			if($insertId){
				$_SESSION["msg"] ="Successfully Created";
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else{
				$_SESSION["errorMsg"] ="Not Saved";
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
	}
}else{
	$_SESSION["errorMsg"] ="Not Saved";
	header('location:'.$_SERVER['HTTP_REFERER']);
}?>