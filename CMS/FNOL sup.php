<?php
include('sup_login.php'); // Includes Login Script
?>
<!doctype html>
<html>
<head>
<title>FNOL Supervisor Login</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="homepage.css">
</head>
<body>

<header>
	<a href="CMS.html">
	<img src="home.png" height="48" width="55" style="margin-left:17%;margin-top:1px;float:left;">
	</a>
	<center>
	<nav id="menu">
	<ul>
	
		<li><a href="#" >TOUR</a></li>
		<li><a href="#" >ABOUT</a></li>
		<li><a href="contact.html" >CONTACT</a></li>
		<li><a href="#">LOGIN</a>
			<ul>
				<li><a href="client login.php">Claimant Login</a></li>
				<li><a href="CSR login.php">CSR Login</a></li>
				<li><a href="FNOL sup.php">FNOL Sup. Login</a></li>
				<li><a href="survey login.php">Survey Login</a></li>
			</ul>	
		</li>	
	</ul>
	</nav>
</center>
</header>



<div id="content">
	<img src="2.png" id="login-logo">
	<p style="font-size:2em;font-weight:bold;margin-bottom:40px;">FNOL Supervisor Login</p>
	<form method="POST">
		<p><input type="number" placeholder="FNOL SUP ID" name="sup_id" min="1001" max="9999" required></p>
		<p><input type="password" placeholder="PASSWORD" name="pwd" required></p>
		<p><input type="submit" value="Login" id="submitbtn" name="submit"></p>
	</form>
	<p><a href="#">Forgot Password ?</a></p>

</div>
</body>
</html>