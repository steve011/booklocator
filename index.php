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
						<img style="float:left;" src="book-logo.jpg" style="margin-top:10%;width:100%:height:auto;">
						<h1 style="font-family:cursive;font-weight:bold;text-align:center;font-style:italic;margin-top:25px;letter-spacing:2px;color:white">BOOK LOCATOR</h1>
					</div>
				</div>
				<Div class="row">
					<div class="col-xs-6 col-xs-push-3 menu-bar" style="background-color:#ff471a;z-index:1;">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="collections.html">Store<a></li>
								<li><a href="#">Search</a></li>
								<li><a href="#">Support</a></li>
							</ul>
					</div>
				</div>
			</div>
		</header>
		<div class="container" style="margin-top:20px;">
			<div class="row" style="background-color:#ffcc00;">
					<h1 style="text-align:center;">New Arrivals</h1>
					<div class="col-xs-2" style="height:300px;background-color:#ff004d;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#ff004d;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#ff004d;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#ff004d;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#ff004d;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
			</div>	
		</div>
		<div class="container" style="margin-top:20px;">
			<div class="row" style="background-color:#ff3300;">
					<h1 style="text-align:center;">Categories</h1>
					<div class="col-xs-2" style="height:300px;background-color:#00ccff;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#00ccff;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#00ccff;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#00ccff;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
					<div class="col-xs-2" style="height:300px;background-color:#00ccff;margin:19.5px;">
						<div style="height:250px;width:100%;"></div>
						<div style="height:50px;width:100%;text-align:center;color:white;border-top:1px solid black;">
							<p>Product Name</p>
							<p>{{ Price }}</p>
						</div>
					</div>
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

