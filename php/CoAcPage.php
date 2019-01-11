		<?php 
		ob_start();
		function redirect_to($new_location){
			header("Location: ". $new_location);
			exit;
		}
		
//you can test to be sure form fields are filled out by the user & 
//assign a default value if the form field does not exist
    require_once('recaptchalib.php');
  $privatekey = "6LfoIQoUAAAAAEQ_nS_5IpfMQDQ0xv-R9xWsJQ3a";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
function message($message){
    if(isset($message) && $message != ""){
    $message =  "<div style='text-align:center;border:2px solid red;border-radius:7px;'><h4>Message:</h4><p>{$message}</p></div>";
    echo $message;
    
    }
}
  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly

      if (isset($_POST['submit'])){
        $submit = $_POST['submit'];
        if(isset($_POST['name'])){
            $name = urlencode($_POST['name']);
        }
        else{
            $name = "";
        }    
        if(isset($_POST['email'])){
            $email = urlencode($_POST['email']);
        }
        else{
            $email = "";
        }
        if(isset($_POST['content'])){
            $content = urlencode($_POST['content']); 
        }
        else{
            $content = "";
        }
        $message = urlencode("Captcha Invalid, please try again.");

$url = "http://localhost/teamrcf/pages/contact.php?submit={$submit}&message={$message}&name={$name}&email={$email}&content={$email}";

      }
    else{
       
        $message = "Please enter info";
    $url = "http://localhost/teamrcf/pages/contact/php?submit={$submit}&message={$message}" ;  
    }
    
      
  
      redirect_to($url);
	
  } 


/* if the CAPTCHA is correct */
  else {
      date_default_timezone_set('America/New_York'); 
                echo date('l jS \of F Y h:i:s A');
	 $from = "samalcosser@teamrcf.com"; 
                    $to=$from; 
                    $mailbody= "time and date submitted: ".date('m/d/Y')." at ".date("h:i:sa").
                    "\nuser name: {$_POST['name']}\n
                    user email: {$_POST['email']}\n
                    Reason for contact: {$_POST['reason_for_contact']}\n
                    message: {$_POST['content']}\n
                    ";
                    $subject="ContactForm {$_POST['name']}" ;
                    $headers = "Content-type: text/plain; charset=windows-1251 \r\n"; 
                    $headers .= "From: $from\r\n"; 
                    $headers .= "Reply-To: $from\r\n"; 
                    $headers .= "MIME-Version: 1.0\r\n"; 
                    $headers .= "X-Mailer: PHP/" . phpversion(); 
                    $resp2 = mail($to, $subject, $mailbody, $headers);
                    if( $resp2 ){ 
                        	redirect_to("thankyou.php"); 
                       
                    
                    } 
                    else{ 
                        $error = mysql_error();
                        $message = urlencode("problem sending email {$error}");
                        $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";  
                    }
			 
			
				
	
		
	
	
    
  }	
  ob_end_flush();
        ?>
        