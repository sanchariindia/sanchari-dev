<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
 $id= $_REQUEST['id'];
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne("gallery"); 
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Gallery Management</h1>
  <?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){  echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
  <?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
<form role="form" method="post" name="form" action="action/addgallerySubmit.php" enctype="multipart/form-data">
<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php }?>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Gallery Management</h3>
            </div>
              <div class="box-body">


<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
<select class="form-control" name="category_id" required='required'>
<option value="">Select Category</option>
<?php
$db->where("status",1);
$cat = $db->get($tblCategory);  
foreach($cat as $c){
?>
  <option value="<?php echo $c['id']?>" <?php if(isset($_GET['id'])){ 
    if($row['category_id']==$c['id']){?> selected='selected' <?php }}?>
    ><?php echo $c['category_name'];?></option>
<?php
}
?>
</select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1">Select Icon</label>
<input type="file"  name="icon" <?php if(!isset($_REQUEST['id'])){?> required='required' <?php } ?> id="icon" >
<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
<img src="../assets/images/<?php echo $row['image'];?>" style="width:200px;"/>
<?php } ?>
    </div>
</div>

<div class="box-footer">
<input type="submit" class="btn btn-primary" value="Submit" name="submit" />
</div>
</div>
</div>

</form>
    </section>
    <!-- /.content -->
  </div>
<?php include_once("include/footer.php");?>
