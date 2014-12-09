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
		<div class="container">
		  <div class="row">
		     <?php
     if (isset($_GET['msg']) && $_GET['msg'] == 1) {
          echo '<p><strong>Your username and/or password could not be matched to a valid user account</strong></p>';
     }
     ?>
     <form name="form1" method="post" action="checklogin.php">
     <p>
          <label>
          <br></br>
               User Name
               <input type="text" name="username" id="user">
          </label>
     </p>
     <p>
          <label>
               Password
               <input type="password" name="password" id="password">
          </label>
          <label>
          
               Remember Me:
               
               <input type="checkbox" name="rememberme" value="1"<br></br>><br>
          </label>
          <label>
          <br></br>
          <input type="submit" name="submit" id="button" value="Login">
          </label>
     </p>
     </form>

		  </div>
		</div>
<?php 
oci_close($connection);
?>
		</body>
		</html>

