<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Services Managemen
      </h1>
    </section>
    <section class="content">
      <div class="row">
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
<script>
function changeStatus(status,itemId){
	$.ajax({url:"changeStatusAjax.php?id="+itemId+"&s="+status, success: function(result){
			$("#statusDiv"+itemId).html(result);	
	 }});
}
</script>        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

          <div class="box-header with-border">



              <h3 class="box-title">View Project <a class="btn btn-primary" href="addservice.php"><i class="fa fa-plus"></i> Add Service</a></h3>



            </div>



            <div class="box-body">



<table id="example1" class="table table-bordered table-striped">

<thead>

<tr>

<th>#</th>
<th>Project Name </th>
<th>Description </th>
<th>Image</th>
<th>Action</th>

</tr>

</thead>

<tbody>



<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from product where status=1 order by id asc ");
	if(!empty($product)){
		foreach($product as $r){
?>
    <tr>

    <td><?php echo $s;?></td>
    <td><?php echo $r['product_name'];?></td>
    <td><?php echo $r['description'];?></td>
    <td><img src="../assets/images/<?php echo $r['image'];?>" style="width:100px;" /></td>
    <td>
    <a href="addservice.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to update ?');" class="btn btn-info" ><i class="fa fa-fw fa-edit"></i></a>
<a href="action/deleteproduct.php?id=<?php echo $r['id'];?>&pid=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a>    
    </td>
     </tr>
<?php $s++;
		}
	}
?>
</tfoot>
</table>

            </div>
          </div>
        </div>
       </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>

<?php include_once("include/footer.php");?>