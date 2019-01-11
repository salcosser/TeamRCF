<?php
  session_start();
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
require_once('c:/xampp/htdocs/teamrcf/php/includes/functions.php');

$email = $_POST['email'];
$submit = $_POST['submit'];
if(isset($submit)){
    if(isset($email)&& $email != ""){

        $email = mysqli_escape_string($connection, $email);
        $emailQuery="SELECT * FROM users WHERE email='{$email}'";
        $result = mysqli_query($connection, $emailQuery);
        $rows = mysqli_num_rows($result);
        if($rows != 0){
           while($row = mysqli_fetch_assoc($result)){
             $userGet = generateRandomString();
            // put a loop in here to ensure that the database doesnt give two users the same pass key



             $userCode = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
             $recoQuery = "UPDATE users SET recover_mode = 1, recovery_string = '{$userGet}', recovery_code = '{$userCode}' WHERE username = '{$row['username']}'";
             $recoResult = mysqli_query($connection, $recoQuery);
             $recoResultTest = mysqli_affected_rows($connection);
             if($recoResultTest != 0){
               
               date_default_timezone_set('America/New_York'); 
                echo date('l jS \of F Y h:i:s A');
                $from = "samalcosser@teamrcf.com"; 
                $to=$email; 
                 $recoveryUrl = "http://localhost/teamrcf/php/forum/PassCode.php?k={$userGet}";
                $mailbody= "Dear user,\n please navigate to {$recoveryUrl}. Please wait for the second email to see your code.";
                $subject="Password Reset 1 of 2" ;
                $headers = "Content-type: text/plain; charset=windows-1251 \r\n"; 
                $headers .= "From: $from\r\n"; 
                $headers .= "Reply-To: $from\r\n"; 
                $headers .= "MIME-Version: 1.0\r\n"; 
                $headers .= "X-Mailer: PHP/" . phpversion(); 
                $resp1 = mail($to, $subject, $mailbody, $headers); 
                if( $resp1 ){ 
                    $from = "samalcosser@teamrcf.com"; 
                    $to=$email; 
                    $mailbody= "Your code is \n\n{$userCode}";
                    $subject="Password Reset 2 of 2" ;
                    $headers = "Content-type: text/plain; charset=windows-1251 \r\n"; 
                    $headers .= "From: $from\r\n"; 
                    $headers .= "Reply-To: $from\r\n"; 
                    $headers .= "MIME-Version: 1.0\r\n"; 
                    $headers .= "X-Mailer: PHP/" . phpversion(); 
                    $resp2 = mail($to, $subject, $mailbody, $headers);
                    if( $resp2 ){ 
                    
                        $message = urlencode("instructions on how to reset password sent. Please check your email for further instructions.");
                        $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
                        mysqli_free_result($result);
                        mysqli_free_result($recoResult);
                        mysqli_close($connection);
                        redirect_to($url) ; 
                    } 
                    else{ 
                        $error = mysqli_error();
                        $message = urlencode("problem sending email {$error}");
                        $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
                        $resetQuery = "UPDATE users SET recover_mode = null, recovery_string = null, recovery_code = null WHERE username = {$row['username']}'";
                        $redoUpdateConfirm = send_update_query($resetQuery);
                        // do something here to confirm the query was sent.
                        mysqli_free_result($result);
                        mysqli_free_result($recoResult);
                        mysqli_close($connection);
                        redirect_to($url); 
                    }
                } 
                else{ 
                   $error = mysqli_error();
                    $message = urlencode("problem sending email {$error}");
                    $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
                    $resetQuery = "UPDATE users SET recover_mode = null, recovery_string = null, recovery_code = null WHERE username = {$row['username']}'";
                    $redoUpdateConfirm = send_update_query($resetQuery);
                    // do something here to confirm the query was sent.
                    mysqli_free_result($result);
                    mysqli_free_result($recoResult);
                    mysqli_close($connection);
                    redirect_to($url) ; 

                } 
               
                // if the information was submitted to the database correctly
           }
           else{
               
               $message = urlencode("There was an error sending the information to the database. rows associated: {$recoResultTest}");
               $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
               mysqli_free_result($result);
               mysqli_free_result($recoResult);
               mysqli_close($connection);
               redirect_to($url) ; 
           }

        }
        }
        else{
            
            $message = urlencode("There is no user associated with that email.");
            $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
            mysqli_free_result($result);
            mysqli_free_result($recoResult);
            mysqli_close($connection);
            redirect_to($url) ; 
        }
    }
    
    else{
        
        $message = urlencode("Please enter an email.");
        $url = "http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}";
        redirect_to($url);
    }

    }


 
 
 
 
 
 
 ob_end_flush();
 
 mysqli_free_result($result);
             mysqli_close($connection);
?>