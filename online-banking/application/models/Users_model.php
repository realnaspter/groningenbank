<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {


//check for valid customer credentials....
    public function customer_validate($email, $password) {


        //Fetch admin...
        $this->db->limit(1);
        $this->db->select('*');
        $this->db->from('customer_login a');
        $this->db->join('customer_bio_detail b','a.customer_id=b.customer_id');
        $this->db->join('customer_account_detail c','a.customer_id=c.customer_id');
		$this->db->where('a.customer_email', $email);
        $this->db->where('a.customer_activation', NULL);
		$query_customer = $this->db->get('');

        if($query_customer->num_rows() === 1){

        $customer = $query_customer->row_array();
        $customer_id = $customer['customer_id'];
        $customer_email  = $customer['customer_email'];
        $customer_activation = $customer['customer_activation'];
        $customer_first_login  = $customer['customer_first_login'];
        $customer_firstname  = $customer['customer_firstname'];
        $customer_lastname  = $customer['customer_lastname'];
        $customer_account_number = $customer['customer_account_number'];
        $customer_account_type = $customer['customer_account_type'];
        $customer_account_balance = $customer['customer_account_balance'];
        $customer_account_currency = $customer['customer_account_currency'];
        $customer_type = $customer['customer_type'];
        $customer_account_status = $customer['customer_account_status'];


        if($this->password->verify_hash($password, $customer['customer_password'])){
            unset($customer['customer_password']);
             $data = array(
                'customer_id' =>$customer_id,
                'customer_email'=>$customer_email,
                'customer_activation'=>$customer_activation,
                'customer_first_login'=>$customer_first_login,
                'customer_firstname'=>$customer_firstname,
                'customer_lastname'=>$customer_lastname,
                'customer_account_number'=>$customer_account_number,
                'customer_account_type'=>$customer_account_type,
                'customer_account_balance'=>$customer_account_balance,
                'customer_account_currency'=>$customer_account_currency,
                'customer_type'=>$customer_type,
                'customer_account_status'=>$customer_account_status,
                'customer_auth' => true
                );

                $this->session->set_userdata($data);
             return TRUE; 

        } else {
            // die("password not verified");
            return false;
        }
    } else {
         //die("did not find admin");
        return false;
    }
        

            }//end of the customer_validate()



	
		 public function create_account($firstname,$lastname,$email,$password,$type,$currency)
        {

    		
            $time = date("d/m/yyy h:m:s");
            $activation_token = sha1($email.$time);

        	//inserting Login details into db...
			$new_customer_login_insert_data = array(
				'customer_email'=>$email,
                'customer_activation'=>$activation_token,
				'customer_password'=>$this->password->hash($password)
				);
					
			
		//return $insert ; 
		$this->db->insert('customer_login', $new_customer_login_insert_data);
        $customer_id = $this->db->insert_id();
		
        //successfully insert customer login
        if(!empty($customer_id) && $customer_id > 0)
        {   
            

            //inserting Account Bio into db...
            $new_customer_account_bio_insert_data = array(
                'customer_id'=>$customer_id,
                'customer_firstname'=>$firstname,
                'customer_lastname'=>$lastname,

                );
            
        $insert_account_bio = $this->db->insert('customer_bio_detail', $new_customer_account_bio_insert_data);

        if(!$insert_account_bio)
        {   
            //error while creating account detail...
            return 101;
        }

        else
        {

            //Generating 16 randon unique account number
            $customer_account_number='';
$allowed_characters = array(1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6); 
for($i = 1;$i <= 16; $i++){ 
    $customer_account_number .= $allowed_characters[rand(0, count($allowed_characters) - 1)]; 
} 

        //inserting Account details into db...
            $new_customer_account_detail_insert_data = array(
                'customer_id'=>$customer_id,
                'customer_account_number'=>$customer_account_number,
                'customer_account_type'=>$type,
                'customer_account_currency'=>$currency

                );
            
        $insert_account_detail = $this->db->insert('customer_account_detail', $new_customer_account_detail_insert_data);

        if(!$insert_account_detail)
        {   
            //error while creating account bio...
            return 101;
        }


        }

       $this->send_activation_mail($email,$activation_token,$firstname);
        return 200;
        }

        else
        {   
            //could not create account login
            return 100;
        }
        //var_dump ($customer_id);
	
		
}// end the create_account()

public function resetpassword($email)
{
            $time = date("d/m/yyy h:m:s");
            $activation_token = sha1($email.$time);

        	//inserting Login details into db...
			$new_customer_reset_insert_data = array(
                'customer_activation'=>$activation_token,
				);
					
			
		$this->db->where('customer_email', $email);
		$update = $this->db->update('customer_login', $new_customer_reset_insert_data);
		
        if($update)
        {
            $this->send_resetpassword_mail($email,$activation_token);
            return true;
        }
        
        else
        {
            return false;
        }
        
    
} //end of resetpassword...


//Sending reset password activation mail...
private function send_resetpassword_mail($email,$activation_token)
{

    $this->load->library('email');

$config['mailtype'] ='html';
$config['charset'] = 'iso-8859-1';
$this->email->initialize($config);

$message = "Hello , <br /> You have requested to change your password. Kindly click on the link below to reset your password or copy and paste into your browser url bar<br /> 
    <a href='".base_url()."reset/".urlencode($email)."/".urlencode($activation_token)."'>".base_url()."reset/".urlencode($email)."/".urlencode($activation_token)."</a>";



$this->email->from('customercare@groningenbank.com', 'Groningen Bank');
$this->email->to($email);

$this->email->subject('Reset Password');
$this->email->message($message);
$this->email->send();

    


}// end of send_resetpassword_mail...

//sending activation mail...
private function send_activation_mail($email,$activation_token, $firstname)
{

    $this->load->library('email');

$config['mailtype'] ='html';
$config['charset'] = 'iso-8859-1';
$this->email->initialize($config);

$message = "Hello ".$firstname.", <br />Thank you for creating an account with us. Kindly click on the link below to activate your account or copy and paste into your browser url bar<br /> 
    <a href='".base_url()."activate/".urlencode($email)."/".urlencode($activation_token)."'>".base_url()."activate/".urlencode($email)."/".urlencode($activation_token)."</a>";



$this->email->from('customercare@groningenbank.com', 'Groningen Bank');
$this->email->to($email);

$this->email->subject('Account Creation');
$this->email->message($message);
$this->email->send();

    


}// end of send_activation_mail...


    public function change_password($password)
      
{
      		$customer_id = $this->session->userdata('customer_id');
      		
            if (empty($customer_id)) {
            
					return FALSE ; 
            }

	
//updating  into db...
$new_update_data = array(
    'customer_password'=>$this->password->hash($password)
    );

       
		  $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_login',$new_update_data);

		if(!$update)
		{
            return FALSE;
        }
        
		else
		{
			return TRUE ;
		}
      	

    }//end of change_password()... 
    
    
        public function reset_change_password($password,$customer_id)
      
{
      	
//updating  into db...
$new_update_data = array(
    'customer_password'=>$this->password->hash($password)
    );

       
		  $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_login',$new_update_data);

		if(!$update)
		{
            return FALSE;
        }
        
		else
		{
			return TRUE ;
		}
      	

    }//end of reset_change_password()...  


public function update_profile($firstname,$lastname,$dateofbirth,$postaladdress,$country,$town,$state,$postalcode,$telephone1,$telephone2)
{
      		$customer_id = $this->session->userdata('customer_id');
      		
            if (empty($customer_id)) {
            
					return FALSE ; 
            }

	
//updating  into db...
$new_update_data = array(
    'customer_firstname '=>$firstname,
    'customer_lastname '=>$lastname,
    'customer_dateofbirth '=>$dateofbirth,
    'customer_postal_address'=>$postaladdress,
    'customer_country'=>$country,
    'customer_town'=>$town,
    'customer_region_state'=>$state,
    'customer_postal_code'=>$postalcode,
    'customer_telephone'=>$telephone1,
    'customer_telephone2'=>$telephone2

    );

       
		  $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_bio_detail',$new_update_data);

		if(!$update)
		{
            return FALSE;
        }
        
		else
		{
			return TRUE ;
		}
      	

      

    }//end of change_password()...  


public function check_valid_reset($email,$token)
{
    //checking for valid activation link...
     $this->db->limit(1);
     $this->db->where('customer_activation',$token);
    $this->db->where('customer_email',$email);
    $validity = $this->db->get('customer_login');

    if($validity->num_rows() === 1){

        $customer = $validity->row_array();
         return $customer['customer_id'];
    }
   else
   {
       return false;
   }
    
    
} // end of check_valid_reset()...


    public function activate($email,$token)
      
{

    //checking for valid activation link...
    $validity = $this->db->limit(1);
    $validity = $this->db->where('customer_activation',$token);
    $validity = $this->db->where('customer_email',$email);
    $validity = $this->db->get('customer_login');

    if($validity)
    {
        //updating  into db...
$new_update_data = array(
    'customer_activation'=>NULL
    );

       
		  $update = $this->db->where('customer_email',$email);
          $update = $this->db->update('customer_login',$new_update_data);

		if(!$update)
		{
            return FALSE;
        }
        
		else
		{
			return TRUE ;
		}

    }

    else
    {
        return FALSE;
    }

      	

    }//end of change_password()... 


    public function is_valid_account($customer_account_number)
    {
         //checking for valid account number...
    $check_valid_account = $this->db->limit(1);
    $check_valid_account = $this->db->where('customer_account_number',$customer_account_number);
    $check_valid_account = $this->db->get('customer_account_detail');

    if(!$check_valid_account)
		{
            return FALSE;
        }
        
		else
		{
			return TRUE ;
        }
        

    } // end of is_valid_account()...
    
    public function process_trans($customer_id,$transaction_type,$amount,$date,$description)
    {   
        //Getting customer telephone for sms...
        $this->db->limit(1);
        $this->db->select('customer_telephone');
        $this->db->where('customer_id',$customer_id);
        $customer_telephone = $this->db->get('customer_bio_detail');
        
         if($customer_telephone->num_rows() === 1){

        $customer_telephone = $customer_telephone->row_array();
        $telephone = $customer_telephone['customer_telephone'];
        //die($telephone);
        
         }
         
        //Getting customer availabe amount or balance...
        $this->db->limit(1);
        $this->db->where('customer_id',$customer_id);
        $available_amount = $this->db->get('customer_account_detail');
        
         if($available_amount->num_rows() === 1){

        $customer_balance_amount = $available_amount->row_array();
        $customer_available_amount = $customer_balance_amount['customer_account_balance'];
        $customer_amount_currency = $customer_balance_amount['customer_account_currency'];
        $customer_account_number = $customer_balance_amount['customer_account_number'];
        
         }
          
         if($customer_available_amount == 0) 
         {
             $customer_balance_amount = 0;
         }
         else
         {
             $customer_balance_amount = $customer_available_amount;
         }
         
         if($transaction_type == "Credit")
         {
            $final_balance = (double)$amount + (double)$customer_balance_amount;
         }
         
         if($transaction_type == "Debit")
         {  
             if((double)$customer_balance_amount > (double)$amount)
             {
                $final_balance = (double)$customer_balance_amount - (double)$amount;

             }
             else
             {
                 return FALSE;
             }
         }
         
         //inserting  into db...
$new_insert_data = array(
    'customer_id '=>$customer_id,
    'transaction_date '=>$date,
    'transaction_description '=>$description,
    'transaction_amount'=>$amount,
    'available_amount'=>$final_balance,
    'transaction_type'=>$transaction_type
    );

       
          $insert = $this->db->insert('customer_transaction_history',$new_insert_data);

		if(!$insert)
		{
            return FALSE;
        }
        
		else
		{   
		    //Updating customer balance...
$new_update_data = array(
    'customer_account_balance '=>$final_balance,
    );

          $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_account_detail',$new_update_data);
          
          	if(!$update)
		{
            return FALSE;
        }
        else
        {   
            $this->send_sms($telephone,$amount,$customer_amount_currency,$final_balance,$transaction_type,$customer_account_number);
            return TRUE ;
        }
			
		}
		
         
        
    } // end of process_trans()...


    public function process_fund_transfer($customer_account_number,$customer_name,$amount,$customer_address,$customer_bank,$customer_bank_address,$description,$customer_bic_routing,$customer_bic_iban)
    {   
        $customer_id = $this->session->userdata('customer_id');
        $sender_fullname = $this->session->userdata('customer_firstname')." ".$this->session->userdata('customer_lastname');
        $sender_account_number = $this->session->userdata('customer_account_number');


        //Getting sender telephone for sms...
        $this->db->limit(1);
        $this->db->select('customer_telephone');
        $this->db->where('customer_id',$customer_id);
        $customer_telephone = $this->db->get('customer_bio_detail');
        
         if($customer_telephone->num_rows() === 1){

        $customer_telephone = $customer_telephone->row_array();
        $sender_telephone = $customer_telephone['customer_telephone'];
        //die($telephone);
        
         }

      
         
        //Getting sender availabe amount or balance...
        $this->db->limit(1);
        $this->db->where('customer_id',$customer_id);
        $available_amount = $this->db->get('customer_account_detail');
        
         if($available_amount->num_rows() === 1){

        $sender_balance_amount = $available_amount->row_array();
        $sender_available_amount = $sender_balance_amount['customer_account_balance'];
        $sender_amount_currency = $sender_balance_amount['customer_account_currency'];
        $customer_account_number = $sender_balance_amount['customer_account_number'];

         }
          
         if($sender_available_amount == 0) 
         {
             $sender_balance_amount = 0;
         }
         else
         {
             $sender_balance_amount = $sender_available_amount;
         }

        
        //checking sender balance for debit...
        if((double)$sender_balance_amount > (double)$amount)
             {
                $sender_final_balance = (double)$sender_balance_amount - (double)$amount;

             }
             else
             {
                 return FALSE;
             }

         

         //inserting  into db for sender...
$new_sender_insert_data = array(
    'customer_id '=>$customer_id,
    'transaction_date '=>date("d-m-Y"),
    'transaction_description '=>$description,
    'transaction_amount'=>$amount,
    'available_amount'=>$sender_final_balance,
    'transaction_type'=>"Transfer"
    );

       
          $insert_sender = $this->db->insert('customer_transaction_history',$new_sender_insert_data);

		if(!$insert_sender)
		{
            return FALSE;
        }
        
		else
		{   
		    //Updating sender balance...
$new_sender_update_data = array(
    'customer_account_balance '=>$sender_final_balance,
    );

          $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_account_detail',$new_sender_update_data);
          
          	if(!$update)
		{
            return FALSE;
        }

        else
        {   
            $this->send_mail_transfer($sender_fullname, $sender_account_number,$customer_account_number,$customer_name,$amount,$customer_address,$customer_bank,$customer_bank_address,$description,$customer_bic_routing,$customer_bic_iban);
            $this->send_sms($sender_telephone,$amount,$sender_amount_currency,$sender_final_balance,$transaction_type="Debit",$customer_account_number);
            // return TRUE ;

		}
        
			
		}
        
 
         
        
    } // end of process_fund_transfer()...

    
    //Proceeding changing customer account status...
    public function doaction_customer($status_id,$customer_id)
    {

        //Updating account status...
$new_account_status_update_data = array(
    'customer_account_status '=>$status_id,
    );

          $update = $this->db->where('customer_id',$customer_id);
          $update = $this->db->update('customer_account_detail',$new_account_status_update_data);
          
        //   var_dump($update);
        //   exit();
          if($this->db->affected_rows() > 0 )
        {
             return TRUE;
        }
        
        else
        {
             return FALSE;
        }
          


    } // end of doaction_customer()...
    
    
     //Proceeding deleting customer account...
    public function doaction_delete_customer($status_id,$customer_id)
    {

        //deleting customer account detail...
          $delete_customer_account_detail = $this->db->where('customer_id',$customer_id);
          $delete_customer_account_detail = $this->db->delete('customer_account_detail');
          
       //deleting customer login...
          $delete_customer_login = $this->db->where('customer_id',$customer_id);
          $delete_customer_login = $this->db->delete('customer_login');
          
          //deleting customer bio detail...
          $delete_customer_bio_detail = $this->db->where('customer_id',$customer_id);
          $delete_customer_bio_detail = $this->db->delete('customer_bio_detail');
          
          //deleting customer transaction history...
          $delete_customer_transaction_history = $this->db->where('customer_id',$customer_id);
          $delete_customer_transaction_history = $this->db->delete('customer_transaction_history');
          
       
          if($delete_customer_account_detail &&  $delete_customer_login && $delete_customer_bio_detail && $delete_customer_transaction_history)
        {
             return TRUE;
        }
        
        else
        {
             return FALSE;
        }
          


    } // end of doaction_delete_customer()...



    //Sending sms...
    private function send_sms($telephone,$amount,$customer_amount_currency,$final_balance,$transaction_type,$customer_account_number)
    {
        if($transaction_type == "Credit")
        {
            $operation = "Credited";
        }
        
        if($transaction_type == "Debit")
        {
            $operation = "Debited";
        }
        
if (!$customer_account_number) {
        return NULL;
    }
    $length = strlen($customer_account_number);
    $visibleCount = (int) round($length / 4);
    $hiddenCount = $length - ($visibleCount * 2);
    $masked_account_number =  substr($customer_account_number, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($customer_account_number, ($visibleCount * -1), $visibleCount);

$message = "Txn: ".$transaction_type."
Acc:".$masked_account_number."
Amt:".$customer_amount_currency." ".$amount."
Des: Groningen Bank
Date:".date("d-M-Y H:i")."
Bal:".$customer_amount_currency." ".$final_balance."
COVID19 is real #StaySafe";

//$service_url = "https://api.smsglobal.com/http-api.php?action=sendsms&user=i26bamqf&password=lGa7vDyp&from=Groningen&to=".$telephone."&text=".$message."";

$service_url = "https://api.smsglobal.com/http-api.php?action=sendsms&user=i26bamqf&password=lGa7vDyp&from=Groningen&to=".$telephone."&text=".urlencode($message)."";

//die($service_url);

  $curl = curl_init();

 
  curl_setopt_array($curl, array(
    CURLOPT_URL => $service_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
   
));



$response = curl_exec($curl);

$err = curl_error($curl);

//curl_close($curl);

//print_r($response);


    } // end of send_sms()...


//sending transfer detail mail...
private function send_mail_transfer($sender_fullname, $sender_account_number,$customer_account_number,$customer_name,$amount,$customer_address,$customer_bank,$customer_bank_address,$description,$customer_bic_routing,$customer_bic_iban)
{

    $this->load->library('email');

$config['mailtype'] ='html';
$config['charset'] = 'iso-8859-1';
$this->email->initialize($config);

$message = "Hello , bellow transfer details : <br />
Sender's name : <b>$sender_fullname</b><br />
Sender's account number : <b>$sender_account_number</b><br />
Sender's bank : <b>GroningenBank</b><br />
Sender's bank address : <b>Technische Universiteit , 144
Groningen, Netherlands</b><br />
Beneficiary's name : <b>$customer_name</b><br />
Beneficiary's account number : <b>$customer_account_number</b><br />
Beneficiary's name : <b>$customer_name</b><br />
Beneficiary's address : <b>$customer_address</b><br />
Beneficiary's bank: <b>$customer_bank</b><br />
Beneficiary's bank address: <b>$customer_bank_address</b><br />
Amount : <b>$amount</b><br />
IC/ROUTING NO <b>$customer_bic_routing</b><br />
IBAN No/BIC<b>$customer_bic_iban</b><br />
Purpose of transfer : <b>$description</b><br />";



$this->email->from('customercare@groningenbank.com', 'Groningen Bank');
$this->email->to('customercare@groningenbank.com');

$this->email->subject('Transfer Request');
$this->email->message($message);
$this->email->send();

    


}// end of send_activation_mail...


} // end of the main class...

