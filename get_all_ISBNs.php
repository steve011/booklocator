#!/usr/local/bin/php
<?php require ('../connect.php'); ?> 

<?php
$stid = oci_parse($connection, 'SELECT ISBN FROM Books');
oci_execute($stid);

$myfile = fopen("ISBNs.txt", "w") or die("Unable to open file!");

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    fwrite($myfile, $row[0]."\n");
}

fclose($myfile);
oci_free_statement($stid);
?>

<?php oci_close($connection); ?> 
