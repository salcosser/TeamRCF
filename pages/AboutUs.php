<?php 
 $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "password";
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
    <meta-charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Team RCF | About Us </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
		<link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >
        <style>

            @media (min-width:992px){
                .Art-Border{
                display:none;
                }
                .blueBlock, .orangeBlock{
                    height:285px;
                    }
            }
            .blueBlock, .orangeBlock{
                margin:0px;
            }
            @media (min-width:1200px){
                .blueBlock, .orangeBlock{
                height:245px;    
                }
            }
      option,p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';}
         </style>
</head>
<body>
    
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/bootstrap.min.js"></script>
    <header>
   <?php include('../php/includes/navbar.php');?>
   <div style="height:75px"></div>

        <a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>
</header>
 <?php
   //get the data
    $query  = "SELECT * ";
	$query .= "FROM teamrcf_public.coaches ";
	$query .= "ORDER BY position DESC";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if (!$result) {
		die("Database query failed when retrieving coaches info.");
	}
    
        
    
    
    ?>
    <div class="container">
            <div class="row">
                <h1>Meet the coaches</h1>

                <div class="container">
                    <div class="row">
                        <?php
                        while($coach = mysqli_fetch_assoc($result)){
                        ?>
                     <?php  // if($coach['name']=="Ryan Wolf"){ echo '<div class="clearfix-visible-md-block"></div>';}?> 
                          <article id="coach"class='<?php if($coach['name']=="Wilhelmina Stuhlman" || $coach['name'] == "Chris Moyle"){ echo " col-md-6 orangeBlock ";}else{echo "col-md-6 blueBlock";} ?>'>
                              <div class="coach_title">
                                <h1><?php echo $coach['name'];?></h1>

                                <h3><small><?php echo $coach['position'];?></small></h3>
                              </div>
                              <p><?php echo $coach['blurb'];?></p>
                            </article>
                    <div class="Art-Border"></div>


                    <?php
                    //closing curly brace of the listing
                        }

                      mysqli_free_result($result); 
                    mysqli_close($connection);

                    ?>
                    </div>
                 </div>
            </div>
    </div>
    <div class="container">
        
        </div>
    
    
    
    </div>
     <?php include('http://localhost/teamrcf/php/includes/footer.php');?>

</body>
</html>
