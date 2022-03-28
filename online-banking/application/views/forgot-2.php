<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Groningen Loans , Personal & Business Bank">
<meta name="keywords" content="Loans , Personal Banking, Business Banking">
<meta name="author" content="Groningenbank">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Groningenbank | Online Banking | Forgot Password</title>
<link rel="icon" href="../assets/images/tab.png" type="image/png" sizes="16x16">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/meanmenu.min.css" type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/magnific-popup.min.css" type="text/css" media="all" />

<link rel='stylesheet' href='../assets/css/boxicons.min.css' type="text/css" media="all" />

<link rel='stylesheet' href='../assets/css/line-awesome.min.css' type="text/css" media="all" />

<link rel='stylesheet' href='../assets/css/flaticon.css' type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" />

<link rel="stylesheet" href="../assets/css/responsive.css" type="text/css" media="all" />
<!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>

<div class="preloader orange-gradient">
<div class="preloader-wrapper">
<div class="preloader-grid">
<div class="preloader-grid-item preloader-grid-item-1"></div>
<div class="preloader-grid-item preloader-grid-item-2"></div>
<div class="preloader-grid-item preloader-grid-item-3"></div>
<div class="preloader-grid-item preloader-grid-item-4"></div>
<div class="preloader-grid-item preloader-grid-item-5"></div>
<div class="preloader-grid-item preloader-grid-item-6"></div>
<div class="preloader-grid-item preloader-grid-item-7"></div>
<div class="preloader-grid-item preloader-grid-item-8"></div>
<div class="preloader-grid-item preloader-grid-item-9"></div>
</div>
</div>
</div>


<div class="authentication-section">
<div class="authentication-grid">
<div class="authentication-item authentication-img-bg"></div>
<div class="authentication-item bg-white pl-15 pr-15">
<div class="authentication-user-panel">
<div class="authentication-user-header">
<a href="../index.php"><img src="../assets/images/logo.png" alt="logo"></a>
<h1>ONLINE BANKING</h1>
 <?php 
                if (isset($message))
                {
                     echo $message;
                }
                ?>       
</div>
<div class="authentication-user-body">

<div class="authentication-tab-details">
<div class="authentication-tab-details-item authentication-tab-details-active" data-authentcation-details="1">
<div class="authentication-form">
<form action="<?php echo base_url() ?>doforgot" method="POST">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="form-group mb-15">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-email"></i></span>
</div>
<input type="text" name="email" class="form-control" placeholder="Email Address *" required />
</div>
</div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12">
<div class="form-group mb-15">
<div class="input-group">

  <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 

                                 </div>
</div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12">
<button class="btn1 orange-gradient full-width">Reset Password</button>
</div>
</div>
<div class="authentication-account-access mt-20">

<div class="authentication-account-access-item">
<div class="authentication-link">
<a href="<?php echo base_url() ?>login">Back to login</a>
</div>
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
</div>


<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/jquery.magnific-popup.min.js"></script>

<script src="../assets/js/owl.carousel.min.js"></script>

<script src="../assets/js/jquery.ajaxchimp.min.js"></script>

<script src="../assets/js/form-validator.min.js"></script>

<script src="../assets/js/contact-form-script.js"></script>

<script src="../assets/js/jquery.meanmenu.min.js"></script>

<script src="../assets/js/jquery.waypoints.js"></script>

<script src="../assets/js/counter-up.js"></script>

<script src="../assets/js/script.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>