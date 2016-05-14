<?php
//include('session.php');
session_start();
$login_session =$_SESSION['claim_user'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: client login.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html> 
<html>
<head>
<title>Claimant Dashboard</title>
<!--<link href="style.css" rel="stylesheet" type="text/css">-->
<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<div id="profile">
<b id="welcome">Welcome : <i><?php //echo $login_session ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>-->

<header>
CLAIMANT DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session ?><span>
<span><a href="logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">
	<p id="item"><a href="register_claim.php" id="link" >Register Claim</a></p>
	<p id="item"><a href="view claim status.php" id="link" >View Claim Status</a></p>
	<p id="item"><a href="update claim.php" id="link" >Update Claim Details</a></p>
	<p id="item"><a href="delete claim.php" id="link" >Delete Claim</a></p>

</div>

<!--<nav id="data1">View  claim
</nav>-->
<iframe src="view claim.php" id="frame" name="frame" frameborder="no"> </iframe>

</body>
</html>