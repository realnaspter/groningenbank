    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-users text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center" style="font-size:25px;font-weight:bold;">
                               Customers
                            
                            </div>
                                
                            </div>
                           
                        </div>

                        <div class="col-md-12">
                        <div class="card my-3 no-b">
                            <div class="card-header white b-0 p-3">
                                <div class="card-handle">
                                    <a data-toggle="collapse" href="#salesCard" aria-expanded="false" aria-controls="salesCard">
                                        <i class="icon-menu"></i>
                                    </a>
                                </div>
                                <h4 class="card-title" id="output_result">Customers
                                
                                </h4>
                                
                            </div>
                            <div class="collapse show" id="salesCard">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light">
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Account</th>
                                                <th>Type</th>
                                                <th>Balance</th>
                                                <th>Currency</th>
                                                <th>Status</th>
                                                <th>Option</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
    if (isset($customers))

    foreach ($customers->result() as $row) {
        
        $customer_id = $row->customer_id;
        $fullname = $row->customer_firstname." ".$row->customer_lastname;
        $account_number = $row->customer_account_number;
        $type = $row->customer_account_type;
        $balance = $row->customer_account_balance;
        $currency = $row->customer_account_currency;
        $status = $row->customer_account_status;
        if($status == 1)
        {
            $status = "Active";
        }

        if($status == 2)
        {
            $status = "Deactivate";
        }

        if($status == 3)
        {
            $status = "Onhold";
        }
       
        echo" <tr>
        <td>
        $fullname
        </td>
        <td>
        $account_number
        </td>
        <td>$type</td>
        <td>$balance</td>
        <td>$currency</td>
        <td>$status</td>
        <td id='option'><button onclick='do_action(1,$customer_id)' id='btnaction' data-customer='$customer_id' data-action='1' class='btnaction btn btn-sm btn-xs btn-success' >Activate</button></td>
        <td><button onclick='do_action(2,$customer_id)' data-customer='$customer_id' data-action='2'  class='btnaction btn btn-sm btn-xs btn-danger' >Deactivate</button></td>
        <td><button onclick='do_action(3,$customer_id)' data-customer='$customer_id' data-action='3' class='btnaction btn btn-sm btn-xs btn-warning' >onhold</button></td>
        <td><button onclick='do_action(4,$customer_id)' data-customer='$customer_id' data-action='4' class='btnaction btn btn-sm btn-xs btn-primary' >Delete</button></td>
    </tr>";
    }
?>
                                           
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php 
 echo $this->pagination->create_links();
    echo'</div>'; 
    ?>
                                </div>
                            </div>

           
        </div>
    </div>
</div>

