#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<?php
$loggedIn = false;
if (isset($_COOKIES['username']) && isset($_COOKIES['security'])) {
     // Check Login
     $dbuser="user";
     $dbpass="pass";
     $db="db";
     //Connect to DB
     $connect = OCILogon($dbuser, $dbpass, $db);
     if (!$connect) {
          echo "An error has occured connecting to the database";
          exit;
     }
     // 
     $query = "SELECT password FROM MEMBERS WHERE username = '".$username."'";
     //Store resultsof select query
     $result = OCIParse($connect, $query);
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
     $count = OCIRowCount($result);
     
     if ($count == 1) {
          $pass = "";
          while ($row = oci_fetch_array($result)) {
               $pass = $row[0];
          }
          $test = md5($pass);
          
          if ($test == $_COOKIES['security']) {
               // The password cookie equals the value stored in the database...
               $loggedIn = true;
          }
     }
}
if (!$loggedIn) {
     header("Location: {login.php}");
}          
?>

<?php 
oci_close($connection);
?>
