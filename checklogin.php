#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php

// check to see if they are set before using them.
if (isset($_POST['username']) && isset($_POST['password'])) {
     
     
     // Login
     $dbuser="user";
     $dbpass="pass";
     $db="db";
     
     // extract all the form fields and store them in variables
     $username=$_POST['username'];
     $password=$_POST['password'];
     $remember=$_POST['remember'];
     
     //Connect to DB
     
     if (!$connection) {
          echo "An error has occured connecting to the database";
          exit;
     }
     
     // 
     $query = "SELECT * from users WHERE username='".$username."' and password='".$password."'";
     
     //Store resultsof select query
     $result = OCIParse($connection, $query);
     
     //Just check 
     //$sql = OCIParse($connect, $query);
     if(! $result) {
          echo "An error occurred in parsing the sql string '$query'.\n";
          exit;
     }
     
     $r = OCIExecute($result);
     
     if(! $r) {
          echo "An error occurred in executing the sql '$query'.\n";
          exit;
     }
     
     /*
     $tmpcount = OCIFetch($result); 
     // COunt Rows
     //$Count = OCIRowCount($tmpcount);
     
     if ($tmpcount==1){
     */
     
     $count = OCIRowCount($result);
     
     if ($count == 1) {
          // the row returned must have username and password equal to those supplied 
          // in the form, or it wouldn't be returned.
          
          
          header('Location: index.php');
               
     } else {
          //echo 'Username/Password Invalid';
          header('Location: login.php?msg=1');
     }
          
} else {
echo 'You must supply a username and password.';
}
//End Cookie script

?>
</body>
</html>


<?php 
oci_close($connection);
?>
