<?php
//include('session.php');
session_start();
$login_session =$_SESSION['login_user'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: CSR login.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>
<head>
<title>CSR Dashboard</title>
<!--<link href="style.css" rel="stylesheet" type="text/css">-->
<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<div id="profile">
<b id="welcome">Welcome : <i><?php //echo $login_session ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>-->

<header>
CSR DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session ?><span>
<span><a href="csr logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">
	<p id="item"><a href="register_claim1.php" id="link" >Register Claim</a></p>
	<p id="item"><a href="view fnol.php" id="link" >View FNOL</a></p>
</div>


<iframe src="view fnol.php" id="frame" name="frame" frameborder="no"> </iframe>

</body>
</html>