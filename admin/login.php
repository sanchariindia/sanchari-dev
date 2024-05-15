<?php 
include_once("../lib/lib.php");
extract($_POST);
if($_POST['username']!='' && $_POST['password']!=''){
	$db->where ("email",$_POST['username']);
	$rs = $db->getOne($tblAdmin);
		if($rs){
			$db->where("email",$_POST['username']);
			$db->where("password",$_POST['password']);
			$rss = $db->getOne($tblAdmin);
			if($rss){
				if($rss['status']==1){
					$_SESSION['admin_registration_id'] = $rss['id'];
					$_SESSION['admin_registration_name'] = $rss['vendor_name'];
					//die;
					header("location:home.php");
				}else{
					$_SESSION['e_msg'] = 'Your Account is deactivated, Please Contact to Administrator';
					header("location:index.php");
				}
			}else{
				$_SESSION['e_msg'] = 'Invalid Email or Password';
				header("location:index.php");
			}
	}else{ 
		$_SESSION['e_msg'] = 'Email Not Available';
		header("location:index.php");
	}
}else{
	$_SESSION['e_msg'] = 'Email and Password Both are Required';
	header("location:index.php");
}
?>