<!DOCTYPE HTML>
<html>
<head>
 <meta-charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Team RCF | Account Recovery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
		<link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >
    <style>
 p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';} 
    </style>
    </head>
<body>
<?php require_once('http://localhost/teamrcf/php/includes/navbar.php');?>
<div style="height:75px"></div>
 <a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>
<?php
if(isset($_GET['m']) && $_GET['m'] != ""){
    
        $message =  "<div style='text-align:center;border:2px solid red;border-radius:7px;'><h4>Message:</h4><p>{$_GET['m']}</p></div>";
    }
   
?>


    <center>
    <form action="http://localhost/teamrcf/php/forum/AccountRecoProcess.php" method="post" class="blueBlock col-md-6 col-md-offset-3"/>
    
    <fieldset>
    <legend>Enter Your Email associated with your account</legend>
 <div class="form-group">
        <?php if(isset($message)){
            echo $message;
            }
           ?></br>
        </div style="text-align:right; display:inline-block">
    <div class="form-group">
    <input type="text" value=""  name="email" placeholder="Email"/>
    </div>
    <div class="form-group">
    <input type="submit" value="Send Instructions" class="btn-md btn-warning" name="submit"/> 
    </div>
    
    
    </fieldset>
    
    
    </form>
   </center>
   
   
    <?php



include("http://localhost/teamrcf/php/includes/footer.php");
?>

</body>

</html>