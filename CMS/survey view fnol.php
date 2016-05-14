<?php
//include('session.php');
session_start();
$login_session =$_SESSION['survey_user'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: survey login.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Survey Dashboard</title>

<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
SURVEY DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session;  ?><span>
<span><a href="survey logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">	
	<p id="item"><a href="#" id="link" >View Assigned FNOL</a></p>	
	<p id="item"><a href="submit report.php" id="link" >Submit Report</a></p>
</div>


<iframe src="survey fnol.php" id="frame" name="frame" frameborder="no"> </iframe>

</body>
</html>