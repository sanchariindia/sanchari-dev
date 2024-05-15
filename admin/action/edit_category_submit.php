<?php 
include_once("../../lib/lib.php");

$cat = $_REQUEST["category"];
$id = $_REQUEST["id"];

$data = array(
        "category_name" => $cat


);



    $db->where ("id", $id);
	$db->update ("category", $data);


    $_SESSION["msg"] ="Successfully updated";
	header("location:../category.php");





?>