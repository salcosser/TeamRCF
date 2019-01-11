<?php
require("c:/xampp/htdocs/teamrcf/php/forum/includes/classes.php");
session_start();

$database = new MySQLDB('teamrcf_public');
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Team RCF | Forum Homepage</title>
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
 <?php require_once('c:/xampp/htdocs/teamrcf/php/includes/functions.php');?>
<?php include("http://localhost/teamrcf/php/forum/includes/topicsbar.php");?>
    
<?php
if(isset($_SESSION['username'])){
 $user = new User($_SESSION['username']);   
}
else{
$user = new User('guest');
}

?>
<div class="container">
    <div class="row">
    <?php include 'http://localhost/teamrcf/php/forum/includes/userbar.php';?>
    
    <h1 class="lead">Most Recent Threads</h1>
    
    
    
    
    
    </div>



</body>

</html>