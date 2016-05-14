<?php
session_start(); // Starting Session
//$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
//if (empty($_POST['username']) || empty($_POST['password'])) {
//$error = "Username or Password is invalid";
//else
{
// Define $username and $password
$surveyid=$_POST['survey_id'];
$password=$_POST['pwd'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root","abc123","cms");

if(!$connection) 
die (mysqli_connect_error($connection));

$sql = "select * from surveylogin where survey_id='$surveyid'";
$query = mysqli_query($connection,$sql);// or die("Unable to execute query ".mysqli_errno($connection));
$rows = mysqli_num_rows($query);
if ($rows==1) {

	while($row=mysqli_fetch_assoc($query))
	{
		if($row['pwd']==$password)
		{
			$_SESSION['survey_user']=$row['name'];// Initializing Session
			$_SESSION['survey_id']=$row['survey_id'];
			header("location: survey view fnol.php"); // Redirecting To Other Page
		}

	}
	

}  
//else {
//$error = "Username or Password is invalid";
	else if($rows==0)
	{
		echo (" <script language='JavaScript'>
			window.alert('Survey Id is invalid')
			window.location.href='survey login.php';
			</script>");	
	}
	echo (" <script language='JavaScript'>
			window.alert('Password is invalid')
			window.location.href='survey login.php';
			</script>");

	//header("location :index.php");
//}
mysqli_close($connection); // Closing Connection
}
}
else
header('survey login.php');
?>