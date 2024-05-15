<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
 $id= $_REQUEST['id'];
 $db->where("id",$id);
 $row = $db->getOne('pricing');	
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>       Pricing Management      </h1>
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    </section>
   <section class="content">

     <div class="row">
       <!-- left column -->
<form role="form" method="post" name="form" action="action/pricingSubmit.php" enctype="multipart/form-data">
<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php }?>
        <div class="col-md-12">
         <!-- general form elements -->
      <div class="box box-primary">
           <div class="box-header with-border">
           <h3 class="box-title"> <a class="btn btn-primary" href="pricing.php"><i class="fa fa-eye"></i> View Pricing</a></h3>
            </div>

          <div class="box-body">

<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1"> Title</label>
<select name="category_id" id="category_id" required='required' class="form-control">
<option value="">Select Product</option>
<?php 
$rs = $db->get('product');
foreach($rs as $r){?>
	<option value="<?php echo $r['id'];?>"><?php echo $r['product_name'];?></option>
<?php }?>
</select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1"> Title</label>
	<input type="text" name="name" required='required' id="image" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['name'];}?>" class="form-control">
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1"> Amount</label>
	<input type="text" name="monthly_pay" required='required' id="image" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['monthly_pay'];}?>" class="form-control">
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1">GST</label>
	<input type="text" name="gst" required='required' id="image" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['gst'];}?>" class="form-control">
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1">Total</label>
	<input type="text" name="total" required='required' id="image" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['total'];}?>" class="form-control">
    </div>
</div>




</div>

<div class="box-footer">

<input type="submit" class="btn btn-primary" value="Submit" name="submit" />

</div>

</div>

</div>

</form>

       </div>

      <!-- /.row -->

   </section>

    <!-- /.content -->

  </div>

<?php include_once("include/footer.php");?>

<script src="../assets/ckeditor/ckeditor.js"></script>

<script>

  $(function () {

    // Replace the <textarea id="editor1"> with a CKEditor

    // instance, using default configuration.

    CKEDITOR.replace('editor1')

   //bootstrap WYSIHTML5 - text editor

    //$('.textarea').wysihtml5()

  })



</script>