<?php 
include("header.php");
$r = $db->rawqueryOne("select * from product where id='".$_REQUEST['id']."' ");
?>
  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><?php echo $r["product_name"];?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $r["product_name"];?></h2>
          <h3>Know More <span>About <?php echo $r["product_name"];?></span></h3>
          <p></p>
        </div>

        <div class="row">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/images/<?php echo $r['image'];?>" style='max-width: 100%; width: 100%;height:200px ;' class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" >
            <!-- <h3><?php echo $r["product_name"];?></h3> -->
            <p class="fst-italic1">
              <?php echo $r["description"];?>
           </p>
         </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
<?php include("footer.php");?>