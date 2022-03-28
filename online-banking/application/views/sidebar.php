  <aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class=" mt-3 mb-3 ml-3">
            <img src="<?php echo base_url() ?>template/assets/img/logo-large-white.png" />
        </div>
        <div class="relative">
            
            <div class="user-panel p-3  mb-2">
                <div>
                   
                    <div class="float-left info">
                        <h5 class="font-weight-light mt-2 mb-1" style="color:#FFF">
                        <?php
                        if(isset($customer_fullname)) 
                        {
                            echo $customer_fullname;
                        }

                        ?>
                       
                        </h5>

                        <h6 class="font-weight-light mt-2 mb-1" style="color:#212529">
                       
                        <?php
                       
                        if(isset($customer_account_number)) 
                        {
                            echo $customer_account_number;
                        }

                        ?>
                       
                        </h6>
                       
                    </div>
                </div>
                <div class="clearfix"></div>
               
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong style="color:#fff">MAIN NAVIGATION</strong></li>
            <li><a href="<?php echo base_url() ?>dashboard"><i class="icon  icon-home"></i>Home</a>
            <?php
                       $customer_type = $this->session->userdata('customer_type');
                        if(isset($customer_type)) 
                        {
                            if($customer_type == "admin")
                            {
                                echo'<li><a href="'.base_url().'operation"><i class="icon  icon-bank"></i>Operation</a>
                                    </li>';
                                    echo'<li><a href="'.base_url().'customers"><i class="icon  icon-users"></i>Customers</a>
                                    </li>';
                            }
                        }

                        ?>
            <li><a href="<?php echo base_url() ?>transactions"><i class="icon  icon-poll"></i>Transaction History</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>transfer"><i class="icon icon-bank"></i>Fund Transfer</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>account"><i class="icon  icon-account_balance_wallet"></i>Account Summary</a>
                    </li>
                  
            <li class="treeview"><a href="#">
                <i class="icon icon-cogs"></i> <span>Settings</span> <i
                    class="icon icon-angle-left s-18 pull-right"></i>
            </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>profile"><i class="icon icon-person"></i>Profile</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>password"><i class="icon icon-lock"></i>Change Password</a>
                    </li>
                    </li>
                    
                </ul>
            </li>
            <li><a href="<?php echo base_url() ?>logout"><i class="icon icon-sign-out"></i>Log Out</a>
                    </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->