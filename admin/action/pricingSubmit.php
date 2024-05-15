<?php 
include_once("../../lib/lib.php");
extract($_POST);
$img = '';
if(isset($submit)){
	if(isset($id) && $id!=''){

		$array = array('product_id'=>$category_id,'name'=>$name,'monthly_pay'=>$monthly_pay, 'gst'=>$gst,'total'=>$total);
		$db->where("id",$id);
		$insertId = $db->update('pricing',$array);
		$i=0;
		if($insertId){
			$_SESSION["msg"] ="Successfully Update";
			header('location:../addpricing.php');
		}else{
			$_SESSION["errorMsg"] ="Not Saved";
			header('location:'.$_SERVER['HTTP_REFERER']);
		}
}else{
		

			$array = array('product_id'=>$category_id,'name'=>$name, 'monthly_pay'=>$monthly_pay,'gst'=>$gst,'total'=>$total);
			$insertId = $db->insert('pricing',$array);
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