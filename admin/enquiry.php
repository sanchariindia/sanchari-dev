<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");?>
<div class="content-wrapper">
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>
    <section class="content-header">
      <h1> Enquiry Management    </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        
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
<th> Name</th>
<th> Mobile</th>
<th> Service</th>
<th> Exp. Date</th>
<th> Members</th>
<th> Message</th>
<th>Actions</th>
</tr>
                </thead>
                <tbody>
                <?php 
                $db->orderBy("id","desc");
				$rs = $db->get('enquiry');
				if(!empty($rs)){
$s = 1;
foreach($rs as $r){
?>
<tr>
<td><?php echo $s;?></td>
<td><?php echo $r['name'];?></td>
<td><?php echo $r['mobile'];?></td>
<td><?php echo $r['service'];?></td>
<td><?php echo $r['exp_date'];?></td>
<td><?php echo $r['member'];?></td>
<td><?php echo $r['msg'];?></td>
<td>
<a href="action/deleteenquiry.php?id=<?php echo $r['id'];?>" onClick="return confirm('Are you want to delete ?');" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a></td>
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