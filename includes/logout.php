<?php session_start();
?>

<?php

$_SESSION['user_id']  = null;
$_SESSION['user_email']  = null;
$_SESSION['user_password']  = null;
$_SESSION['first_name']  = null;
$_SESSION['last_name']  = null;
$_SESSION['dob']  = null;
$_SESSION['city'] = null;
$_SESSION['state']  = null;
$_SESSION['zip_code']  = null;
$_SESSION['user_type']  = null;
header("Location: ../index.php");




?>


