<?php 

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {	


//CONTACT US...
 if ($_POST['option'] == 'contact')
{	
	$error = array();//Declare An Array to store any error message  
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$content = $_POST['message'];
	$option = $_POST['option'];
	

	if(empty($fullname))
	{
		$error[] =  'Not name supplied !';
		
	}
	

	if(empty($subject))
	{
		$error[] =  'No subject supplied !';
	}
	 
		if(empty($email))
	{
		$error[] ='No email supplied !';
	}
	
	 if (!preg_match("#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i", $email)) 

		{
	    $error[] = 'Your email address is invalid';

		}
	

		if(empty($option))
		{
			 $error[] = 'No option supplied ! ';
		}

		
		if(empty($content))
		{
		$error[] = 'No message supplied ! ';
		}

		

		if(empty($error))
		{	

		
            		//echo "<h2 class='text-success'>Information saved. You will get an answer shortly.</h2>";
			echo 'success';
            		 $message = '<html>
<head>
 <title>GivenHands - Contact</title>
         <link rel="shortcut icon" href="" />
         <link rel="stylesheet" type="text/css" href="">
          <style type="text/css">
 .wrap{
    width: 720px;
    margin: 15px auto;
    padding: 15px 20px;
    background: white;
    border: 2px solid #DBDBDB;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
}
          </style>

</head>';

$message = '<body>
  <div class="wrap">
       
<p />
<center><h1>Thanks for contacting <a href="https://groningenbank.com" title="Groningenbank Personal & Business Banking"><span style="color:#1A54BA;">Groningenbank Loans Personal & Business Banking</span></a></h1></center>
<p />
   
      <table>
 <tr>
   <td>
   <h2>
    Message from : '.$fullname.' <br />
    Email : '.$email.'      <br />
    Subject : '.$subject.'  <br />
    Message : '.$content.' 
    </h2>
   </td>
 </tr>
</table>
<hr />
 

    </div>  
</body>
</html>';
   
              
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                  $headers .= 'From: support@groningenbank.com' . "\r\n";
                mail('support@groningenbank.com', $subject ,$message , $headers);
            	

            } //end of if empty..
			
			
		

		else{

			foreach ($error as $key => $values) {
            
            //echo '  "'.$values.'"';
				echo "<h2 class='text-danger'>".$values."</h2>";


               }
		
		}



	} // end of the Contact us...



} // end of the main if...



else{
	echo ('Bad Request !');
}



?>