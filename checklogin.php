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
     $dbuser="username";
     $dbpass="password";
     
     // extract all the form fields and store them in variables
     $username=$_POST['username'];
     $password=$_POST['password'];
     $remember=$_POST['remember'];
     
     // 
     $query = "SELECT * from USERS";
     
     $stid = OCIParse($connection, $query);
     
    
     if(! $stid) {
          echo "An error occurred in parsing the sql string '$query'.\n";
          exit;
     }
     
     $count = 0;
     OCIExecute($stid);
     while($row = oci_fetch_array($stid) && count === 0)
     {
          if($row["USERNAME"] === $username && $row["PASSWORD"] === $password)
          {
               header('Location: index.php');
          }
          header('Location: login.php?msg=1');
     }
     
     
     
     

?>
</body>
</html>


<?php 
oci_close($connection);
?>
