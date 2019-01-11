<?php
date_default_timezone_set('America/New_York'); 
echo date('l jS \of F Y h:i:s A');  


$from = "samalcosser@teamrcf.com"; 
$to="samalcosser@gmail.com";  


$mailbody="Test message sent (PST): \n" . date('l jS \of F Y h:i:s A'); 
$subject="Test of PHP mail()" ; 

$headers = "Content-type: text/plain; charset=windows-1251 \r\n"; 
$headers .= "From: $from\r\n"; 
$headers .= "Reply-To: $from\r\n"; 
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "X-Mailer: PHP/" . phpversion(); 

$resp = mail($to, $subject, $mailbody, $headers); 

if( $resp ){ 
    $outcome = "Mail sent" ; 
} else { 
    $outcome = "Mail not sent"; 
} 

print "\nThe mail system said: $outcome\n\n" ; 
exit();
?>