<?php

$dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "cupquakeciller99";
  $dbname = "teamrcf_public";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  };

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Team RCF | Home</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
		<link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >
        
    </head>
    <body>
   <?php
         $query="SELECT * FROM teamrcf_public.faq ORDER BY title DESC"; 
        $result = mysqli_query($connection, 'SELECT * FROM teamrcf_public.faq ORDER BY id ASC');
        if($result === null){;
            die('query returned no result.');
            
        }
        elseif(!$result){
            die('database connection failed.'); 
        }
        
        ?>
        
         <script type="text/javascript" src="http://localhost/teamrcf/scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/teamrcf/scripts/bootstrap.min.js"></script>
        <?php include("php/includes/navbar.php");?>
        <div style="height:75px"></div>

<style>
    
    
    @media (min-width:1200px){
    #row h1, #row p{
        margin-top:17%;
        
        }
        #row p{
            font-size:1.12em;
        }
    }
    

    p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';}
</style>
<a href="index.php"><div class="scalable_pic" id="topicon"></div></a>
    </header>         


<div class="container"> 
<?php
    while($article = mysqli_fetch_assoc($result)){

        if($article['title']=="Train Together"){
            $safe_content=htmlspecialchars($article['content'],ENT_QUOTES);
            
            $formatted_article="<article class='row' id='row'>";
            $formatted_article.="<div class='col-lg-6 col-sm-12 col-md-6 '>";
            $formatted_article.="<h1 style='text-align:center'>{$article['title']}</h1>";
            $formatted_article.="<p>{$safe_content}</p>";
            $formatted_article.="</div>";
            $formatted_article.="<div class='col-lg-6 col-sm-12 col-md-6'><img class='scalable_pic' style='box-shadow:1px 1px 4px 2px;' src='{$article["picture_link"]}'/></div>";
            $formatted_article.="</article>";
            $formatted_article.="<div class='Art-Border'></div>";
            
            
            echo $formatted_article;
            }   
        else{
            $safe_content = htmlspecialchars($article['content'],ENT_QUOTES);
            
            $formatted_article= "<article class='row' id='row'>";
            $formatted_article.= "<div class='col-lg-6 col-sm-12 col-md-6 '>";
            $formatted_article.= "<img class='scalable_pic' style='box-shadow:1px 1px 4px 2px' src='{$article["picture_link"]}'/>";
            $formatted_article.="</div>";
            $formatted_article.="<div class='col-lg-6 col-sm-12 col-md-6 '>";
            $formatted_article.= "<h1>{$article['title']}</h1>";
            $formatted_article.="<p>{$safe_content}</p>";
            $formatted_article.="</div>";
            $formatted_article.= "</article>";
            $formatted_article.= "<div class='Art-Border'></div>";
            echo $formatted_article;

        }
}
    
    ?>
    
</div>
  
    <?php
      mysqli_free_result($result);  
    mysqli_close($connection);
    
    ?>              

      <?php include('http://localhost/teamrcf/php/includes/footer.php');?>
            </body>
 </html>