#!/usr/local/bin/php
<?php require ('../connect.php'); ?> 

<?php


$myfile = fopen("ISBNs.txt", "w") or die("Unable to open file!");

$offset = 0;
$numrows = 25000;

while($offset <= 231910){
	$sql = 'SELECT ISBN FROM Books';

	$sql = "SELECT * FROM (SELECT a.*, ROWNUM AS my_rnum
						   FROM ($sql) a
						   WHERE ROWNUM <= :offset + :numrows)
			WHERE my_rnum > :offset";


	$stid = oci_parse($connection, $sql);
	oci_bind_by_name($stid, ':numrows', $numrows);
	oci_bind_by_name($stid, ':offset', $offset);
	oci_execute($stid);

	while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
		for($i = 0; $i < 10; $i++){
			if($row){
				fwrite($myfile, $row[0]." ");
				$row = oci_fetch_array($stid);
			}else{
				break;
			}
		}
		fwrite($myfile, "\n");
	}
	$offset += 25000;
	$numrow += 25000;
	echo "Completed ".$offset." rows.";
	fclose($myfile);
	$myfile = fopen("ISBNs.txt", "a") or die("Unable to open file!");
	
	echo "Waiting...";
	sleep(15);
	
}

//fclose($myfile);
oci_free_statement($stid);
?>

<?php oci_close($connection); ?> 
