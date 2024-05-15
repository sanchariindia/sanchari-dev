<?php 
include_once("../../lib/lib.php");
extract($_POST);

$array = array("subject"=>$emailsubject,"msg"=>$msg,"status"=>1,"date"=>date('Y-m-d'));
$insertId = $db->insert($tblEmail,$array);

	$m = '<table border="0" style="width:80% !important">
	<tr>
	<td><img src="http://cubixwebtechsolutions.com/pock/assets/logo.png" /></td>
	</tr>
	<tr>
	<td"><strong><h3>'.$emailsubject.'</h3></strong></td>
	</tr>
	<tr>
	<td>'.$msg.'</td>
	</tr>
	</table>';


$db->where("status",1);
$rs = $db->get($tblUser);
foreach($rs as $r){
	$to = $r['email'];
	$subject = $emailsubject;
	$message = $m;
	//$header = "From: Enquiry <contact@cubixwebtechsolutions.com> \r\n";
	$header = "From:contact@cubixwebtechsolutions.com\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	$retval = mail($to,$subject,$message,$header);
	
	sendFCMessage($r['fcm_device_id'],$emailsubject,'Pock Mark');
}

	if($insertId){
		$_SESSION["msg"] ="Successfully Send";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION["errorMsg"] ="Not Send";
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
