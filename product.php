#!/usr/local/bin/php
<?php 
require ('../connect.php');
session_start();
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
			//echo '<h1>', $_GET['Product'], '</h1>';
			
			$row = $_SESSION['Product'];
				echo '<div class="col-xs-4" style="height:440px;padding-top:20px;float:left;">';
					echo '<img src="' .htmlentities($_SESSION["IMAGE_URL_L"]). '"style="height:400px;width:100%;">';
			?>
				</div>
				<div class="col-xs-8" style="height:440px;background-color:red;padding-top:20px;float:right;">
					<div class="col-xs-12" style="height:400px;background-color:magenta;">
						<h2 style="text-align:center;">Product Title</h2>
						<div style="text-align:left;width:100%;color:white;">
							<P>Book Description.</p>
							<p>Altera utroque sea at, discere voluptatum vix in. Suas consequat contentiones vix te, homero recteque vituperatoribus et mel. Mel nulla solet accusam no, pro te antiopam torquatos. Ridens praesent te qui, cu his augue oblique, vel an quidam ocurreret assueverit. Sumo eripuit legendos vim et, tacimates reprehendunt eu qui.

Mei soleat democritum mediocritatem an, saperet ornatus et nec, nulla eirmod scribentur ea mea. Eam in elaboraret comprehensam, et usu facete reprimique. Illud atqui impedit at pro, quo ex soleat intellegam, ea munere explicari consetetur mei. Mei no eirmod legendos praesent. No sit euismod complectitur, movet graeco iudicabit in eos.
							</p>
							<p>Book Price</p>
							<button class="button add-to-cart">Add To Cart</button>
							<br></br>	
							<span>Book Rating: ***00</span>
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

