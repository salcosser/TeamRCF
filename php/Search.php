<!DOCTYPE HTML>
<html>
<head>
<title>Team RCF| Search </title>
</head>
<body>
    <?php
if(isset($_GET['SeQue']) && ($_GET !== '')){
    echo "you searched for " . $_GET['SeQue'] . " !!";
    echo "now git back to the <a href='http://localhost/teamrcf/index.php'>homepage</a>! ";
}
elseif($_GET['SeQue'] === ""){
echo "you didn't search for anything... so IDK why you are here, heres a link back to the <a href='http://localhost/teamrcf/index.php'>homepage</a> cuz u weird. ";
}

?>
</body>

</html>