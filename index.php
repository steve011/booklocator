#!/usr/local/bin/php
<?php require ('../connect.php'); ?>


<html><head><title>Home Page</title></head>
<body>


  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/ui.php">Front End</a></h1>
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/search.php">Search</a></h1> 
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Back End</a></h1> 
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/adminer.php?oracle=oracle.cise.ufl.edu%2Forcl&username=sw5&db=CISETS&ns=SW5">Database Manager (for testing purposes...)</a></h2>
  <?php
  $conn = oci_connect('hr', 'welcome', 'localhost/XE');
  $stid = oci_parse($conn, SELECT * FROM books);
  oci_execute($stid);
  echo "<table border='1'>\n";
  while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULL)){
    echo "<tr>\n";
    foreach ($row as $item){
      echo "  <td>j".($istem !=== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n"
      
    }
    echo "</tr>\n";
  }
  echo "</table>\n";
  
    
  
  >
<?php
oci_close($connection);
?>

</body></html>

