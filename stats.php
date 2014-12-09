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
$my_query = 'SELECT location,  COUNT(*) FROM USERS GROUP BY location;SELECT location,  COUNT(*) FROM USERS GROUP BY location';

		$stid_count = 0;
		 $query = $my_query;
		$stid_count = oci_parse($connection, $query);
		$query .= " AND ROWNUM <= 1000";
	
		echo "<h2>Results</h2><p>"; 
		
		echo "<h4>$query</h4><p>";
	
		print '<table border="1">';
	
		$stid = oci_parse($connection, "$query");
	
		if(oci_execute($stid)){	
			print '<tr>';
			echo "<p><b> Results found: "; 
			oci_execute($stid_count);
			$count = current(oci_fetch_array($stid_count, OCI_RETURN_NULLS+OCI_ASSOC));
			echo "$count</b><p>";
			print '</tr>';
			
			if($count){
				$ncols = oci_num_fields($stid);
				print '<tr>';
				for ($i = 1; $i <= $ncols; $i++) {
					$column_name  = oci_field_name($stid, $i);
					echo "<td><b>$column_name</b></td>";
				}
				print '</tr>';
			}
	
			while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
				print '<tr>';
				foreach ($row as $item) {
						print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
				}
				print '</tr>';
			}
		}
		else{
			echo "<p>Invaid query, please try again.";
		}
		print '</table>';
		oci_free_statement($stid);

oci_close($connection);
?>

</body></html>