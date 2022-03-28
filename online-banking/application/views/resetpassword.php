<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>template/assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Reset Password - Eindhovenbank</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/assets/css/app.css">
     <link rel="stylesheet" href="<?php echo base_url() ?>template/assets/css/custom.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
        body{
            /*background: url('<?php echo base_url() ?>template/assets/img/banking-banner3.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;*/
        }

        .height-full {
            background: url('<?php echo base_url() ?>template/assets/img/background-2.jpg') !important;
            background-repeat: no-repeat !important;
             background-size: cover !important;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto paper-card">
                    <div class="text-center">
                        <img src="<?php echo base_url() ?>template/assets/img/dummy/u4.png" alt="">
                        <h3 class="mt-2">Online Banking</h3>
                        <p class="p-t-b-20">Reset your password</p>
                    </div>
                    <form action="<?php echo base_url() ?>dochange" method="POST">
                       
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="New Password">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="confirmpassword" class="form-control form-control-lg"
                                   placeholder="Confirm Password">
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Change Password">
                        <input type="hidden" name="customer_id" value="<?php if(isset($customer_id)) echo $customer_id; ?>"
                        <p class="forget-pass">Back to  <a href="<?php echo base_url() ?>login">Login</a>     </p>  
                                         
                    </form>
                    <?php 
                if (isset($login_failed))
                {
                     echo $login_failed;
                }
                ?>    
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url() ?>template/assets/js/app.js"></script>
</body>
</html>