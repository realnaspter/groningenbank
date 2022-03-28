    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-poll text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center" style="font-size:25px;font-weight:bold;">
                               Transaction History
                            
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
                                <h4 class="card-title">Transactions</h4>
                                
                            </div>
                            <div class="collapse show" id="salesCard">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light">
                                            <tr>
                                                <th>Date</th>
                                                <th colspan="2">Description</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
    if (isset($transactions))

    foreach ($transactions->result() as $row) {
        $date = $row->transaction_date;
        $description = $row->transaction_description;
        $amount = $row->transaction_amount;
        $balance = $row->available_amount;
        $type = $row->transaction_type;
        //$balance = $customer_account_balance;
        $convert_amount = $amount;
        $convert_amount = floatval($convert_amount);
        // echo number_format($convert_amount, 2, '.', '');

        $convert_balance = $balance;
        $convert_balance = floatval($convert_balance);
        echo" <tr>
        <td>
        $date
        </td>
        <td>
        $description
        </td>
        <td></td>
        <td>".number_format($convert_amount, 2, '.', '')."</td>
        <td>$type</td>
        <td>".number_format($convert_balance, 2, '.', '')."</td>
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
