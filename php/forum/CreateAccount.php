<?php 
session_start();
if(isset($_SESSION['username'])){
    redirect_to("http://localhost/teamrcf/php/forum/TeamForumHomepage.php");
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
function redirect_to($new_location){
			header("Location: ". $new_location);
			exit;
		}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Team RCF | Create Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
		<link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >
</head>
<body>
       <style>
    p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';}   
    </style> 
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/bootstrap.min.js"></script>

    <?php
    /*validation and sending start*/
    if(isset($_GET['s'])){
         if(isset($_GET['fn'])){
            $full_name = urldecode($_GET['fn']);
        }
        else{
            $full_name = "";
        }    
        if(isset($_GET['e'])){
            $email = urldecode($_GET['e']);
        }
        else{
            $email = "";
        }
        if(isset($_GET['u'])){
            $username = urldecode($_GET['u']);
        }
        else{
            $username = "";
        }
        }
    else{
        $full_name = "";
        $email = "";
         $username = "";
        
        
    
    }
    if(isset($_GET['m']) && $_GET['m'] != ""){
    
        $message =  "<div style='text-align:center;border:2px solid red;border-radius:7px;'><h4>Message:</h4><p>{$_GET['m']}</p></div>";
    }
    
    function message($message){
    if(isset($message) && ($message != "")  ){
        echo "<div style='text-align:center'><h4>Message:</h4><p>{$message}</p></div>";
    
    
    }
}

	

	    


	

    ?>
           <style>
    p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';}     
            input[type="text"],input[type="password"]{
                border-style:none; 
                border-radius:5px 0px 5px 0px;
                padding:5px;
                margin:4px;
                width:20%;
            }
    input[type="submit"]{
       

    }
    </style>
    
 <?php require_once('http://localhost/teamrcf/php/includes/navbar.php');?>
<div style="height:75px"></div>
 <a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>

   <form action="http://localhost/teamrcf/php/CreateAccountValidation.php" method="post" >
       <fieldset class=" blueBlock container" style="font-size:1.em; text-align:center">
        <div>
        <div class="form-group">
        <?php if(isset($message)){
            echo $message;
            }
           ?></br>
        </div style="text-align:right; display:inline-block">
        
        <div class="form-group">
        <input type="text" id="full_name" placeholder="Full Name" name="full_name" value="<?php echo $full_name; ?>"/> *</br></br>
        </div>
        <div class="form-group">
        <input type="text" name="email"id="email" placeholder="Email" value="<?php echo $email;?>"/> *</br></br>
        </div>
        <div class="form-group">
         <input type="text" name="username" placeholder="Username" id="username" value="<?php echo $username; ?>"/> *</br></br>
        </div>
        <div class="form-group">
        <input type="password" name="password"id="password" placeholder="Password" value=""/> *</br></br>
        </div>
        <div class="form-group">
        <input type="password" name="confirmPassword" placeholder="Confirm Password"id="confirmPassword"value=""/> *</br></br>
        </div>
        <div class="form-group">
       <center>
        <?php require_once 'c:/xampp/htdocs/teamrcf/php/recaptchalib.php';
                        $publickey = "6LfoIQoUAAAAAOhbAPeWS_niY9PkPSaYsj-zxsrz"; // you got this from the signup page
                        echo recaptcha_get_html($publickey);?>*required field
      </center>
       <div style="height:20px"></div>
       </div>
       <div class="form-group">
        <input type="submit"  style="font-size:1.75em;border-radius:7px" name="submit" class=" btn-warning btn-md" value="Create Account"/></br>
        </div>
        <div class="form-group">
        <a href="http://localhost/teamrcf/pages/TeamForum.php">Sign in</a></br>
        <a href="http://localhost/teamrcf/php/forum/TeamForumHomepage.php">Enter as a guest</a></br>
        </div>
        </div>
    </fieldset>
   </form>
	
<?php include('http://localhost/teamrcf/php/includes/footer.php');?>
</body>
   
</html>