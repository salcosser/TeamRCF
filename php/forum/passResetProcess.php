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
require_once("c:/xampp/htdocs/teamrcf/php/includes/functions.php");
require_once('C:/xampp/htdocs/teamrcf/php/recaptchalib.php');
  $privatekey = "6LfoIQoUAAAAAEQ_nS_5IpfMQDQ0xv-R9xWsJQ3a";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);


  if (!$resp->is_valid){
    // What happens when the CAPTCHA was entered incorrectly
    $userKey =  $_GET['k'];
    $UserKeyCheckQuery=  "SELECT * FROM users WHERE recovery_string = '{$userKey}';";
    $UserConfirm = mysqli_num_rows(mysqli_query($connection, $UserKeyCheckQuery));
    if($UserConfirm != 1){
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      $message = "captcha incorrect, please try again";
      $invalidcapurl = "http://localhost/teamrcf/php/forum/passReset.php?s=snc&np={$new_password}&cp={$new_password}&m={$messsage}";
      redirect_to($invalidcapurl);
    }
  }
  else{

  }




$url = "http://localhost/teamrcf/pages/teamForum.php";
redirect_to($url);



ob_end_flush();
?>