#!/usr/local/bin/php
<?php 
require ('../connect.php');
include ('functions.php');
session_start();
$username=$_SESSION['username'];
echo $username;
if(!isset($_SESSION['username']) || !is_admin($username, $connection)){
	header('Location: login.php?msg=2');
}
?>

<html><head><title>PHP Test</title></head>
<body>

<h2>Search</h2>
<table CELLSPACING=5>
    <tr> 
    <form method="post" action="<?=$PHP_SELF?>">
        <td>Seach for Book:</td>
        <td>
        <Select NAME="field" width="120" style="width: 120px">
            <Option VALUE="Title">Title</option>
            <Option VALUE="Author">Author</option>
            <Option VALUE="ISBN">ISBN</option>
            <Option VALUE="Year_Of_Publication">Year Published</option>
        </Select>
        </td>
        <td><input type="text" name="find" width="180" style="width: 180px"/></td>
        <input type="hidden" name="searching" value="Books" />
        <td><input type="submit"  /></td>
    </form>
    </tr>
    <tr>
    <form method="post" action="<?=$PHP_SELF?>">
        <td>Seach for User: </td>
        <td>
        <Select NAME="field" width="120" style="width: 120px">
            <Option VALUE="User_ID">Username</option>
            <Option VALUE="Location">Location</option>
            <Option VALUE="Age">Age</option>
        </Select>
        </td>
        <td> <input type="text" name="find" width="180" style="width: 180px"/></td>
        <input type="hidden" name="searching" value="Users" />
        <td><input type="submit"  /></td> 
    </form>
    </tr>
	<tr>
 	<form method="post" action="<?=$PHP_SELF?>">
 		<td>Seach for Rating: </td>
 		<td>
        <Select NAME="field" width="120" style="width: 120px">
 				<Option VALUE="User_ID">Username</option>
 				<Option VALUE="ISBN">ISBN</option>
 				<Option VALUE="Book_Rating">Book Rating</option>
 		</Select>
        </td>
 		<td><input type="text" name="find" width="180" style="width: 180px"/></td>
 		<input type="hidden" name="searching" value="Ratings" />
 		<td><input type="submit"  /></td>
	</form> 
	</tr>
</table>

<p>
<form method="post" action="<?=$PHP_SELF?>">
Enter SQL Command: <br><textarea cols="65" rows="5" name="my_query">
SELECT [] FROM [] WHERE [] GROUP BY [] HAVING [] ORDER BY []
UPDATE [] SET [] WHERE []
ALTER TABLE [] {ADD, MODIFY, DROP, RENAME...} </textarea><br>
<input type="hidden" name="searching" value="Query" />
<input type="submit"  />
</form> 


<?php 
$my_query = $_POST["my_query"];
$find = $_POST["find"];
$field = $_POST["field"];
$searching = $_POST["searching"]; 


if ($searching == "Books" 
	|| $searching == "Users" 
	|| $searching == "Ratings"
	|| $searching == "Query"
	) { 
		$find = strtoupper($find); 
		$find = strip_tags($find); 
		$find = trim ($find); 
	
		if ($find == "" && $my_query == "") { 
			echo "<p>You forgot to enter a search term"; 
			exit; 
		} 
	
		$stid_count = 0;
	
		if($searching == "Query"){
			$query = "$my_query";
			$stid_count = oci_parse($connection, "SELECT COUNT(*) FROM ($query)");
		}
		else{
			$query = "SELECT * FROM $searching WHERE UPPER($field) LIKE '%$find%'";
			$stid_count = oci_parse($connection, "SELECT COUNT(*) FROM ($query)");
			$query .= " AND ROWNUM <= 1000";
		}
	
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
}
oci_close($connection);

?>

</body></html>


