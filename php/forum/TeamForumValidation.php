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
    function redirect_to($new_location){
			header("Location: ". $new_location);
			exit;
		}
        function password_test($password,$salt) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
        return $hashedPassword;
	}
    function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}


    // get this code to both do form validation and to check the username and password
 if (isset($_POST['submit'])){
        $submit = $_POST['submit'];
        
     
     
        if((isset($_POST['username']) && $_POST['username'] != "") && (isset($_POST['password']) && $_POST['password'] != "")){
          

            // try and get the row associated to this user
                $username = $_POST['username'];
                $password = $_POST['password'];
                $username = mysqli_real_escape_string($connection,$username);
                $pass_query  = "SELECT * FROM `users` WHERE username = '{$username}' LIMIT 1";
                $result = mysqli_query($connection, $pass_query);
           // test if there is actually a row associated 
            if($result != null){       
                while($row = mysqli_fetch_assoc($result)){
                
                $db_password = $row['passypass'];
               
                

          //see if the passwords match
                    if (password_check($password, $db_password)){
                         $_SESSION['username'] = $_POST['username'];
                         redirect_to("http://localhost/teamrcf/php/forum/TeamForumHomepage.php?username={$username}");
                    }
                    else{
                        $username = urlencode($_POST['username']);
                        $message = urlencode("password doesn't match.");
                        $url = "http://localhost/teamrcf/pages/TeamForum.php?submit={$submit}&message={$message}&username={$username}";
                        redirect_to($url);
                    }
                 }
           }
           else{
                $username = urlencode($_POST['username']);
                $message = urlencode("no associated username in the database.");
                $url = "http://localhost/teamrcf/pages/TeamForum.php?submit={$submit}&message={$message}&username={$username}";
                redirect_to($url);

           }    
           
        }         
        
        elseif((isset($_POST['username']) && $_POST['username'] != "") || (isset($_POST['password']) && $_POST['password'] != "")){
           
            if(isset($_POST['username']) && $_POST['username'] != ""){ 
                $username = urlencode($_POST['username']);
                $message = urlencode("Please enter a password.");
                $url = "http://localhost/teamrcf/pages/TeamForum.php?submit={$submit}&message={$message}&username={$username}";
                redirect_to($url);
            }
            elseif(isset($_POST['password']) && $_POST['password'] != ""){
                $message = urlencode("Please enter a username.");
                $url = "http://localhost/teamrcf/pages/TeamForum.php?submit={$submit}&message={$message}";
                redirect_to($url);
            }
        
        }
        else{
         $message = urlencode("Please fill out all fields");
        $url = "http://localhost/teamrcf/pages/TeamForum.php?message={$message}";
        redirect_to($url);
        }
        
	
     
    }
     
      
    mysqli_free_result($result); 
    mysqli_close($connection);


?>