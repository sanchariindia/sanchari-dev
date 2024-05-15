<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Project Management
      </h1>
    </section>
    <section class="content">
      <div class="row">
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
 <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Payment <a class="btn btn-primary" href="addpayment.php"><i class="fa fa-plus"></i> Add Payment</a></h3>
            </div>
            <div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Bank Name </th>
<th>Bank Ac </th>
<th>IFSC</th>
<th>Type</th>
<th>Branch</th>
<th>Image</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from payment  order by id asc ");
	if(!empty($product)){
		foreach($product as $r){
?>
    <tr>
    <td><?php echo $s;?></td>
    <td><?php echo $r['bank_name'];?></td>
    <td><?php echo $r['ac'];?></td>
    <td><?php echo $r['ifsc'];?></td>
    <td><?php echo $r['type'];?></td>
    <td><?php echo $r['branch'];?></td>
    <td><img src="../assets/images/<?php echo $r['image'];?>" style="width:100px;" /></td>
    <td>
    <a href="addpayment.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to update ?');" class="btn btn-info" ><i class="fa fa-fw fa-edit"></i></a>

<a href="action/deletepayment.php?id=<?php echo $r['id'];?>&pid=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a>    

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