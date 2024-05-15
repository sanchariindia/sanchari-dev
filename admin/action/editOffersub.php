<?php 

include_once("../../lib/lib.php");







$data = array(

        "discount_name" => $_REQUEST["dis_name"],
        "discount_type" => $_REQUEST["dis_type"],
		"discount_amount" => $_REQUEST["dis_amount"]




);







    $db->where ("id", $_REQUEST["restaurant"]);

	$db->update ("restaurant", $data);





    $_SESSION["msg"] ="Successfully updated";

	header("location:../discount.php");











?>