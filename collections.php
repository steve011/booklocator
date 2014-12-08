#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="container" style="margin-top:20px;">
<div class="row">
<div class="col-xs-8 col-xs-push-2">
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
</div></div></div>

<?php 
$my_query = $_POST["my_query"];
$find = $_POST["find"];
$field = $_POST["field"];
$searching = $_POST["searching"]; 
if ($searching == "Books"
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




	<body>
		<header>
			<div class="container" style="height:150px;">
				<div class="row" style="">
					<div class="col-xs-8 col-xs-push-2" style="height:100%;background-color:#1ad2ff;z-index:2;border: 3px solid black;border-radius:10px;margin-top:-5px;">
						<img style="float:left;" src="book-logo.jpg" style="margin-top:10%;width:100%:height:auto;">
						<h1 style="font-family:cursive;font-weight:bold;text-align:center;font-style:italic;margin-top:25px;letter-spacing:2px;color:white">BOOK LOCATOR</h1>
					</div>
				</div>
				<Div class="row">
					<div class="col-xs-6 col-xs-push-3 menu-bar" style="background-color:#ff471a;z-index:1;">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="collections.php">Store<a></li>
								<li><a href="#">Search</a></li>
								<li><a href="admin.php">Support</a></li>
							</ul>
					</div>
				</div>
			</div>
		</header>
		
		
		
<div class="container" style="margin-top:20px;">
<div class="row">
<div class="col-xs-8 col-xs-push-2">
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
</div></div></div>

<?php 
$my_query = $_POST["my_query"];
$find = $_POST["find"];
$field = $_POST["field"];
$searching = $_POST["searching"]; 
if ($searching == "Books"
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
		$stid = oci_parse($connection, "$query");
	
		if(oci_execute($stid)){	
			oci_execute($stid_count);
			$count = current(oci_fetch_array($stid_count, OCI_RETURN_NULLS+OCI_ASSOC));
			while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
				foreach ($row as $item) {
  					echo '<div class="col-xs-2" style="height:300px;margin:19.5px;background-image:url("");background-size:100% 100%;>';
  					echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
					echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
					echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
					echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
					echo '</div></div>';
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

	
		
		
		<
