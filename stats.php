#!/usr/local/bin/php
<?php 
require ('../connect.php');
session_start();
 $username=$_SESSION['username'];
?>

<html><head><title>PHP Test</title></head>
<body>

<h2>Search</h2>

<?php
	$stid = oci_parse($connection, 'SELECT * FROM (SELECT * FROM BOOKS ORDER BY YEAR_OF_PUBLICATION) WHERE ROWNUM <= 5'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
	oci_execute($stid);
  	while($row = oci_fetch_array($stid))
  	{
  		echo $row;
	}
?>
<?php
oci_close($connection);
?>

</body></html>
