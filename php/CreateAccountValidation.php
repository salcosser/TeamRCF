<?php
session_start();
if(isset($cookieMessage)){
    setcookie(message, $cookieMessage, 86400);
}
 $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "cupquakeciller99";
  $dbname = "teamrcf_private";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
   require('C:/xampp/htdocs/teamrcf/php/recaptchalib.php');
    $privatekey = "6LfoIQoUAAAAAEQ_nS_5IpfMQDQ0xv-R9xWsJQ3a";
    $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

function redirect_to($new_location){
			header("Location: ". $new_location);
			exit;
		}
 function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		$passwordArray = array($hash, $salt);
        return $passwordArray;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}

if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $submit = $_POST['submit'];
    
    if(isset($full_name,$email, $username, $password, $confirmPassword)
     && (strlen($full_name) >= 8) && 
    (strlen($email) >= 15) && (strlen($username) >=8) &&
     (strlen($password)>=15) && (strlen($confirmPassword)>=15) ){

         $userCheckQuery="SELECT username FROM users WHERE username = '{$username}'";
         $userCheckResult= mysqli_query($connection, $userCheckQuery);
         $userRows = mysqli_num_rows($userCheckResult);
         $emailCheckQuery="SELECT email FROM users WHERE email = '{$email}'";
         $emailCheckResult= mysqli_query($connection, $emailCheckQuery);
         $emailRows = mysqli_num_rows($emailCheckResult);
         if($userRows == 0 && $emailRows == 0){
             
             if(($password == $confirmPassword) && (strtolower($password) != $password)
              && (strtolower($confirmPassword) != $confirmPassword) && (strpbrk($password, "1234567890") != FALSE) &&
              (strpbrk($confirmPassword, "1234567890") != FALSE )   ){
                
        //this validates if all fields are set, AND the CAPTCHA was right
                if ($resp->is_valid){
                   $full_name = mysqli_escape_string($connection, $full_name);
                   $username = mysqli_escape_string($connection, $username);
                   $email = mysqli_escape_string($connection, $email);
                   $passwordArray = password_encrypt($password);
                   $hashyHash = $passwordArray[0];
                   $saltySalt = $passwordArray[1];
                   $userCreateQuery = "INSERT INTO users ( fullName, username, email, passypass, salt ) VALUES ('{$full_name}', '{$username}', '{$email}', '{$hashyHash}', '{$saltySalt}');";
                   $setUser = mysqli_query($connection, $userCreateQuery);
                   $userErrorCheck="SELECT username FROM users WHERE username = '{$username}'";
                   $userErrorResult= mysqli_query($connection, $userCheckQuery);
                   $userErrorRows = mysqli_num_rows($userErrorResult);
                   if($userErrorRows === 0){
                      // this catches the rare case of an insert statement to SQL not functioning properly
                      $message = "An error occured, please try again.";
                      $full_name = urlencode($full_name);
                      $email = urlencode($email);
                      $username =urlencode($username);
                      $submit = urlencode($submit);
                      $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
                      mysqli_free_result($userCheckResult);
                      mysqli_free_result($userErrorResult);
                      mysqli_close($connection);
                      redirect_to($url);
                   }
                   // if the above procedure doesn't run, then this will continue
                   $_SESSION['username'] = $username;
                   $cookieMessage = "Welcome new user!!";
                   mysqli_free_result($userCheckResult);
                   mysqli_close($connection);
                   $username = urlencode($username);
                   $url = "http://localhost/teamrcf/php/forum/TeamForumHomepage.php?username={$username}";
                   redirect_to($url);
              }
                //captcha incorrect
                else{
                   $message = "CAPTCHA invalid, please try again";
                   $full_name = urlencode($full_name);
                   $email = urlencode($email);
                   $username =urlencode($username);
                   $submit = urlencode($submit);
                   $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
                   mysqli_free_result($userCheckResult);
                   mysqli_close($connection);
                   
                   redirect_to($url);
                }
//passwords match and have numbers and caps
              }
             elseif($password == $confirmPassword){
                 $message = "password must contain at least one uppercase letter and one number";
                 $full_name = urlencode($full_name);
                 $email = urlencode($email);
                 $username =urlencode($username);
                 $submit = urlencode($submit);
                 $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
                 mysqli_close($connection);   
                 redirect_to($url);
             }
             
             else{
                 $message = "passwords must match";
                 $full_name = urlencode($full_name);
                 $email = urlencode($email);
                 $username =urlencode($username);
                 $submit = urlencode($submit);
                 $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
                 mysqli_free_result($userCheckResult);
                 mysqli_close($connection);   
                 redirect_to($url);
             }


// no users by that username
         }
         elseif($emailRows != 0 && $userRows != 0){
             $message = "username and email taken, please try another.";
              $full_name = urlencode($full_name);
              $email = urlencode($email);
              $username =urlencode($username);
              $submit = urlencode($submit);
              $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
              mysqli_free_result($userCheckResult);
              mysqli_close($connection);   
              redirect_to($url);
         }
        elseif($userRows == 0){
             $message = "email taken, please try another.";
              $full_name = urlencode($full_name);
              $email = urlencode($email);
              $username =urlencode($username);
              $submit = urlencode($submit);
              $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
              mysqli_free_result($userCheckResult);
              mysqli_close($connection);   
              redirect_to($url);
        }
        else{
            $message = "username taken, please try another.";
              $full_name = urlencode($full_name);
              $email = urlencode($email);
              $username =urlencode($username);
              $submit = urlencode($submit);
              $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
              mysqli_free_result($userCheckResult);
              mysqli_close($connection);   
              redirect_to($url);
        }

         
    //all variables properly set
     }
     elseif(empty($full_name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)){
         $message="please fill out all fields";
           $full_name = urlencode($full_name);
           $email = urlencode($email);
           $username =urlencode($username);
           $submit = urlencode($submit);
           $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
           mysqli_free_result($userCheckResult);
           mysqli_close($connection);   
           redirect_to($url);
     }
     
     elseif( (strlen($full_name) <= 8) ||  (strlen($email) <= 15) || (strlen($username) <=8) || (strlen($password)<=15) || (strlen($confirmPassword)<=15)){
         if(strlen($full_name) <= 8){
             $message = "name must be more than 10 charachters.";
             $full_name = urlencode($full_name);
             $email = urlencode($email);
             $username =urlencode($username);
             $submit = urlencode($submit);
             $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
             mysqli_free_result($userCheckResult);
             mysqli_close($connection);   
             redirect_to($url);
         }
         elseif(strlen($email) <= 15){
             $message = "email must be properly set to more than 15 charachters";
             $full_name = urlencode($full_name);
             $email = urlencode($email);
             $username =urlencode($username);
             $submit = urlencode($submit);
             $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
             mysqli_free_result($userCheckResult);
             mysqli_close($connection);   
             redirect_to($url);
         }
         elseif(strlen($username) <=8){
             $message = "username must be more than 8 charachters";
             $full_name = urlencode($full_name);
             $email = urlencode($email);
             $username =urlencode($username);
             $submit = urlencode($submit);
             $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
             mysqli_free_result($userCheckResult);
             mysqli_close($connection);   
             redirect_to($url);
         }
         elseif(strlen($password)<=15){
            $message = "password must be more than 15 charachters";
            $full_name = urlencode($full_name);
            $email = urlencode($email);
            $username =urlencode($username);
            $submit = urlencode($submit);
            $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
            mysqli_free_result($userCheckResult);
            mysqli_close($connection);   
            redirect_to($url);
         }
         elseif(strlen($confirmPassword)<=15){
             $message = "password confirmation must match, and be more than 15 charachters.";
             $full_name = urlencode($full_name);
             $email = urlencode($email);
             $username =urlencode($username);
             $submit = urlencode($submit);
             $url = "http://localhost/teamrcf/php/forum/CreateAccount.php?s={$submit}&m={$message}&fn={$full_name}&e={$email}&u={$username}";
             mysqli_free_result($userCheckResult);
             mysqli_close($connection);   
             redirect_to($url);
         }
    //form validation errors
     }
     else
         $message = "create an account.";
         redirect_to("http://localhost/teamrcf/php/forum/CreateAccount.php");
     
//submit
}
    
    
    
   
    

?>