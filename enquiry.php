<?php include("header.php");?>
  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Enquiry Form</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Enquiry</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Request Call back</h2>
          <h3><span>Request Call back</span></h3>
          
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

  <div class="col-lg-6" style="box-shadow: 5px 5px 5px 5px #aca5a5;padding: 10px;">
            <form action="enquirysub.php" method="post" role="form" class="php-email-form1">
<div class="form-group" style="padding: 15px;">
<label style="color: #6f5959;">Your Name</label>
<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
</div>

<div class="form-group" style="padding: 15px;">
<label style="color: #6f5959;">Expected Date of Visit</label>
<input type="text" name="exp_date" placeholder="Expected Date of Visit" id="" class="form-control">
</div>

<div class="form-group" style="padding: 15px;">
<label style="color: #6f5959;">Your Contact Number</label>
<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your Contact Number" required>
</div>

<div class="form-group" style="padding: 15px;">
<label style="color: #6f5959;">Number of Member's</label>
<input type="text" class="form-control" name="member" id="member" placeholder="Number of Member's" required>
</div>

<div class="form-group" style="padding: 15px;">
<label style="color: #6f5959;">Select Service</label>
<select class="form-control" name="service" >
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from product where status=1 and type=1 order by id asc ");
  if(!empty($product)){
    foreach($product as $r){
?>
<option value="<?php echo $r["product_name"];?>"><?php echo $r["product_name"];?></option>
<?php } } ?>
</select>
</div>


<div class="form-group" style="padding: 15px;">
<textarea class="form-control" name="msg" rows="5" placeholder="Any other info" required></textarea>
</div>

<div class="text-center">
  <button class="btn btn-primary" type="submit">Send Message</button>
</div>
          </form>
          </div>

<div class="col-lg-6 ">
           <img src="front.png" class="img-fluid" alt="">
          </div>
<br>
<br>
<br>
<hr>
<br>
<br>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>



        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php include("footer.php");?>