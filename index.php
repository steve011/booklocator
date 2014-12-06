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
		<header>
			<div class="container" style="height:150px;">
				<div class="row" style="">
					<div class="col-xs-8 col-xs-push-2" style="height:100%;background-color:#1ad2ff;z-index:2;border: 3px solid black;border-radius:10px;margin-top:-5px;">
						<img style="float:left;" src="http://i.imgur.com/UX50fa2.jpg" style="margin-top:10%;width:100%:height:auto;">
						<h1 style="font-family:cursive;font-weight:bold;text-align:center;font-style:italic;margin-top:25px;letter-spacing:2px;color:white">BOOK LOCATOR</h1>
					</div>
				</div>
				<Div class="row">
					<div class="col-xs-6 col-xs-push-3 menu-bar" style="background-color:#ff471a;z-index:1;">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="collections.html">Store<a></li>
								<li><a href="http://cise.ufl.edu/~sw5/Book_Locator/admin.php">Search</a></li>
								<li><a href="http://cise.ufl.edu/~sw5/Book_Locator/adminer.php?oracle=oracle.cise.ufl.edu%2Forcl&username=sw5&db=CISETS&ns=SW5">Support</a></li>
							</ul>
					</div>
				</div>
			</div>
		</header>
		<br></br>
		<div class="container" style="margin-top:20px;">
			<div class="row" style="">
					<h1 style="text-align:center;">Random Books</h1>
					<?php
					 $stid = oci_parse($connection, 'SELECT * FROM (SELECT * FROM books ORDER BY DBMS_RANDOM.VALUE) WHERE ROWNUM <= 5'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
					 oci_execute($stid);
  					while($row = oci_fetch_array($stid))
  					{
  					echo '<div class="col-xs-2" style="height:300px;margin:19.5px;background-image:url("");background-size:100% 100%;>';
  					echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
					echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
					echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
					echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
					echo '</div></div>';
					}
					 ?>
			</div>	
		</div>
		<div class="container" style="margin-top:20px;">
			<div class="row" style="">
					<h1 style="text-align:center;">Newest Arrivals</h1>
					<?php
					 $stid = oci_parse($connection, 'SELECT * FROM BOOKS WHERE YEAR_OF_PUBLICATION >= 2013 AND ROWNUM <= 5'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
					 oci_execute($stid);
  					while($row = oci_fetch_array($stid))
  					{
  					echo '<div class="col-xs-2" style="height:300px;margin:19.5px;background-image:url("");background-size:100% 100%;>';
  					echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
					echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
					echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
					echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
					echo '</div></div>';
					}
					 ?>
			</div>	
		</div>
		<div class="container" style="margin-top:20px;">
			<div class="row" style="">
					<h1 style="text-align:center;">Highest Rated</h1>
					<?php
					 $stid = oci_parse($connection, 'SELECT * FROM (SELECT ISBN FROM Ratings WHERE book_rating = 10) NATURAL JOIN Books WHERE ROWNUM <= 5'); /* Added "WHERE ROWNUM <= 1000", takes forever to load otherwise */
					 oci_execute($stid);
  					while($row = oci_fetch_array($stid))
  					{
  					echo '<div class="col-xs-2" style="height:300px;margin:19.5px;background-image:url("");background-size:100% 100%;>';
  					echo '<img style="z-index:1;position:absolute;height:250px;width:100%;" src="http://i.imgur.com/pV1XQjk.jpg">';
					echo '<img style="z-index:2;position:relative;height:250px;width:100%;" src="'.htmlentities($row["IMAGE_URL_L"]).'">';
					echo '<div class="width:100%;text-align:center;color:white;border-top:1px solid black;">';
					echo '<p style="font-size:12px;text-align:center;">'.htmlentities($row["TITLE"]).'</p>';
					echo '</div></div>';
					}
					 ?>
			</div>	
		</div>
		<footer>
			<div class="container-fluid;" style="background-color:black;height:200px;margin-top:20px;"></div>
		</footer>
<?php 
oci_close($connection);
?>
		
	</body>
</html>

