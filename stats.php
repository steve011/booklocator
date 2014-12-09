#!/usr/local/bin/php
<?php 
require ('../connect.php');
session_start();
 $username=$_SESSION['username'];
?>

<?php 
oci_close($connection);
?>
