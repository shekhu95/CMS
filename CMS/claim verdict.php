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
	<h2>Claim Verdict</h2>
<br>

<form method="POST" action="claim verdict.php">
	<br>
	<input type="hidden" name="submitted" value="true">
	<label for="fnol_id">FNOL Id</label><input type="number" name="fnol_id" min="1001" max="9999"required><span id="req"> *</span><br><br>
	<label for="status">Verdict</label>
	<select name="status" required>
	  <option value="approved">Approved</option>
	  <option value="rejected" selected>Rejected</option>
	  </select><br><br>
	<label for="comments">Comments</label>
	<textarea name="comments" rows="5" columns="5" id="comment"> </textarea><span id="req1"> *</span> <br><br>
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
	$status=$_POST['status'];
	$comments=$_POST['comments'];

	
			$sql3="select * from fnol where fnol_id='$fnolid'";
			$query3=mysqli_query($con,$sql3);
			$rows=mysqli_num_rows($query3);

			if($rows==1)	
				{	
					
						$sql1="update fnol set status='$status',state='close',comments='$comments' where fnol_id='$fnolid'";
						$query1=mysqli_query($con,$sql1);
						echo (" <script language='JavaScript'>
							window.alert('Claim Verdict Assigned !')
							window.location.href='claim verdict.php';
							</script>");
					
				}//end fnol check
				else
				echo (" <script language='JavaScript'>
					window.alert('FNOL Does Not Exist !')
					window.location.href='claim verdict.php';
					</script>");
		
}//end isset

?>
</body>
</html>