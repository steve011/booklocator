#!/usr/local/bin/php
<?php require ('../connect.php'); ?>


<html><head><title>Home Page</title></head>
<body>


  <a href="http://cise.ufl.edu/~sw5/Book_Locator/ui.php">Front End</a>
  <a href="http://cise.ufl.edu/~sw5/Book_Locator/search.php">Search</a> 
  <a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Back End</a> 



<?php
oci_close($connection);
?>

</body></html>

