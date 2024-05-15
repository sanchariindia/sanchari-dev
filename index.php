<?php include("header.php");?>
<section id="hero1" class="d-flex align-items-center" style="padding: 0px;">
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
<?php 
$sli=1;
$db->where("status",1);
$slide = $db->get($tblSlider);
if(!empty($slide)){
foreach($slide as $sl){?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $sli;?>" <?php if($sli==1){?> class="active" <?php } ?>></li>
<?php  $sli++;} } ?> 
</ol>

<div class="carousel-inner">
<?php 
$sli=1;
$db->where("status",1);
$slide = $db->get($tblSlider);
if(!empty($slide)){
foreach($slide as $sl){?>
      <div class="item <?php if($sli==1){?>active<?php } ?>">
        <img src="assets/images/<?php echo $sl['image'];?>" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h3><?php echo $sl["desc"];?></h3>
          <p><a class="btn btn-primary" style="background: #6a0b0b;border: 2px solid #fff;width: 80%;" href="enquiry.php">Contact Now : +
          91-9090909090</a></p>
        </div>
      </div>
<?php $sli++;}  } ?>
    </div>
  </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>WELCOME TO UJJAIN</h2>
          <h3>Know More <span>About Ujjain </span></h3>
          <p></p>
        </div>

        <div class="row">


<div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" style="background: #fff;box-shadow: 2px 2px 2px 2px #ccc;" >

<div class="section-title">
<h3><span>Contact Sanchari India</span></h3>
<p style="text-align: center;width: 100%;">
  <a href="tel:9090909090" style="color: #6a0b0b;">+91-9090909090</a></p>
</div>

<div style="padding: 5px;">
  <h3 style="text-align: center;line-height: 35px;">घ से दूर एक दस्त, </h3>
  <h3 style="text-align: center;line-height: 35px;">जो आपको करवाएगा, </h3>
  <h3 style="text-align: center;line-height: 35px;">उज्जैन े सभी मंदिरं के दर्शन,</h3>
  <h3 style="text-align: center;line-height: 35px;">आपक साथ रहकर l.</h3>
</div>


<!-- <p class="fst-italic1">
Ujjain Is Famous For Shri Mahakaleshwar Temple, Shri Mahakaleshwar Bhasmarti, Simhastha (Kumbh Mela), Kal Bhairav, Sandeepani Ashram, Mangal Pooja, Kalsarp Pooja And Many More Reasons. It Is Consider As One Of The 7 Holy City Of Hindu’s.
</p> -->
<!--             <p>
Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
culpa qui officia deserunt mollit anim id est laborum
</p>
--></div>

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="front.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End About Section -->


    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Check our <span>Services</span></h3>
          <p>OUR BEST SERVICES FOR UJJAIN</p>
        </div>

        <div class="row">
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from product where status=1 and type=1 order by id desc ");
  if(!empty($product)){
    foreach($product as $r){
?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-bottom: 10px;">
            <div class="icon-box" style="padding: 0px;">
              <div class="icon1">
            <a href="details.php?id=<?php echo $r["id"];?>"><img src="assets/images/<?php echo $r['image'];?>" style='width: 100%;height:200px ;max-width: 100%;' /></a>
              </div>
              <h4 style="padding-top: 10px;margin-bottom: 5px !important;"><a href=""><?php echo $r['product_name'];?></a></h4>
              <a href="enquiry.php" class="btn btn-primary" style="margin: 10px;">Book Now</a>
            </div>
          </div>
<?PHP } } ?>
        </div>
      </div>
    </section>

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Service Gallery</h2>
        </div>

        <div class="row">
<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from gallery where status=1 order by id desc limit 0,8");
  if(!empty($product)){
    foreach($product as $r){
?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="padding-bottom: 10px;padding: 0px;" >
            <div class="icon-box" style="padding: 0px;">
              <div class="icon1">
            <a href="tel:8819997700"><img src="assets/images/<?php echo $r['image'];?>" style='width: 100%;height:200px ;max-width: 100%;' /></a>
<!--  <div class="portfolio-info">
    <h4><?php echo $r['type'];?></h4>
  </div> -->              </div>

            </div>
          </div>
<?PHP } } ?>
        </div>
      </div>
    </section>


    <section id="featured-services" class="featured-services" style="background: url(banner-2.jpg);background-size: cover;">
      <div class="container" data-aos="fade-up">

        <div class="row">

        <div class="section-title">
          <h2>Why Us</h2>
          <h3>Check our <span>Best Facilities</span></h3>
        </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100" style="text-align: center;">
              <div class="icon"><i class="fa fa-smile-o"></i></div>
              <h4 class="title"><a href="">Customer Satisfaction</a></h4>
              <p class="description">Our Top Most Priority is Visitor's Satisfaction.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200" style="text-align: center;">
              <div class="icon"><i class="fa fa-users"></i></div>
              <h4 class="title"><a href="">Expert Team</a></h4>
              <p class="description">Our Team is Fully Dedicated to Serve You 24*7.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300" style="text-align: center;">
              <div class="icon"><i class="fa fa-handshake-o"></i></div>
              <h4 class="title"><a href="">Trusted Service</a></h4>
              <p class="description">We Are A Trusted Brand For Tourists In Our City.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400" style="text-align: center;">
              <div class="icon"><i class="fa fa-money"></i></div>
              <h4 class="title"><a href="">Most Economical</a></h4>
              <p class="description">We Provide Best Services at Very Competitive Price.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->


    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Cliets</h2>
          <h3>Meet <span>Our Happy Clients</span></h3>
        </div>

       <!--  <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from client where status=1 order by id desc limit 0,8 ");
  if(!empty($product)){
    foreach($product as $r){
?>
<div class="col-lg-4 col-md-6 portfolio-item filter-app" >
<div style="box-shadow: 2px 2px 2px 2px #d9d9d5;padding: 5px;background: #6a0b0b;">
  <img src="assets/images/<?php echo $r['image'];?>" style="height: 250px;max-width: 100%;width: 100%;border: 3px solid #fff;/*! padding: 0px; */" class="img-fluid" alt="">
  <h4 style="text-align: center;padding: 5px;font-size: 20px;color: #fff;"><?php echo $r['type'];?></h4>
</div>
</div>
<?php } } ?>
        </div>
      </div>
    </section>



    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Best Places</h2>
          <h3>Check Best Places to <span>Visit In Ujjain</span></h3>
        </div>

       <!--  <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

<?php 
$s = 1;
$product = $db->rawQuery("SELECT * from product where type=2 order by id asc ");
  if(!empty($product)){
    foreach($product as $r){
?>
<div class="col-lg-4 col-md-6 portfolio-item filter-app" >
<div style="box-shadow: 2px 2px 2px 2px #d9d9d5;padding: 5px;">
  <a href="details.php?id=<?php echo $r["id"];?>"><img src="assets/images/<?php echo $r['image'];?>" style="height: 200px;max-width: 100%;width: 100%;border: 3px solid #ff6b3b;/*! padding: 0px; */" class="img-fluid" alt=""></a>
  <h4 style="text-align: center;padding: 5px;font-size: 20px;/*! color: #fff; */"><?php echo $r['product_name'];?></h4>
 <!--  <div class="portfolio-info">
    <h4><?php echo $r['product_name'];?></h4>
    <a href="assets/images/<?php echo $r['image'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
  </div> -->
</div>
</div>
<?php } } ?>

          

        </div>

      </div>
    </section>



    <!-- ======= Testimonials Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>1/1, Amar Singh Marg, Freeganj Ujjain(M.P.)-456001</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@ujjainguidemahakal.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91-<a href="tel:8819997700">8819997700</a> Drashti ji <br>
<a href="tel:8435185163">8435185163</a> Drashti ji <br>
<a href="tel:9589180545">9589180545</a> Pradeep ji</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">

<iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Amar%20Singh%20Marg,%20Freeganj+(Ujjain%20Guide%20Mahakal)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
          </div>

          <div class="col-lg-6" style="box-shadow: 5px 5px 5px 5px #aca5a5;padding: 10px;">

<h2>Contact Now</h2>
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

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php include("footer.php");?>