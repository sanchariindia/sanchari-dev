<?php include_once("include/header.php");?>
<?php include_once("include/menu.php");

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>       Change password     </h1>
<?php if(isset($_SESSION["msg"]) && $_SESSION["msg"]!=''){	echo msg($_SESSION["msg"]); $_SESSION["msg"]=''; }?>
<?php if(isset($_SESSION["errorMsg"]) && $_SESSION["errorMsg"]!=''){echo errorMsg($_SESSION["errorMsg"]);  $_SESSION["errorMsg"]='';}?>

    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
<form role="form" method="post" name="form" action="action/changePasswordsub.php">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Quick Example</h3>-->
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1"  name="old" placeholder="Old password" required>
				  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="new" placeholder="New Password" required>
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="conf" placeholder="Confirm Password" required>
                </div>
                <!--<div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>-->
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
