#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<?php

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$query="SELECT * FROM users WHERE username=".$myusername." and password= ".$mypassword;
//echo($query);
 $stid = oci_parse($connection, $query);

//oci_bind_by_name($stid, ":us", $username);
//oci_bind_by_name($stid, ":pw", $password);

//echo($result);

// Mysql_num_row is counting table row
$count=oci_num_rows($stid);
echo ($count);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION["myusername"];
$_SESSION["mypassword" ];
header("location:C:\wamp\www\test\login try\login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>

<?php 
oci_close($connection);
?>
