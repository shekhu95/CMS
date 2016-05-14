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
<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
CSR DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session ?><span>
<span><a href="csr logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">
	<p id="item"><a href="register_claim1.php" id="link" >Register Claim</a></p>
	<p id="item"><a href="view fnol status.php" id="link" >View Claim Status</a></p>
</div>

<div id="data1">
	<h2>Register claim</h2>
<br>

<form method="POST" action="register_claim1.php">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="name">Name</label><input type="text" name="name1" maxlength="25" required><span id="req"> *</span><br><br>
	<label for="claimant_id">Claimant Id </label><input type="number" min="1001" max="9999" name="claimant_id" required><span id="req"> *</span><br><br>
	<label for="policy_id">Policy Id </label><input type="number" min="10001" max="99999" name="policy_id" ><span id="req"> *</span><br><br>
	<label for="phone_no">Phone No</label><input type="tel" name="phone_no" maxlength="10"><span id="req"> *</span><br><br>
	<label for="email">Email Id</label><input type="email" name="email"><span id="req"> *</span><br><br>
	<label for="address">Address</label><input type="text" name="address"><span id="req"> *</span><br><br><br>
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
	$claimid=$_POST['claimant_id'];
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

	$sql="insert into claimant_det(name,claimant_id,policy_id,phone_no,email,address) values('$name','$claimid','$policyid','$phone','$email','$adrs')";

	$query=mysqli_query($con,$sql);
	if(!$query)
		echo (" <script language='JavaScript'>
			window.alert('Claim Already Registered !')
			window.location.href='register_claim1.php';
			</script>");	

	else
	{
		$sql1="insert into fnol(policy_id,lob) values('$policyid','$lob')";
		$query1=mysqli_query($con,$sql1);

		echo (" <script language='JavaScript'>
			window.alert('Claim Succesfully Registered !')
			window.location.href='register_claim1.php';
			</script>");
	}
}
?>
</body>
</html>