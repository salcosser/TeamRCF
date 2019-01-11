<!DOCTYPE HTML>
<html>
<head>
<title>Team RCF| encrypting test </title>
</head>
<body>
    <?php
$password = "testpassword";
$hash_format = "$2y$10$";
$salt = "thisisateastandisatleast22charsprobs";
$formatand_salt = $hash_format . $salt;
$salted_hashed_pass = crypt($password , $formatand_salt);
echo $salted_hashed_pass;
?>
</br>
</br>
<?php
$testvar = "eyguy12";
$testvar2 = "eyguy";
 echo "testvar: ". strpbrk($testvar, "1234567890");
 echo "</br>";
 echo "testvar2: ". strpbrk($testvar2, "1234567890");
 echo "</br>";
  echo "</br>";
if(strpbrk($testvar, "1234567890") === null){
    echo "testvar is null";
}
elseif(strpbrk($testvar, "1234567890") === FALSE){
    echo "testvar is set to false";
}
elseif(strpbrk($testvar, "1234567890") === TRUE){
    echo "testvar is set to true";
}
elseif(strpbrk($testvar, "1234567890") != ""){
    echo "testvar is not an empty string";
}
 echo "</br>"; 
 echo "</br>";
if(strpbrk($testvar2, "1234567890") === null){
    echo "testvar2 is null";
}
elseif(strpbrk($testvar2, "1234567890") === FALSE){
    echo "testvar2 is set to false";
}
elseif(strpbrk($testvar2, "1234567890") === TRUE){
    echo "testvar2 is set to true";
}
elseif(strpbrk($testvar2, "1234567890") != ""){
    echo "testvar2 is not an empty string";
}
echo "</br>"; 
 echo "</br>";
 echo "</br>"; 
 echo "</br>";
 function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		$passwordArray = array($hash, $salt);
        return $passwordArray;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
$password1 = "thisisiatestpasswordandiwantoseeifitworks";
echo $password1;
echo "</br>"; 
 echo "</br>";
 echo "</br>"; 
 echo "</br>";
 $passArray = password_encrypt($password1);
 $saltySalt = $passArray[1];
 $hashyHash = $passArray[0];
 echo "Salt: " . $saltySalt;
   echo "</br>";
 echo "</br>"; 
 echo "Hash: ". $hashyHash;
  echo "</br>";
 echo "</br>"; 
  echo "</br>";
 echo "</br>"; 
 $var1 = "";
 if(empty($var1)){
     echo "var1 is empty";
 }
 echo "</br>";
 echo "</br>"; echo "</br>";
 echo "</br>"; 
 echo time();
 $timestamp =  date_timestamp_set( DateTime, time());
  echo date_timestamp_get("r");
?>
</body>

</html>