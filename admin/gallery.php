<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
 $id= $_REQUEST['id'];
 $db->where("status",1);
 $db->where("id",$id);
 $row = $db->getOne('gallery');	
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>       Gallery Management      </h1>
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
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
    <label for="exampleInputEmail1"> Title</label>
	<input type="text" name="line" required='required' id="line" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $row['type'];}?>" class="form-control">
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
        
       </div>
       </div>
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> View Gallery</h3>
            </div>
              <div class="box-body">

<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Gallery</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$db->where('status',1);
				$rs = $db->get('gallery');
				if(!empty($rs)){
$s = 1;
foreach($rs as $r){
?>
<tr>
<td><?php echo $s;?></td>
<td><?php echo $r['type'];?></td>
<td><img src="../assets/images/<?php echo $r['image'];?>" style="width:200px;"/></td>
<td>
<a href="gallery.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to update ?');" class="btn btn-info" ><i class="fa fa-fw fa-edit"></i></a>
<a href="action/deleteslide.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a></td>
</tr>
<?php $s++;} } ?>
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
