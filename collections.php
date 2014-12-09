#!/usr/local/bin/php
<?php 
require ('../connect.php');
include ('functions.php');
session_start();
$username=$_SESSION['username'];
$_SESSION['username'] = $username;
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>

<header>
			<div class="container" style="height:150px;">
				<div class="row" style="">
					<div class="col-xs-8 col-xs-push-2" style="height:100%;background-color:#1ad2ff;z-index:2;border: 3px solid black;border-radius:10px;margin-top:-5px;">
						<h1 style="font-family:cursive;font-weight:bold;text-align:center;font-style:italic;margin-top:25px;letter-spacing:2px;color:white">BOOK LOCATOR</h1>
						<a style="top:-60px;left:0px;position:relative;color:white;" href="stats.php">Statistics</a>
						<?php 
 						$username=$_SESSION['username'];
						if($_SESSION['username'])
						{
						echo '<p style="position:relative;left:0px;bottom:-25px;">';
						echo $_SESSION['username'];
						echo '</p>';
						echo '<a href="index.php" style="cursor:pointer;position:relative;left:95%;bottom:5px;" onclick="';
						unset($_SESSION['username']);
						echo '">Logout</a>';
						}
						?>
					</div>
				</div>
				<Div class="row">
					<div class="col-xs-6 col-xs-push-3 menu-bar" style="background-color:#ff471a;z-index:1;">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="collections.php">Store<a></li>
								<li><a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Search</a></li>
								<li><a href="http://cise.ufl.edu/~sw5/Book_Locator/adminer.php?oracle=oracle.cise.ufl.edu%2Forcl&username=sw5&db=CISETS&ns=SW5">Support</a></li>
								<li><a href="login.php">Login</a></li>
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
</div></div></div>

<div class="container" style="margin-top:20px;">
	<div class="row" style="">

<?php 
$my_query = $_POST["my_query"];
$find = $_POST["find"];
$field = $_POST["field"];
$searching = $_POST["searching"]; 
if ($searching == "Books") 
{ 
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
  					while($row = oci_fetch_array($stid))
  					{
  					display_book($row, $connection);
					/*
  					echo '<div class="col-xs-2" style="height:300px;margin:19.5px;background-image:url("");background-size:100% 100%;>';
  					echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
					echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
					echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
					echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
					echo '<p style="font-size:12px;text-align:center;">$'.htmlentities($row["PRICE"]).'</p>';
					echo '</div></div>';
					*/
					}
			}
		}
		else{
			echo "<p>Invaid query, please try again.";
		}
		oci_free_statement($stid);
}
oci_close($connection);
?>



</body></html>
