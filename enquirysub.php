<?php 
include("lib/lib.php");
extract($_POST);

$email_to = 'rekhagoswami6886@gmail.com';
$sent_from = 'contact@ujjainguidemahakal.com';
//$msg="<table>
// <tr><td>Name</td><td>".$name."</td></tr>
// <tr><td>Mobile</td><td>".$mobile."</td></tr>
// <tr><td>Expected Visit Date</td><td>".$exp_date."</td></tr>
// <tr><td>Members</td><td>".$member."</td></tr>
// <tr><td>Service</td><td>".$service."</td></tr>
// <tr><td>Other</td><td>".$msg."</td></tr>
// <tr><td>Date</td><td>".date("Y-m-d")."</td></tr>
// </table>";

$db->insert("enquiry",array("name"=>$name,"mobile"=>$mobile,"exp_date"=>$exp_date,"member"=>$member,"service"=>$service,"msg"=>$msg,"date"=>date("Y-m-d")));

$msg="Name:".$name."<br>Mobile:".$mobile."<br>Expected Visit Date:".$exp_date."<br>Members:".$member."<br>Service:".$service."<br>Other:".$msg."<br>Date:".date("Y-m-d")." ";

$headers= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers.="from: Ujjain Guide < ".$sent_from.">\n". //creating headers
"reply-to: ".$email."\n". //creating headers
"X-Priority: 1\n". //headers for priority
"Priority: Urgent\n". //headers for priority
"Importance: high"; //set importance

mail($email_to,"New Enquiry from website",$msg,$headers);

header("location:thansk.php");
?>