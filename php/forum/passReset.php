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
require_once("C:/xampp/htdocs/teamrcf/php/includes/functions.php");

/*



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
      
      redirect_to("http://localhost/teamrcf/php/forum/AccountRecovery.php");
    }
  }
  else{

  }
  */
  ?>
  
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Team RCF| Password Reset </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
		<link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >


</head>
<body>
     <script type="text/javascript" src="http://localhost/teamrcf/scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/bootstrap.min.js"></script>
 <?php require_once('http://localhost/teamrcf/php/includes/navbar.php');?>
<div style="height:75px"></div>
 <a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>
<?php
require_once("c:/xampp/htdocs/teamrcf/php/includes/functions.php");

if(isset($_GET['s'])){
  if(isset($_GET['np']) && isset($_GET['cp']) && issset($_GET['m'])){
    $new_password = $_GET['np'];
    $confirm_password = $_GET['cp'];
    $m = $_GET['m'];
  }
  elseif(isset($_GET['np']) || isset($_GET['cp'])){
    if(isset($_GET['np'])){
      $new_password = $_GET['np'];
      $confirm_password = "";
      if(isset($_GET['m'])){
        $m = $_GET['m'];
      }
      else{
        $m = "";
      }
    }
    else{
       $new_password = "";
      $confirm_password = $_GET['cp'];
      if(isset($_GET['m'])){
        $m = $_GET['m'];
      }
      else{
        $m = "";
      }
    }
  }
  else{
    $new_password = "";
    $confirm_password = "";
  }

}
else{
  $new_password = "";
  $confirm_password = "";
  $m = "";
}



?>

<div class="container">
  <div class="row">
    <div class="col-md-12 blueBlock" style="font-size:1.5em">
    <?php $url="http://localhost/teamrcf/php/forum/passResetProcess.php?k=" . $_GET['k'];?>
      <form action="<?php echo $url;?>" method="post">
      <legend style="text-align:center">Reset Password</legend>
      <center>
        <div class="form-group">
        <?php message($m); ?>
        </div>
        <div class="form-group">
          <input type="password" name="new_password" placeholder="new password" value="<?php echo $new_password;?>"/>
        </div>
        <div class="form-group">
          <input type="password" name="confirm_password" placeholder="confirm password" value="<?php echo $confirm_password;?>"/>
        </div>
        <div class="form-group">
        <center>
        <?php require_once('c:/xampp/htdocs/teamrcf/php/recaptchalib.php');
        $publickey = "6LfoIQoUAAAAAOhbAPeWS_niY9PkPSaYsj-zxsrz"; // you got this from the signup page
        echo recaptcha_get_html($publickey);?>
        </center>
        </div>
        <div class="form-group">
          <button type="submit" class="btn-md">change password</button>
        </div>
      </center>
      </form>
    </div>
  </div>
</div>
 <?php include("http://localhost/teamrcf/php/includes/footer.php");?>
</body>
<?php ob_end_flush();?>
</html>