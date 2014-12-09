#!/usr/local/bin/php
<?php 
require ('../connect.php');
session_start();


			//echo '<h1>', $_GET['Product'], '</h1>';
			//echo '<h1>', $_SESSION["product"], '</h1>';
			//print_r($_SESSION);
?>

<!DOCTYPE html>
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
		<div class="container">
			<div class="row" style="">
			<?php

			$row = $_SESSION[$_GET['Product']];
				echo '<div class="col-xs-4" style="height:440px;padding-top:20px;float:left;">';
					echo '<img src="' .htmlentities($row["IMAGE_URL_L"]). '"style="padding-top:25px;padding-bottom:35px;width:100%;">';
			?>
				</div>
				<div class="col-xs-8" style="height:490px;background-color:red;padding-top:20px;float:right;">
					<div class="col-xs-12" style="height:450px;background-color:magenta;">
						<h2 style="text-align:center;"><?php echo $row['TITLE']; ?></h2>
						<h4 style="text-align:center;">By: <?php echo $row['AUTHOR'];?></h4>
						<h4 style ="text-align:center;">Genre: <?php echo $row['GENRE'];?></h4>
						<div style="text-align:left;width:100%;color:white;">
						<p>Book Description: </p>
							<p style = "text-align:left;"> <?php echo $row['DESCRIPTION']?></p>
							
							<p>Book Price</p>
							<p style = "text-align: left;">$ <?php echo $row['PRICE']?></p>
							<button class="button add-to-cart">Add To Cart</button>
							<br></br>	
							<span>ISBN: </span>
							<p style = "text-align: left;"><?php echo $row['ISBN']?></p>
							<p style = "text-align: left;">Date published: <?php echo $row['YEAR_OF_PUBLICATION']?></p>
							<p style= "text-align: left;"> Publisher: <?php echo $row['PUBLISHER']?>| Binding: <?php echo $row['BINDING']?>| Pages: <?php echo $row['PAGES']?>| Language: <?php echo $row['LANGUAGE']?></p>
							 
							
							
						</div>
					</div>
				</div>
				<div class="col-xs-12" style="background-color:yellow;height:670px;margin-top:20px;">
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
					<div class="col-xs-12" style="height:100px;background-color:magenta;margin-top:10px;">

					</div>
				</div>
			</div>
		</div>
		<footer style="background-color:black;width:100%; height:200px;margin-top:10px;">
		</footer>
	</body>
</html>

