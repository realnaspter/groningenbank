<?php 

$title = "Groningenbank | Contact Us";

include("header.php");

?>



<header class="page-title page-bg" style="background-image: url(assets/images/contact-us-bg.png);">
<div class="container">
<div class="page-title-inner">
<div class="section-title">
<h1>Contact Us</h1>
<ul class="page-breadcrumbs">
<li><a href="index.php">Home</a></li>
<li>Contact us</li>
</ul>
</div>
</div>
</div>
</header>


<section class="contact-address-section pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-4">
<div class="box-card fluid-height">
<div class="box-card-inner full-height">
<div class="box-card-icon mb-25">
<img src="assets/images/address.png" alt="icon"> 
</div>
<div class="box-card-details">
<h3 class="box-card-title mb-20">Address</h3>
<p class="box-card-para">Groningen , Netherlands</p>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
<div class="box-card fluid-height">
<div class="box-card-inner full-height">
<div class="box-card-icon mb-25">
<img src="assets/images/email.png" alt="icon"> 
</div>
<div class="box-card-details">
<h3 class="box-card-title mb-20">Email</h3>
<p class="box-card-para"><a class="link-us" href="mailto:customercare@groningenbank.com"><span class="__cf_email__" data-cfemail="472e29212807262b2e266924282a">customercare@groningenbank.com</span></a></p>

</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4 offset-md-3 offset-lg-0">
<div class="box-card fluid-height">
<div class="box-card-inner full-height">
<div class="box-card-icon mb-25">
<img src="assets/images/contact-phone.png" alt="icon"> 
</div>
<div class="box-card-details">
<h3 class="box-card-title mb-20">Phone</h3>
<p class="box-card-para"><a class="link-us" href="tel:+31 502010051">+31 502010051</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="contact-comment-section bg-off-white pt-100 pb-70">
<div class="container">
<div class="home-facility-content">
<div class="row align-items-end">
<div class="col-sm-12 col-md-12 col-lg-5">
<div class="home-facility-image">
<div class="home-facility-item faq-block-image pb-30">
<img src="assets/images/contact-comment.png" alt="comment">
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-7">
<div class="home-facility-item pb-30">
<div class="blog-comment-leave-area contact-comment-leave-area">
<h3 class="sub-section-title">Leave a message</h3>
<div class="blog-comment-input-area mt-40">
<form id="contactForm">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-user"></i></span>
</div>
<input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name*" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
 <span class="input-group-text"><i class="flaticon-user"></i></span>
</div>
<input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email*" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-book"></i></span>
</div>
<input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject*" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-email"></i></span>
</div>
<textarea name="message" class="form-control" id="message" rows="5" required data-error="Write your message" placeholder="Your Message*"></textarea>
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<button class="btn1 orange-gradient btn-with-image" type="submit">
<i class="flaticon-login"></i>
 <i class="flaticon-login"></i>
Send A Message
</button>
<div id="msgSubmit"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<?php

include("quick-account-creation.php") ;

include("footer.php") ;

?>