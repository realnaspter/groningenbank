<div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-bank text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center" id="transfer_section">
                                <p style="font-size:25px;font-weight:bold;">Fund Transfer</p>
                               <div class="row">
                                <div id="results_message">
                                     <?php 
               if (isset($message))
               {
                    echo $message;
               }
               ?>    
               </div>
                    <div id="progress-div" style="display:none"><div id="progress-bar"></div></div>
<div id="targetLayer"></div>
                               <form id="transfer_form" action="<?php echo base_url() ?>dotransfer" method="POST">
                       <div class="row text-center">
                        <div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-user"></i></span>
</div>
 <input type="text"  placeholder="Beneficiary's account number..." id="customer_account_number" name="customer_account_number" required="required" class="form-control "  />
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
 <input type="text"  placeholder="Beneficiary's name..." name="customer_name" class="form-control " required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-agenda"></i></span>
</div>
 <input type="text" placeholder="Beneficiary's address..." name="customer_address" class="form-control " required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-bank"></i></span>
</div>
 <input type="text" placeholder="Beneficiary's bank..." name="customer_bank" class="form-control " required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>


<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-bank"></i></span>
</div>
 <input type="text" placeholder="Beneficiary's bank address..." name="customer_bank_address" class="form-control " required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-bank"></i></span>
</div>
 <input type="text" placeholder="BIC/ROUTING NO: (for USD transfers)..." name="customer_bic_routing" class="form-control " required="required" />
</div>
<div class="help-block with-errors"></div>
</div>
</div>


<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-bank"></i></span>
</div>
 <input type="text" placeholder="IBAN No/BIC (Mandatory for EURO transfers)..." name="customer_bic_iban" class="form-control " required="required" />
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
 <input type="text" placeholder="Amount" name="amount" class="form-control " required="required" />
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
 <textarea class="form-control " name="description" placeholder="Purpose of Transfer..." cols="5" cols="3"></textarea>
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">

<input type="submit" class="btn1 orange-gradient btn-with-image disabled" value="Transfer">
<div id="msgSubmit"></div>
<div class="clearfix"></div>

</div>


                         
                   </form>

                          </div>
                            
                            </div>
                                
                            </div>
                           
                        </div>

                        
           
        </div>
    </div>
</div>
