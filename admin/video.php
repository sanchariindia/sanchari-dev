<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
 $id= $_REQUEST['id'];
 $rss = $db->getOne('video');	
}
?>
<div class="content-wrapper">
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    <section class="content-header">
      <h1> Video Management    </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Video</h3>
              

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" name="form" action="action/videoSubmit.php" enctype="multipart/form-data">
<?php 
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){?>
<input type="hidden" name="id" value="<?php echo $id;?>" />
<?php }?>           
              <div class="box-body">
<div class="col-md-12">
                <div class="form-group">
<label for="exampleInputEmail1" class="col-md-2">Video Embede Url</label>
<input type="text" class="form-control" name="video" required='required' id="video" placeholder="Video Name" value="<?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){echo $rss['video'];}?>">
</div>



<div class="col-md-3">
<input type="submit" class="btn btn-primary" value="Submit" name="submit" />
</div>

                </div>
              </div>
            </form>
          </div>
        </div>
        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Video</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Video Name</th>
				<th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$rs = $db->get('video');
				if(!empty($rs)){
$s = 1;
foreach($rs as $r){
?>
<tr>
<td><?php echo $s;?></td>
<td><?php echo $r['video'];?></td>
<td>
<a href="video.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to update ?');" class="btn btn-info" ><i class="fa fa-fw fa-edit"></i></a>
<a href="action/deletevideo.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a></td>
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