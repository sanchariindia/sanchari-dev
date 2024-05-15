<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
 $id= $_REQUEST['id'];
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne($tblProduct);	
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>       Service Management      </h1>
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    </section>
   <section class="content">

     <div class="row">
       <!-- left column -->
<form role="form" method="post" name="form" action="action/addproductSubmit.php" enctype="multipart/form-data">
    <input type="hidden" name="type" value="1">
<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php }?>
        <div class="col-md-12">
         <!-- general form elements -->
      <div class="box box-primary">
           <div class="box-header with-border">
           <h3 class="box-title"> <a class="btn btn-primary" href="services.php"><i class="fa fa-eye"></i> View Service</a></h3>
            </div>

          <div class="box-body">
<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1"> Title</label>
    <input type="text" name="title" required='required' id="image" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['product_name'];}?>" class="form-control">
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1"> Short desc.</label>
	<input type="text" name="short_desc" required='required' id="icon" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['short_desc'];}?>" class="form-control">
    </div>
</div>


<div class="col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Select Image</label>
	<input type="file" name="image"  id="image" >
<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
	<img src="../assets/images/<?php echo $row['image'];?>" style="width:100px;" />
<?php } ?>    
    </div>
</div>


<div class="col-md-12">

    <div class="form-group">

    <label for="exampleInputEmail1"> Discription</label>

   <textarea  class="form-control" name="description" required='required' id="editor1" ><?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['description'];}?></textarea>

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