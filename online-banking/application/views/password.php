    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-lock text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center">
                                <p style="font-size:25px;font-weight:bold;">Change Password</p>
                               <div class="row">
                               <form action="<?php echo base_url() ?>dochange" method="POST">
                       <div class="row text-center">
                          
                                  <div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-lock"></i></span>
</div>
 <input type="password" placeholder="Password" name="password" class="form-control" required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>


                                  <div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-lock"></i></span>
</div>
 <input type="password" placeholder="Confirm New Password" name="confirmpassword" class="form-control" required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

                            <div class="col-sm-12 col-md-12 col-lg-12">

<input type="submit" class="btn1 orange-gradient btn-with-image disabled" value="Change Password">
<div id="msgSubmit"></div>
<div class="clearfix"></div>
</div>

                      
                   </form>

                    <?php 
               if (isset($message))
               {
                    echo $message;
               }
               ?>    
                               </div>
                            
                            </div>
                                
                            </div>
                           
                        </div>

                        
           
        </div>
    </div>
</div>
