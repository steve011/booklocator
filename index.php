#!/usr/local/bin/php
<?php require ('../connect.php'); ?>


<html><head><title>Home Page</title></head>
<body>


  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/ui.php">Front End</a></h1>
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/search.php">Search</a></h1> 
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Back End</a></h1> 



<?php
oci_close($connection);
?>

</body></html>

