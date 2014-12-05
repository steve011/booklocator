#!/usr/local/bin/php
<?php require ('../connect.php'); ?>


<html><head><title>Home Page</title></head>
<body>


  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/ui.php">Front End</a></h1>
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/search.php">Search</a></h1> 
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Back End</a></h1> 
  <h2><a href="http://cise.ufl.edu/~sw5/Book_Locator/adminer.php?oracle=oracle.cise.ufl.edu%2Forcl&username=sw5&db=CISETS&ns=SW5">Database Manager (for testing purposes...)</a></h2>
  <?php
  /*Don't need this: $conn = oci_connect('hr', 'welcome', "localhost/XE", 'SW5'); 
    Just use $connection instead; the variable is intialized in connect.php, which is included above.*/
  $stid = oci_parse($connection, 'SELECT * FROM books WHERE ROWNUM <= 5'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
  oci_execute($stid);
  /*echo "<table border='1'>\n";
  while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULL)){
    echo "<tr>\n";
    foreach ($row as $item){
      echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
      
    }
    echo "</tr>\n";
  }*/
  while($row = oci_fetch_array($stid))
  {
    echo '<img src="'$obj->IMAGE_URL_L'">';
  }
  //echo "</table>\n";
  
    
  
  ?>
<?php
oci_close($connection);
?>

</body></html>

