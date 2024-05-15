<?php 
include_once("../../lib/lib.php");


$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$mobile = $_REQUEST["mobile"];
 $id = $_SESSION['pock_admin_registration_id'];
$fi = $_FILES['upload']['name'];

       $db->where ("id", $id);
      $old = $db->getOne ("admin");
	
if($fi!=""){
	
	$fileName = $_FILES["upload"]["name"]; // The file name
$fileTmpLoc = $_FILES["upload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["upload"]["type"]; // The type of file it is
$fileSize = $_FILES["upload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["upload"]["error"]; // 0 for false... and 1 for true

 $file_ext = strtolower(pathinfo($_FILES['upload']['name'],PATHINFO_EXTENSION));
 $mk = $id.date('Ymdhis')."v.".$file_ext;

    if (!preg_match("/.(jpg|jpeg|png)$/i", $mk) ) { 
// This condition is only if you wish to allow uploading of specific file types
$_SESSION["errorMsg"] =  "ERROR: Your image was not  .jpg, or .jpeg."; unlink($fileTmpLoc); 
header("location:../myprofile.php");
// Remove the uploaded file from the PHP temp folder
exit(); } else if ($_FILES["upload"]["error"] == 1) { 
// if file upload error key is equal to 1
$_SESSION["errorMsg"] =  "ERROR: An error occured while processing the file. Try again."; 
header("location:../myprofile.php");
exit(); } 	  
 
  

$moveResult = move_uploaded_file($_FILES["upload"]["tmp_name"], "../../assets/images/".$mk); 
// Check to make sure the move result is true before continuing
if($moveResult!= true){
	
	$_SESSION["errorMsg"] =  "ERROR: An error occured while processing the file. Try again."; 
    header("location:../myprofile.php");
	exit();
}
	
	$data = Array (
	
	            "vendor_name" => $name,
				"email" => $email,
				
				"contact" => $mobile,
				
				
			   "image" => $mk
);
    $db->where ("id", $id);
	$db->update ("admin", $data);
	
	$_SESSION["msg"] ="Successfully updated";
	header("location:../myprofile.php");
	
}
else {
	
	$data = Array (
	
	            "vendor_name" => $name,
				"email" => $email,
				
				"contact" => $mobile,
				
				
			   "image" => $old["image"]
);
    $db->where ("id", $id);
	$db->update ("admin", $data);
	
	$_SESSION["msg"] ="Successfully updated";
	header("location:../myprofile.php");
	
}


?>