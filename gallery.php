<?php include("header.php");?>
  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Places To Visit In Ujjain</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from product where status=1 and type=2 order by id asc ");
  if(!empty($product)){
    foreach($product as $r){
?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-bottom: 10px;">
            <div class="icon-box" style="padding: 0px;">
              <div class="icon1">
           <img src="assets/images/<?php echo $r['image'];?>" style='width: 100%;max-height:200px ;' />
              </div>
              <h4 style="padding-top: 10px;margin-bottom: 5px !important;"><a href=""><?php echo $r['product_name'];?></a></h4>
            </div>
          </div>
<?PHP } } ?>
        </div>
       
      </div>
    </section>

  </main><!-- End #main -->
<?php include("footer.php");?>