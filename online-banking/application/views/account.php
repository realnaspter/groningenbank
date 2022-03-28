    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-account_balance_wallet text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center" >
                                <p style="font-size:40px;">Account Summary</p>
                                <?php 

                                // if($this->session->userdata('customer_account_status') == 1)
                                // {
                                //     echo'<p style="color:green;font-size:30px;font-weight:bold;"><i class="icon icon-check"></i> Active</p>
                                //     ';
                                // }

                                if($this->session->userdata('customer_account_status') == 2)
                                {
                                    echo'<p style="color:red;font-size:30px;font-weight:bold;"><i class="icon icon-exclamation"></i> Disactivated</p>
                                    ';
                                }

                                if($this->session->userdata('customer_account_status') == 3)
                                {
                                    echo'<p style="color:orange;font-size:30px;font-weight:bold;"><i class="icon icon-warning"></i> Onhold</p>
                                    ';
                                }


                                ?>
                                <br /><br />
                                <p style="font-size:20px;">
                               <b> Account Name : </b><?php if(isset($customer_fullname)) echo $customer_fullname; ?> <br />
                               <b>Account Number : </b><?php if(isset($customer_account_number)) echo $customer_account_number; ?> <br />
                               <b>Account Type : </b><?php if(isset($customer_account_type)) echo $customer_account_type; ?><br />
                               <b>Account Balance : </b><?php if(isset($customer_account_balance)) echo $customer_account_balance; ?><br />
                               <b>Account Currency : </b> <?php if(isset($customer_account_currency)) echo $customer_account_currency; ?></p>
                            
                            </div>
                                
                            </div>
                           
                        </div>

                        
           
        </div>
    </div>
</div>
