    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-bank text-light-blue s-48"></span>
                                </div>
               
                                
                            </div>
                           
                        </div>
     
                        <div class="home-facility-item pb-30">
<div class="blog-comment-leave-area contact-comment-leave-area">
    <?php 
               if (isset($message))
               {
                    echo $message;
               }
               ?>
<h3 class="sub-section-title">Operation</h3>
<div class="blog-comment-input-area mt-40">
 <form action="<?php echo base_url() ?>dooperation" method="POST">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30 has-error">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-user"></i></span>
</div>
 <select name="customer" class="form-control">
                              <option value="">Select Customer</option>
                       <?php 

foreach($customer_bio_data->result() as $customer){

    $customer_id = $customer->customer_id;
    $customer_firstname  = $customer->customer_firstname;
    $customer_lastname  = $customer->customer_lastname;
    echo '<option value="'.$customer_id.'">'.$customer_firstname.' '.$customer_lastname.'</option>';
}

                       ?>
                           </select>
</div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
 <span class="input-group-text"><i class="icon-bank"></i></span>
</div>
<select name="transaction_type" class="form-control">
                              <option value="">Select transaction type</option>
                              <option value="Credit">Credit</option>
                              <option value="Debit">Debit</option>
                              </select>
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-money"></i></span>
</div>
 <input type="text" name="amount" class="form-control" placeholder="Enter amount" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-calendar"></i></span>
</div>
<input type="text"  placeholder="select date" name="date" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;d-m-Y&quot;}">
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
 <textarea class="form-control" name="description" placeholder="enter description.." cols="5" cols="3"></textarea>
</div>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">

<input type="submit" class="btn1 orange-gradient btn-with-image disabled" value="Proceed">
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
