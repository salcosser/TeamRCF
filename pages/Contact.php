<!DOCTYPE HTML>
<html>
<head>
    <meta-charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Team RCF |  Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
        <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/teamrcf/css/Main.css"/>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/teamrcf/scripts/Main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo|Source+Sans+Pro" rel="stylesheet">
        <link rel='shortcut icon' href='\favicon.ico' type='image/x-icon'/ >
			<script language="JavaScript">
	
                /*
                function formValidator(theForm)
{
  if (theForm.name.value.length < 1)
  {
    alert("Please enter your name.");
    theForm.name.focus();
    return (false);
  }

  if (theForm.name.value == "")
  {
    alert("Please enter your name.");
    theForm.name.focus();
    return (false);
  }

  if (theForm.email.value == "")
  {
    alert("Please enter an email address.");
    theForm.email.focus();
    return (false);
  }

  if (theForm.email.value.length < 5)
  {
    alert("Please enter a valid email address.");
    theForm.email.focus();
    return (false);
  }
  if (theForm.reason_for_contact === "select" ){
	  alert("please enter a reason for content.");
	  theForm.reason_for_contact.focus();
	  return(false);
  }
	  
  
  return (true);
}
                
        */
	</script>
    <script src="http://localhost/teamrcf/scripts/main.js"></script>
        <style>
           
            
             fieldset input, fieldset select,fieldset textarea{
                border-style: none;
                border-radius:5px 5px 5px 5px;
            }
            
            form fieldset input{
                padding:10px 0px 10px 0px;
            }
            
            textarea{
                resize:none;
            }
            #CAPTCHA{
                display:block;
            }
            footer{
                display:absolute;
                top:390px;
                
            }
            option,p{font-family:'Source Sans Pro';}
    h1,h2.h3,h4,h5,h6{font-family:'Exo';}
        
        
        </style>
</head>
<body>
         
     <?php
    
    if (isset($_GET['submit'])){
        if(isset($_GET['name'])){
            $name = $_GET['name'];
        }
        else{
            $name = "";
        }    
        if(isset($_GET['email'])){
            $email = $_GET['email'];
        }
        else{
            $email = "";
        }
        if(isset($_GET['content'])){
            $content = $_POST['content']; 
        }
        else{
            $content = "";
        }
        $message = "there was an error sending your message.";



      }
    else{
        $_GET['name'] = "";
        $_GET['email'] = "";
        $_GET['content'] = "";
        }
    
   
    
    
   

     
    
   
    if(isset($_GET['message']) && $_GET['message'] != ""){
    
        $message =  "<div style='text-align:center;border:2px solid red;border-radius:7px;'><h4>Message:</h4><p>{$message}</p></div>";
    }
         
         
         
    ?>
    <header>
    <?php include("../../teamrcf/php/includes/navbar.php");?>
    <div style="height:75px"></div>

    <?php require("c:xampp/htdocs/teamrcf/php/includes/functions.php");?>
</header>
<a href="http://localhost/teamrcf/index.php"><div class="scalable_pic" id="topicon"></div></a>

<form  method="post"action="http://localhost/teamrcf/php/CoAcPage.php" id="contactForm" name="contactForm" onSubmit="return formValidator(this)">
    <fieldset>
       <div class="container blueBlock" style="font-family:'Source Sans Pro';text-align:center" >
        <legend>Contact Us</legend>
        <div class="form-group">
           <?php if(isset($message)){
            echo $message;
            }
           ?></br>
           </div>
        
        <div class="form-group">
        <input name="name" placeholder="Name" type="text" cols="35"size="35" value="<?php echo $_GET['name'];?>"><br>
        </div>
        <div class="form-group">
        <input name="email" type="email" placeholder="Email" cols="40" size="55"value="<?php echo $_GET['email'];?>"></br>
        </div>
        <div class="form-group">
        <select name="reason_for_contact">
            <option value="select">select a reason</option>
            <option value="question">question</option>
            <option value="comment">comment</option>
            <option value="suggestion">suggestion</option>
            <option value="report a problem">report a problem</option>
        </select><br><br>
        </div>

        <div class="form-field">
        <textarea name="content" cols="70" rows="10" placeholder="write your question, comment, or statement of problem here."><?php echo $_GET['content'];?></textarea><br>
        </div>
        <div class="form-group">
        <center>
             <?php require_once('c:/xampp/htdocs/teamrcf/php/recaptchalib.php');
                        $publickey = "6LfoIQoUAAAAAOhbAPeWS_niY9PkPSaYsj-zxsrz"; // you got this from the signup page
                        echo recaptcha_get_html($publickey);?>
        </center>
    </div>
    <div class="form-group">
         <input type="submit"  style="font-size:1.5em;border-radius:7px;padding:0px 5px 0px 5px; transition:.3s" name="submit" class=" btn-warning btn-md" value="Submit"/>
    </div>
    </fieldset>
        </div>
</form>


    <?php include('http://localhost/teamrcf/php/includes/footer.php');?>

</body>
</html>