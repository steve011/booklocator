#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<?php

// Connect to server and check for errors.
$conn = oci_connect('inventory', 'tiger', 'XE');
if (!$conn) {
   $e = oci_error();
   print htmlentities($e['message']);
   exit;
 }


// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$query="SELECT * FROM members WHERE username='".$myusername."' and password= '".$mypassword."' ";
//echo($query);
 $stid = oci_parse($conn, $query);

//oci_bind_by_name($stid, ":us", $username);
//oci_bind_by_name($stid, ":pw", $password);


$result=oci_execute($stid);
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
