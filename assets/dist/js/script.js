function get_res_detail(val){

$.ajax({
url: "getRsdetail.php",
type: 'POST',
data: 'res_id='+val,
success: function(result){
	
$("#myModal").html(result);
}});
	
}


function get_pay_detail(vl){
$.ajax({
url: "getPaydetail.php",
type: 'POST',
data: 'pay_id='+vl,
success: function(result){
$("#payModal").html(result);
}});
	
}

function get_vend_detail(v){
$.ajax({
url: "getVenddetail.php",
type: 'POST',
data: 'vend_id='+v,
success: function(result){
$("#vendModal").html(result);
}});
	
}

function get_state(value){
$.ajax({
url: "getstatedetail.php",
type: 'POST',
data: 'cont_id='+value,
success: function(result){
$("#state_res").html(result);
}});
	
}

function get_city(stat_id){
$.ajax({
url: "getcitydetail.php",
type: 'POST',
data: 'st_id='+stat_id,
success: function(result){
$("#city_res").html(result);
}});
	
}
function get_status(id,status){
var ans = confirm("Are you sure?");
if(ans == true){
$.ajax({
url: "changestatus.php",
type: 'POST',
data: 'id='+id+'&sta='+status,
success: function(result){
	
$("#res_"+id).html(result);
}});
} else {
 return false;   
}

	
}
function get_offer(res_id){
$("#loa").show();  
$.ajax({
url: "getofferdetail.php",
type: 'POST',
data: 'rs_id='+res_id,
success: function(result){
$("#loa").hide();
$("#offer_res").html(result);
}});
	

}

function get_tax(rss_id){
$("#load").show();
$("#rs_show").hide();
$.ajax({
url: "gettaxdetail.php",
type: 'POST',
data: 'rss_id='+rss_id,
success: function(result){
$("#load").hide();
$("#rs_show").show();
$("#tax_res").html(result);
}});
	

}

