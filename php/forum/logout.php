<?php
require("c:/xampp/htdocs/teamrcf/php/forum/includes/classes.php");
require("c:/xampp/htdocs/teamrcf/php/includes/functions.php");
session_start();
$user = new User($_SESSION['username']);
$user->logout();
ob_end_flush();
?>