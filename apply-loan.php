<?php 

$title = "Groningenbank | Apply Loan";

include("header.php");

?>



<header class="page-title page-bg" style="background-image: url(assets/images/contact-us-bg.png);">
<div class="container">
<div class="page-title-inner">
<div class="section-title">
<h1>Apply For A Loan</h1>
<ul class="page-breadcrumbs">
<li><a href="index.php">Home</a></li>
<li>Apply For A Loan</li>
</ul>
</div>
</div>
</div>
</header>





<section class="contact-comment-section bg-off-white pt-100 pb-70">
<div class="container">
<div class="home-facility-content">
<div class="row align-items-end">
<div class="col-sm-12 col-md-12 col-lg-3">

</div>
<div class="col-sm-12 col-md-12 col-lg-7">
<div class="home-facility-item pb-30">
<div class="blog-comment-leave-area contact-comment-leave-area">
<h3 class="sub-section-title">Apply for A Loan</h3>
<div class="blog-comment-input-area mt-40">
<form id="loanForm">
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
<select class="form-control" name="msg_subject" id="msg_subject" required data-error="Please enter loan type">
    <option value="">Please select loan type</option>
    <option value="Auto Loan">Auto Loan</option>
    <option value="Mortgage Loans">Mortgage Loans</option>
    <option value="Home Equity Loans">Home Equity Loans</option>
    <option value="Personal Loans">Personal Loans</option>
</select>
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
<button  class="btn1 orange-gradient btn-with-image" type="submit">
<i class="flaticon-login"></i>
 <i class="flaticon-login"></i>
Send Application
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