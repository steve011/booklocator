#!/usr/local/bin/php
<?php 
require ('../connect.php');
session_start();
 $username=$_SESSION['username'];
?>

<html><head><title>PHP Test</title></head>
<body>

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
						<?php 
 						$username=$_SESSION['username'];
						if($_SESSION['username'])
						{
						echo '<p style="position:relative;left:0px;bottom:-45px;">';
						echo $_SESSION['username'];
						echo '</p>';
						echo '<a href="index.php" style="cursor:pointer;position:relative;left:95%;bottom:-15px;" onclick="';
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
		<br></br>
<div class="container">
<div class="row">
<div class="col-xs-4">
<h2>Users By Location</h2>
<?php
	$stid = oci_parse($connection, 'SELECT location, COUNT(*) FROM USERS GROUP BY location ORDER BY COUNT(*) DESC'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
	oci_execute($stid);
  	while($row = oci_fetch_array($stid))
  	{
  		echo $row['COUNT(*)'];
  		echo "   :   ";
  		echo $row['LOCATION'];
  		echo '<br></br>';
	}
?>
</div>

<div class="col-xs-4">
<h2>Users By Age</h2>
<?php
	$stid = oci_parse($connection, 'SELECT age, COUNT(*) FROM USERS GROUP By age ORDER BY age DESC'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
	oci_execute($stid);
  	while($row = oci_fetch_array($stid))
  	{
  		if($row['AGE'] != "" && $row['AGE'] < 110){
  		echo $row['COUNT(*)'];
  		echo "   :   ";
  		echo $row['AGE'];
  		echo '<br></br>';}
	}
?>
</div>

<div class="col-xs-4">
<h2>Total Ratings</h2>
<?php
	$stid = oci_parse($connection, 'SELECT COUNT(*), book_rating FROM RATINGS GROUP BY book_rating ORDER BY book_rating DESC'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
	oci_execute($stid);
  	while($row = oci_fetch_array($stid))
  	{
  		echo $row['COUNT(*)'];
  		echo "   :   ";
  		echo $row['BOOK_RATING'];
  		echo '<br></br>';}
?>
</div>

</div></div>
<?php
oci_close($connection);
?>

</body></html>
