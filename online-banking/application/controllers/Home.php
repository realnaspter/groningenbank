<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{	
		//die(date('d/m/Y h:m:s'));
		//$this->load->view('welcome_message');
		//die($this->password->hash('123456789'));
		$this->dashboard();

	} // end of index...


	public function login()
	{

		  if($this->session->userdata('customer_auth'))
    {
		$this->dashboard();
     
    
    }
    else
    {
		$this->load->view('login-2');
    }

	} // end of login...


	public function create()
	{
        
        //die();
		$this->load->view('register-2');

	} // end of create...

	public function forgot()
	{

		$this->load->view('forgot-2');

	} // end of forgot...

	public function doforgot()
	{
        $email = $this->input->post('email');
        
        if (empty($email))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No email supplied</h4>";
				$data['title'] = 'Forgot Password | Groningenbank';
            	$this->load->view('forgot-2', $data);
				return false;
			}

			if (!valid_email($email))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No valid email supplied</h4>";
				$data['title'] = 'Forgot Password | Groningenbank';
            	$this->load->view('forgot-2', $data);
				return false;
			}
			
    
    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if (!$status['success']) {
            //print_r('Google Recaptcha Successful');
            //exit;
            
            	$data['message'] = "<h4 style='color:#ef0f07;'>Invalid request. Kindly tick the Recaptcha box</h4>";
				$data['title'] = 'Forgot Password | Groningenbank';
            	$this->load->view('forgot-2', $data);
				return false;
				
        }

		$query = $this->Users_model->resetpassword($email);
		
		if($query)
		{
		    $data['message'] = "<h4 style='color:green;'>An email has been sent to ".$email." to reset your password</h4>";
			  $this->load->view('success',$data);
		}
		
		else
		{
		    $data['message'] = "<h4 style='color:#ef0f07;'>An error occur while sending reset password link</h4>";
		    $data['title'] = 'Forgot Password | Groningenbank';
            	$this->load->view('forgot-2', $data);
				return false;
		}

	} // end of doforgot...



	public function docreate()
	{

		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$currency = $this->input->post('currency');
		$type = $this->input->post('type');
    		

    		
			if (empty($firstname))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No firstname supplied</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if (empty($lastname))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No lastname supplied</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if (empty($email))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No email supplied</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if (!valid_email($email))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No valid email supplied</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			

			if (empty($password))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No password supplied</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if ($password == '123456789')
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>Password not secure. Please change it !</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if(strlen($password) < 9)
			{
				$data['message'] = "<h4 style='color:#ef9a07;'>Password must be at least 9 characteres</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if (empty($currency))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No currency selected</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			$valid_currency = array('Euro','USD');

			if(!in_array($currency, $valid_currency))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>Invalid currency selected</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			if (empty($type))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>No account type selected</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}

			$valid_account_type = array('Savings','Current','Business','Corporate','International');

			if(!in_array($type, $valid_account_type))
			{
				$data['message'] = "<h4 style='color:#ef0f07;'>Invalid account type selected</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
			}



			 //checking if email exist...
			$this->db->where('customer_email',$email);
			$result = $this->db->get('customer_login');

			if($result->num_rows() > 0 ){
				$data['message'] = "<h4 style='color:#ef9a07;'>Account already created</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				 return FALSE ; // email  exist means account already created				
			}
			
			$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if (!$status['success']) {
            //print_r('Google Recaptcha Successful');
            //exit;
            
            	$data['message'] = "<h4 style='color:#ef0f07;'>Invalid request. Kindly tick the Recaptcha box</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				return false;
				
        }

		else
		{
		  $query = $this->Users_model->create_account($firstname,$lastname,$email,$password,$type,$currency);
		  

		  if($query == 200)
		  {
			  //die("successfully");
			  $data['message'] = "<h4 style='color:green;'>An email has been sent to ".$email." to activate your account</h4>";
			  $this->load->view('success',$data);
		  }

		  if($query == 101)
		  {
		  	$data['message'] = "<h4 style='color:#ef9a07;'>An error occur while creating account</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				 return FALSE ; 
		  }


		  if($query == 100)
		  {
		  	$data['message'] = "<h4 style='color:#ef9a07;'>Could not create account</h4>";
				$data['title'] = 'Create Account | Groningenbank';
            	$this->load->view('register-2', $data);
				 return FALSE ; 
		  }


		}
		

	}// end of docreate...

	public function check()

{   
	

    if($this->session->userdata('customer_auth'))
    {
		$this->dashboard();
     
    
    }

    else
    {

     $email = $this->input->post('email');
    $password = $this->input->post('password');

    if(empty($email))
    {

        $data['login_failed'] = '<div style=color:red>Email field is required !</div>';
            $data['title'] = 'Login | Groningenbank';
            $this->load->view('login-2', $data);
            return false;
    }

     if(!valid_email($email))
    {

        $data['login_failed'] = '<div style=color:red>Email is not valid !</div>';
            $data['title'] = 'Login | Groningenbank';
            $this->load->view('login-2', $data);
            return false;
    }


    if(empty($password))
    {

        $data['login_failed'] = '<div style=color:red>Password field is required !</div>';
            $data['title'] = 'Login | Groningenbank';
            $this->load->view('login-2', $data);
            return false;
    }

    if(strlen($password) > 50)
    {

        $data['login_failed'] = '<div style=color:red>Password must not exceed 50 charateres !</div>';
            $data['title'] = 'Login | Groningenbank';
            $this->load->view('login-2', $data);
            return false;
    }

$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 /*
        if (!$status['success']) {
            //print_r('Google Recaptcha Successful');
            //exit;
            
            	$data['login_failed'] = "<h4 style='color:#ef0f07;'>Invalid request. Kindly tick the Recaptcha box</h4>";
				$data['title'] = 'Login | Groningenbank';
            	$this->load->view('login-2', $data);
				return false;
				
        }
*/
$verify = $this->Users_model->customer_validate($email, $password);
       
    if($verify)
    {   
    	//$data['message'] =('successfully');
        $this->dashboard();
        return false;
       
    }

    else
    {
        $data['login_failed'] = '<div style=color:red>Email /Password is Incorrect or Account not activated !</div>';
            $data['title'] = 'Login | Groningenbank';
            $this->load->view('login-2', $data);
            return false;
    }

    }
    
    //$data['message'] =('hello check');


}// end check()...

public function dashboard()
{

	if($this->session->userdata('customer_auth'))
    {	
		

		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
		//Getting connected customer number...
		$data['customer_account_number'] = $this->session->userdata('customer_account_number');

		//Getting connected customer account type...
		$data['customer_account_type'] = $this->session->userdata('customer_account_type');

		//Getting connected customer account currency...
		$data['customer_account_currency'] = $this->session->userdata('customer_account_currency');

		//Getting connected customer account balance...
		$this->db->limit(1);
		$this->db->where('customer_id',$this->session->userdata('customer_id'));
		$available_amount = $this->db->get('customer_account_detail');
		$available_amount = $available_amount->row_array();
		$customer_balance = $available_amount['customer_account_balance'];
		$data['customer_account_balance'] = $customer_balance;

		//Getting Recent 5 Transactions...
		$data['transactions'] = $this->db->limit(5);
		$data['transactions'] = $this->db->where('customer_id',$this->session->userdata('customer_id'));
    	$data['transactions'] = $this->db->order_by('customer_transaction_historyid','DESC');
        $data['transactions'] = $this->db->get('customer_transaction_history');


		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('dashboard', $data);
	  $this->load->view('footer');
	  
		
    }

    else
    {
    	$this->login();
    }


}//end of dashboard...

public function transfer()
{

	if($this->session->userdata('customer_auth'))
    {   
        
            	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
	
	  //Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transfer', $data);
      $this->load->view('footer');
        
	    
	   
    }

    else
    {
    	$this->login();
    }


}//end of transfer...



public function card()
{

	if($this->session->userdata('customer_auth'))
    {
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	
	  
		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('card');
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of card...

public function password()
{

	if($this->session->userdata('customer_auth'))
    {
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	
	  
		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('password');
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of password...

public function dochange()
{
	$password = $this->input->post('password');
	$confirm_password = $this->input->post('confirmpassword');

	//Getting connected customer fullname...
	$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	//Getting connected customer number...
	$data['customer_account_number'] = $this->session->userdata('customer_account_number');
  
    if(empty($password) || empty($confirm_password))
    {

        $data['message'] = '<div style=color:red>Passwords field are required !</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('password',  $data);
	   $this->load->view('footer');
            return false;
    }

	if($password != $confirm_password)
    {

        $data['message'] = '<div style=color:red>Passwords did not match</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('password',  $data);
	   $this->load->view('footer');
            return false;
	}

	$change_password = $this->Users_model->change_password($password);
	
if($change_password)
{

	$data['message'] = '<div style=color:green>Password Changed Successfully</div>';
	//loading views...
$this->load->view('header');
$this->load->view('sidebar', $data);
$this->load->view('password',  $data);
$this->load->view('footer');
   return false;

}


} // end of dochange...

public function doresetpass()
{
	$password = $this->input->post('password');
	$confirm_password = $this->input->post('confirmpassword');
	$customer_id = $this->input->post('customer_id');

	
  if(empty($customer_id))
  {
       $data['message'] = '<div style=color:red>Invalid parameter supplied !</div>';
             //loading views...
	   $this->load->view('resetpassword',  $data);
            return false;
  }
    if(empty($password) || empty($confirm_password))
    {

        $data['message'] = '<div style=color:red>Passwords field are required !</div>';
             //loading views...
	   $this->load->view('resetpassword',  $data);
            return false;
    }

	if($password != $confirm_password)
    {

        $data['message'] = '<div style=color:red>Passwords did not match</div>';
	  //loading views...
	   $this->load->view('resetpassword',  $data);
            return false;
	}

	$change_password = $this->Users_model->reset_change_password($password, $customer_id);
	
if($change_password)
{

redirect('login');

}


} // end of doresetpass...

public function profile()
{

	if($this->session->userdata('customer_auth'))
    {
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	
	  //Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->where('customer_id',$this->session->userdata('customer_id'));
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('profile', $data);
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of profile...



public function doprofile()
{
	$firstname = $this->input->post('firstname');
	$lastname = $this->input->post('lastname');
	$dateofbirth = $this->input->post('dateofbirth');
	$postaladdress = $this->input->post('postaladdress');
	$country = $this->input->post('country');
	$town = $this->input->post('town');
	$state = $this->input->post('state');
	$postalcode = $this->input->post('postalcode');
	$telephone1 = $this->input->post('telephone1');
	$telephone2 = $this->input->post('telephone2');

	//Getting connected customer fullname...
	$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	//Getting connected customer number...
	$data['customer_account_number'] = $this->session->userdata('customer_account_number');
  
   //Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->where('customer_id',$this->session->userdata('customer_id'));
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');
	  
    if(empty($firstname) || empty($lastname))
    {

        $data['message'] = '<div style=color:red>Firstname and Lastname field are required !</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('profile',  $data);
	   $this->load->view('footer');
            return false;
    }

	if(empty($dateofbirth))
    {

        $data['message'] = '<div style=color:red>Date of Birth field are required !</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('profile',  $data);
	   $this->load->view('footer');
            return false;
	}
	
	if(empty($country))
    {

        $data['message'] = '<div style=color:red>Please select country</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('profile',  $data);
	   $this->load->view('footer');
            return false;
    }

	if(empty($town))
    {

        $data['message'] = '<div style=color:red>Town field required !</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('profile',  $data);
	   $this->load->view('footer');
            return false;
    }

	if(empty($telephone1))
    {

        $data['message'] = '<div style=color:red>Telephone 1 field is required !</div>';
             //loading views...
	   $this->load->view('header');
	   $this->load->view('sidebar', $data);
	   $this->load->view('profile',  $data);
	   $this->load->view('footer');
            return false;
    }



	$update_profile = $this->Users_model->update_profile($firstname,$lastname,$dateofbirth,$postaladdress,$country,$town,$state,$postalcode,$telephone1,$telephone2);
	
if($update_profile)
{

	$data['message'] = '<div style=color:green>Profile Updated Successfully</div>';
	//loading views...
// $this->load->view('header');
// $this->load->view('sidebar', $data);
// $this->load->view('profile',  $data);
// $this->load->view('footer');
//    return false;
	redirect('dashboard');
}


} // end of doprofile...


public function operation()
{

	if($this->session->userdata('customer_auth'))
    {   
        if($this->session->userdata('customer_type') == "admin")
        {
            	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
	
	  //Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('operation', $data);
      $this->load->view('footer');
        }
	    else
	    {
	         redirect('dashboard');
	    }
	   
    }

    else
    {
    	$this->login();
    }


}//end of operation...


public function dooperation()
{

	if($this->session->userdata('customer_auth'))
    {   
        if($this->session->userdata('customer_type') == "admin")
        {
            	
	  
	  //Getting post data...
	  $customer_id = $this->input->post('customer');
	  $transaction_type =  $this->input->post('transaction_type');
	   $amount =  $this->input->post('amount');
	    $date =  $this->input->post('date');
	     $description =  $this->input->post('description');
    
    if(empty($customer_id) || empty($transaction_type) || empty($amount) || empty($date) || empty($description))
    {
        	$data['message'] = '<div style=color:red>All field are required</div>';
        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('operation', $data);
      $this->load->view('footer');
    }
    
    
    
    else
    {
         $query = $this->Users_model->process_trans($customer_id,$transaction_type,$amount,$date,$description);
         
         if($query)
         {
             	$data['message'] = '<div style=color:green>Operation Successful</div>';
        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('operation', $data);
      $this->load->view('footer');
             
         }
         
         else
         {
             	$data['message'] = '<div style=color:red>Error Occur While performing operation</div>';
        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('operation', $data);
      $this->load->view('footer');
         }
    }
   
    
	  
        }
	    else
	    {
	         redirect('dashboard');
	    }
	   
    }

    else
    {
    	$this->login();
    }


}//end of dooperation...


public function dotransfer()
{

	if($this->session->userdata('customer_auth'))
    {   
	   
	  //Getting post data...
	  $customer_account_number = $this->input->post('customer_account_number');
	  $customer_name = $this->input->post('customer_name');
	  $customer_address = $this->input->post('customer_address');
	  $customer_bank = $this->input->post('customer_bank');
	  $customer_bank_address = $this->input->post('customer_bank_address');
	  $customer_bic_routing = $this->input->post('customer_bic_routing');
	  $customer_bic_iban = $this->input->post('customer_bic_iban');
	  $amount =  (double)$this->input->post('amount');
	  $description =  $this->input->post('description');
    
    if(empty($customer_account_number) || empty($customer_name) || empty($amount)  || empty($customer_address) || empty($customer_bank) || empty($customer_bank_address) || empty($description))
    {
			$data['message'] = '<div style=color:red>1.Beneficiarys account number is required.
			<br />2.Beneficiarys name is required <br />3.Beneficiarys address <br />
			4.Beneficiarys bank<br />5.Beneficiarys bank address<br />
			6.Amount is required<br />7.Purpose of transfer is required</div>';

        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transfer', $data);
      $this->load->view('footer');
	}
	
	if(empty($customer_bic_routing) && empty($customer_bic_iban) )
    {
			$data['message'] = '<div style=color:red>IC/ROUTING NO OR IBAN No/BIC is required.</div>';

        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transfer', $data);
      $this->load->view('footer');
    }
    
    
    
    else
    {	

		
			$query = $this->Users_model->process_fund_transfer($customer_account_number,$customer_name,$amount,$customer_address,$customer_bank,$customer_bank_address,$description,$customer_bic_routing,$customer_bic_iban);

         if($query)
         {
             	$data['message'] = '<div style=color:green>Fund transferred successfully</div>';
        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transfer', $data);
      $this->load->view('footer');
             
         }
         
         else
         {
             	$data['message'] = '<div style=color:red>Error Occur While performing transfer</div>';
        	//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
	  //Getting connected customer number...
	  $data['customer_account_number'] = $this->session->userdata('customer_account_number');
	  
        	//Getting customer bio data...
	  $data['customer_bio_data'] = $this->db->limit(25);
	  $data['customer_bio_data'] = $this->db->get('customer_bio_detail');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transfer', $data);
      $this->load->view('footer');
         }
    }
   
    
	  
	   
    }

    else
    {
    	$this->login();
    }


}//end of dotransfer...


public function account()
{

	if($this->session->userdata('customer_auth'))
    {
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
		//Getting connected customer number...
		$data['customer_account_number'] = $this->session->userdata('customer_account_number');

		//Getting connected customer account type...
		$data['customer_account_type'] = $this->session->userdata('customer_account_type');

		//Getting connected customer account currency...
		$data['customer_account_currency'] = $this->session->userdata('customer_account_currency');

		//Getting connected customer account balance...
		$data['customer_account_balance'] = $this->session->userdata('customer_account_balance');

		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('account');
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of account...

public function transactions()
{

	if($this->session->userdata('customer_auth'))
    {	
		
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
		//Getting connected customer fullname...
		$data['customer_account_number'] = $this->session->userdata('customer_account_number');

		//Getting connected customer account type...
		$data['customer_account_type'] = $this->session->userdata('customer_account_type');

		//Getting connected customer account currency...
		$data['customer_account_currency'] = $this->session->userdata('customer_account_currency');

		//Getting connected customer account balance...
		$data['customer_account_balance'] = $this->session->userdata('customer_account_balance');

		
		$config['base_url'] = ''.base_url().'/transactions';
		$config['total_rows'] = $query = $this->db->where('customer_id',$this->session->userdata('customer_id'));
    	$config['total_rows'] = $query = $this->db->order_by('customer_transaction_historyid','DESC');
        $config['total_rows'] = $query = $this->db->get('customer_transaction_history');
        $config['total_rows'] = $query->num_rows();

           // item per page...
        $config['per_page'] = 10 ; 
        //number of links between...
        $config['num_links'] = 5 ; 
        $config['full_tag_open'] = '<div id="pagination" style="text-align:center;">';
        $config['full_tag_close'] = '</div>';   

        //..Initialization of config settings...
        $this->pagination->initialize($config);
		$data['transactions'] = $query2 = $this->db->where('customer_id',$this->session->userdata('customer_id'));
        $data['transactions'] = $query2 = $this->db->order_by('customer_transaction_historyid','DESC');
        $data['transactions'] = $query2 = $this->db->get('customer_transaction_history',$config['per_page'],$this->uri->segment(2));


		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('transactions',$data);
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of transactions...


public function doactivate()
{	
	$email = urldecode($this->uri->segment(2));
	$token = urldecode($this->uri->segment(3));

	if(empty($email) || empty($token))
	{
		redirect('login');
	}

	if(!valid_email($email))
	{
		redirect('login');
	}

	$query = $this->Users_model->activate($email,$token);

	if($query)
	{
		$data['message'] = "<h4 style='color:green;'>Your account has been activated  you may</h4><a href='".base_url()."login'>Login</a>";
			  $this->load->view('success',$data);
	}

	else
	{
		$data['message'] = "<h4 style='color:red;'>Invalid token or Expired</h4>";
			  $this->load->view('success',$data);
	}
	//die($token);

} //end of doactivate...


public function doreset()
{	
	$email = urldecode($this->uri->segment(2));
	$token = urldecode($this->uri->segment(3));

	if(empty($email) || empty($token))
	{
		redirect('login');
	}

	if(!valid_email($email))
	{
		redirect('forgot');
	}

	$customer_id = $this->Users_model->check_valid_reset($email,$token);

	if($customer_id)
	{
		$data['customer_id'] = $customer_id;
		
		$this->load->view('resetpassword',$data);
	}

	else
	{
		$data['message'] = "<h4 style='color:red;'>Invalid token or Expired Link</h4>";
			  $this->load->view('forgot',$data);
	}
	//die($token);

} //end of doreset...


public function customers()
{

	if($this->session->userdata('customer_auth') && $this->session->userdata('customer_type') == "admin")
    {	
		
		//Getting connected customer fullname...
		$data['customer_fullname'] = $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');
		
		//Getting connected customer fullname...
		$data['customer_account_number'] = $this->session->userdata('customer_account_number');

		//Getting connected customer account type...
		$data['customer_account_type'] = $this->session->userdata('customer_account_type');

		//Getting connected customer account currency...
		$data['customer_account_currency'] = $this->session->userdata('customer_account_currency');

		//Getting connected customer account balance...
		$data['customer_account_balance'] = $this->session->userdata('customer_account_balance');

		
		$config['base_url'] = ''.base_url().'/customers';
		$config['total_rows'] = $query = $this->db->select('a.customer_id,a.customer_account_number,a.customer_account_type,a.customer_account_balance ,a.customer_account_currency ,a.customer_account_status,b.customer_firstname,b.customer_lastname');
		$config['total_rows'] = $query = $this->db->from('customer_account_detail a');
		$config['total_rows'] = $query = $this->db->join('customer_bio_detail b','a.customer_id=b.customer_id');
    	$config['total_rows'] = $query = $this->db->order_by('customer_id','DESC');
        $config['total_rows'] = $query = $this->db->get('');
        $config['total_rows'] = $query->num_rows();

           // item per page...
        $config['per_page'] = 10 ; 
        //number of links between...
        $config['num_links'] = 5 ; 
        $config['full_tag_open'] = '<div id="pagination" style="text-align:center;">';
        $config['full_tag_close'] = '</div>';   

        //..Initialization of config settings...
		$this->pagination->initialize($config);
		$data['customers'] = $query2 = $this->db->select('a.customer_id,a.customer_account_number,a.customer_account_type,a.customer_account_balance ,a.customer_account_currency ,a.customer_account_status,b.customer_firstname,b.customer_lastname');
		$data['customers'] = $query2 = $this->db->from('customer_account_detail a');
		$data['customers'] = $query2 = $this->db->join('customer_bio_detail b','a.customer_id=b.customer_id');
    	$data['customers'] = $query2 = $this->db->order_by('customer_id','DESC');
        $data['customers'] = $query2 = $this->db->get('',$config['per_page'],$this->uri->segment(2));


		//loading views...
      $this->load->view('header');
      $this->load->view('sidebar', $data);
      $this->load->view('customers',$data);
      $this->load->view('footer');
    }

    else
    {
    	$this->login();
    }


}//end of customers...


public function doaction_customer()
{
	$status_id = $this->input->post('action');
	$customer_id = $this->input->post('customer_id');
    
   
    
	if($this->session->userdata('customer_auth') && $this->session->userdata('customer_type') == "admin")
{
	if(!empty($status_id)  && !empty($customer_id))
	{   
	    //die($status_id.''.$customer_id);
	    
	    if($status_id == 4)
	    {   
	        //do delete account...
	       $query = $this->Users_model->doaction_delete_customer($status_id, $customer_id);
	    }
	    
	    else
	    {       
	        //do activate , deactivate , hold account...
	        	$query = $this->Users_model->doaction_customer($status_id, $customer_id);
	    }
        
		if($query)
		{   
		   	// header('Location: '.base_url().'/customers');
			echo "<h4 style='color:green;'>Operation Successful...</h4>";
		}
		else
		{
			//echo "Error...";
			echo "<h4 style='color:red;'>Operation Failed...</h4>";
		}
		
} // end of if !empty...




else
{
    echo "Invalid data supplied";
}

} // end of if session auth...

}// end of doaction_customer...

public function testpassword()
{
    die($this->password->hash('1234567890'));
}

public function logout()
    {

    	
        if (!$this->session->userdata('customer_auth')) {
            $this->login();
        } else {

            $this->session->sess_destroy();
			$this->login();

        }


	}//end of logout()
	
}
