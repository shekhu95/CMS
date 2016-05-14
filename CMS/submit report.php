<?php
//include('session.php');
session_start();
$login_session =$_SESSION['survey_user'];
$login_session_id =$_SESSION['survey_id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: survey login.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Survey Dashboard</title>
<!--<link href="style.css" rel="stylesheet" type="text/css">-->
<link href="dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
SURVEY DASHBOARD
</header>

<div id="hi">
<span style="margin-left:60px;">Welcome <?php echo $login_session ?><span>
<span><a href="survey logout.php" id="logout">Log Out</a></span>
</div> 

<div id="menu">
	<p id="item"><a href="survey view fnol.php" id="link" >View Assigned FNOL</a></p>	
	<p id="item"><a href="submit report.php" id="link" >Submit Report</a></p>
</div>

<div id="data1">
	<h2>Submit Report</h2>
<br>

<form method="POST" action="submit report.php">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="fnol_id">FNOL Id</label><input type="number" name="fnol_id" min="1001" max="9999"required><span id="req"> *</span><br><br>
	<!--<label for="status">Verdict</label>
	<select name="status" required>
	  <option value="approved">Approved</option>
	  <option value="rejected" selected>Rejected</option>
	  </select><span id="req"> *</span><br><br>-->
	<label for="report">Report</label>
	<textarea name="report" rows="5" columns="5" id="comment"> </textarea><span id="req1"> *</span> <br><br>
	<br>
	<input type="submit" id="submitbtn" value="Submit" name="submitbtn">
</form>
</div>

<?php
if(isset($_POST['submitted']))
{
	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));

	
	$fnolid=$_POST['fnol_id'];
	$report=$_POST['report'];

	
			$sql3="select * from fnol where fnol_id='$fnolid'";
			$query3=mysqli_query($con,$sql3);
			$rows=mysqli_num_rows($query3);

			if($rows==1)	
				{	
					
	$sql1="update fnol set report='$report' where fnol_id='$fnolid' and survey_id='$login_session_id' and state='open'";
						$query1=mysqli_query($con,$sql1);
						echo (" <script language='JavaScript'>
							window.alert('Report Submitted Successfully !')
							window.location.href='survey view fnol.php';
							</script>");
					
				}//end fnol check
				else
				echo (" <script language='JavaScript'>
					window.alert('FNOL Does Not Exist !')
					window.location.href='submit report.php';
					</script>");
		
}//end isset

?>
</body>
</html>