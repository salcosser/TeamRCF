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

if(isset($_GET['k'])  && (strlen($_GET['k']) == 25)){

    $userKey = $_GET['k'];
    $keyTestQuery = "SELECT * FROM users WHERE recovery_string = '{$userKey}';";
    $keyTestResult = mysqli_query($connection, $keyTestQuery);
    $keyTestResultTest = mysqli_num_rows($keyTestResult);
    if($keyTestResultTest != 0){

        while($row = mysqli_fetch_assoc($keyTestResult)){
            if($row['recover_mode'] == 1){
                $user =  $row['username'];
                // $newUserKey = generateRandomString();
                // $stringReplaceQuery="UPDATE users SET 'recovery_string' = {$newUserKey};";
                // mysqli_query($connection, $stringReplaceQuery);
                // $updateTest = mysqli_affected_rows($connection);
                // if($updateTest != 1){
                //     $message = "an error occured. Please retry setting your password from the beginning.";
                //     redirect_to("http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}");
                // }
                
            }
        }
    
    }
    else{

        $message = "bad URL. Please try to reset again. there is no user related to that key";
        redirect_to("http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}");
    }
}
else{

     $message = "bad URL. Please try to reset again. k not set.";
    redirect_to("http://localhost/teamrcf/php/forum/AccountRecovery.php?m={$message}");
}

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

<div class="container-fluid">
    <div class="row">
            <center>
            <div class="blueBlock col-md-12">
                
                <div class="row">
                    <div class=" col-md-offset-3 col-md-6" style="text-align:center">
                        <h2>Hello <?php echo $user;?>,</h2></br>
                        <p>please enter the five charachter code you recieved in your email, <br>and enter the text in the next field to prove you are not a robot.</p>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-offset-3 col-md-6" style="text-align:center">
                    <?php $url= "http://localhost/teamrcf/php/forum/passReset.php?k=" . $newUserKey;?>
                        <form action="<?php echo $url?>" method="post">
                            <div class="form-group">
                                <input type="text" name="code" placeholder="code" size="7" style="padding:5px; border:none; border-radius: 5px 0px 5px 0px"/>
                            </div>
                            <div class="form-group">    
                                <center>
                                <?php require_once('c:/xampp/htdocs/teamrcf/php/recaptchalib.php');
                                $publickey = "6LfoIQoUAAAAAOhbAPeWS_niY9PkPSaYsj-zxsrz"; // you got this from the signup page
                                echo recaptcha_get_html($publickey);?>
                                </center>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="submit" name="submit"/> 
                            </div>
                        </form>
                    </div>  
                </div>  
        </div>
    </center>
</div>
<?php include("http://localhost/teamrcf/php/includes/footer.php");?>
</body>
<?php ob_end_flush();?>
</html>