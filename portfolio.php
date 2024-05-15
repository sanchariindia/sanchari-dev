<?php include("header.php");?>
  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Portfolio</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Portfolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="services inner-page" id="services" class="">
      <div class="container">
        <div class="row">
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from gallery where status=1  order by id desc ");
  if(!empty($product)){
    foreach($product as $r){
?>
<div class="col-lg-4 col-md-6 portfolio-item filter-app" >
<div style="box-shadow: 2px 2px 2px 2px #d9d9d5;padding: 5px;background: #6a0b0b;">
  <img src="assets/images/<?php echo $r['image'];?>" style="height: 250px;max-width: 100%;width: 100%;border: 3px solid #fff;/*! padding: 0px; */" class="img-fluid" alt="">
  <h4 style="text-align: center;padding: 5px;font-size: 20px;color: #fff;"><?php echo $r['type'];?></h4>
</div>
</div>         
<?PHP } } ?>
        </div>
       
      </div>
    </section>

  </main><!-- End #main -->
<?php include("footer.php");?>