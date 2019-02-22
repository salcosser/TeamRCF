<?php
session_start();
 $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "password9";
  $dbname = "teamrcf_public";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Team RCF | Gallery </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
    </head>
<body>

    <?php include('../php/includes/navbar.php');?>
    <div style="height:75px"></div>

    <a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>
    
<center><a href="https://www.instagram.com/teamrcfofficial/?hl=en"><h1>@teamrcfofficial</h1></a></center>
<!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/b1d0b613ef405f3d99a554b0bd876ff5.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
<p>Live instagram feed by LightWidget</p>

    
    <?php include('http://localhost/teamrcf/php/includes/footer.php');?>

</body>

</html>
