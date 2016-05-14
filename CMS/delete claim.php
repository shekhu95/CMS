<?php
//include('session.php');
session_start();
$login_session =$_SESSION['claim_user'];
//$login_session_id =$_SESSION['claim_id'];
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

<div id="data1">
	<h2>Delete Claim</h2>
<br>

<form method="POST" action="">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="policy_id">Policy Id </label><input type="number" min="10001" max="99999" name="policy_id" required>
	<span id="req"> *</span><br><br><br>
	<input type="submit" id="submitbtn" value="Submit" name="submitbtn">
</form>
</div>

<?php
/*
if(isset($_POST['submitted']))
{
	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));

	


	$claimid=$_SESSION['claim_id'];
	$policyid=$_POST['policy_id'];


	$sql="delete from claimant_det where";

	$query=mysqli_query($con,$sql);
	if(!$query)
		echo (" <script language='JavaScript'>
			window.alert('Claim Already Registered!')
			window.location.href='register_claim.php';
			</script>");
	else
	{
		$sql1="insert into fnol(policy_id,lob) values('$policyid','$lob')";

		$query1=mysqli_query($con,$sql1);

		echo (" <script language='JavaScript'>
			window.alert('Claim Succesfully Registered!')
			window.location.href='view claim status.php';
			</script>");
	}
}
*/
?>
</body>
</html>