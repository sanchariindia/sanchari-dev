<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");?>
<div class="content-wrapper">
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    <section class="content-header">
      <h1> Contact Management    </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Contact</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
<th> Name</th>
<th> Email</th>
<th> Mobile</th>
<th> Subject</th>
<th> Message</th>
<th>Actions</th>
</tr>
                </thead>
                <tbody>
                <?php 
				$rs = $db->get('contact');
				if(!empty($rs)){
$s = 1;
foreach($rs as $r){
?>
<tr>
<td><?php echo $s;?></td>
<td><?php echo $r['name'];?></td>
<td><?php echo $r['email'];?></td>
<td><?php echo $r['mobile'];?></td>
<td><?php echo $r['address'];?></td>
<td><?php echo $r['msg'];?></td>
<td>
<a href="action/deletecontact.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a></td>
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