<?php 
include_once("include/header.php"); ?>
<?php include_once("include/menu.php");


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>       My profile     </h1>
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>

    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
<form role="form" method="post" name="form" action="action/myprofilesub.php" enctype="multipart/form-data">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Quick Example</h3>-->
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php 
       $db->where("id",$_SESSION['pock_admin_registration_id']);
        $det = $rs = $db->getOne("admin");
			?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $det["vendor_name"]; ?>"  name="name" placeholder="Name" required>
				  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $det["email"]; ?>" name="email" placeholder="Email" required>
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Mobile</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $det["contact"]; ?>" name="mobile" placeholder="Mobile" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="upload">

                  
                </div>
                <!--<div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>-->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"> change</button>
              </div>
            
          </div>
          <!-- /.box -->

          
          

         

        </div>
        <!--/.col (left) -->

</form>
        
       </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php include_once("include/footer.php");?>
