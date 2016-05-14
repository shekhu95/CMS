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
<!--<link href="style.css" rel="stylesheet" type="text/css">-->
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
	<p id="item"><a href="sup view fnol.php" id="link" >View FNOL</a></p>
	<p id="item"><a href="claim verdict.php" id="link" >Claim Verdict</a></p>
</div>

<div id="data1">
	<h2>Assign FNOL To Survey</h2>
<br>

<form method="POST" action="assign fnol.php">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="fnol_id">FNOL Id</label><input type="number" name="fnol_id" min="1001" max="9999"required><span id="req"> *</span><br><br>
	<label for="survey_id">Survey Id </label><input type="number" min="1001" max="9999" name="survey_id" required><span id="req"> *</span><br><br>
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
	$surveyid=$_POST['survey_id'];

	$sql2="select * from surveylogin where survey_id='$surveyid'";
	$query2=mysqli_query($con,$sql2);
	$rows=mysqli_num_rows($query2);
			
	if($rows==1)	
		{
			$sql3="select * from fnol where fnol_id='$fnolid'";
			$query3=mysqli_query($con,$sql3);
			$rows=mysqli_num_rows($query3);

			if($rows==1)	
				{	
					$sql="select * from fnol where fnol_id='$fnolid' and survey_id!='NULL'";
					$query=mysqli_query($con,$sql);

					$rows=mysqli_num_rows($query);
					if($rows==1)
						echo (" <script language='JavaScript'>
							window.alert('FNOL Already Assigned !')
							window.location.href='assign fnol.php';
							</script>");

					else if($rows==0)
					{
						$sql1="update fnol set survey_id='$surveyid',status='assigned to survey' where fnol_id='$fnolid'";
						$query1=mysqli_query($con,$sql1);
						echo (" <script language='JavaScript'>
							window.alert('FNOL Successfully Assigned !')
							window.location.href='assign fnol.php';
							</script>");
					}
				}//end fnol check
				else
				echo (" <script language='JavaScript'>
					window.alert('FNOL Does Not Exist !')
					window.location.href='assign fnol.php';
					</script>");
		}//end survey check
	else
		echo (" <script language='JavaScript'>
				window.alert('Survey Id Does Not Exist !')
				window.location.href='assign fnol.php';
				</script>");

}//end isset

?>
</body>
</html>