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

<div id="data1">
	<h2>Register Claim</h2>
<br>

<form method="POST" action="register_claim.php">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="name">Name</label><input type="text" name="name1" maxlength="25" required><span id="req"> *</span><br><br>
	<!--<label for="claimant_id">Claimant Id </label><input type="number" min="1001" max="9990" disabled><span id="req"> </span><br><br>-->
	<label for="policy_id">Policy Id </label><input type="number" min="10001" max="99999" name="policy_id" required><span id="req"> *</span><br><br>
	<label for="phone_no">Phone No</label><input type="tel" name="phone_no" pattern="[1-9][0-9]{9}" maxlength="10"   
	title="Please enter valid 10 digit phone number" required><span id="req"> *</span><br><br>
	<label for="email">Email Id</label><input type="email" name="email" required><span id="req"> *</span><br><br>
	<label for="address">Address</label><textarea name="address" rows="5" columns="5" id="comment" required> </textarea><span id="req1"> *</span><br><br><br>
	<input type="submit" id="submitbtn" value="Submit" name="submitbtn">
</form>
</div>

<?php
if(isset($_POST['submitted']))
{
	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));

	


	$name=$_POST['name1'];
	$claimid=$_SESSION['claim_id'];
	$policyid=$_POST['policy_id'];
	$phone=$_POST['phone_no'];
	$email=$_POST['email'];
	$adrs=$_POST['address'];

	if($policyid<=20000)
		$lob="Automobile";

	else if($policyid>20000 && $policyid<=30000)
		$lob="Property";

	else if($policyid>30000 && $policyid<=40000)
		$lob="Life";
	else
		$lob="House";

	/*$sql1="select * from claimant_det where claimant_id='$claimid' and policy_id='$policyid'";
	$query=mysqli_query($con,$sql1);

	$rows=mysqli_num_rows($query);
	if($rows!=0)
		echo (" <script language='JavaScript'>
			window.alert('Claim Already Registered !')
			window.location.href='profile.php';
			</script>");
	else
	{*/


	$sql="insert into claimant_det(claimant_id,name,policy_id,phone_no,email,address) values('$claimid','$name','$policyid','$phone','$email','$adrs')";

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
?>
</body>
</html>