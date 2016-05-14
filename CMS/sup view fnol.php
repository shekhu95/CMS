<?php
//include('session.php');
session_start();
$login_session =$_SESSION['sup_user'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: FNOL sup.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>
<head>
<title>FNOL Sup Dashboard</title>

<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
FNOL SUPERVISOR DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session ?><span>
<span><a href="sup logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">
	<p id="item"><a href="assign fnol.php" id="link" >Assign FNOL To Survey</a></p>
	<p id="item"><a href="#" id="link" >View FNOL</a></p>
	<p id="item"><a href="claim verdict.php" id="link" >Claim Verdict</a></p>	
</div>

<div id="data1">
	<ul id="list">
		<li><a href="open fnol.php" id="link">View Open FNOL's</a></li>
			<ul><br>
				<li><a href="open fnol.php" id="link2">Assigned</a></li>
				<li><a href="open fnol.php" id="link2">Unassigned</a></li>
			</ul><br>
		<li><a href="open fnol.php" id="link">View Closed FNOL's</a></li>
	</ul>

</div>
<!--
<iframe src="view fnol.php" id="frame" name="frame" frameborder="no"> </iframe>
-->
</body>
</html>