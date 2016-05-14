<?php
session_start(); // Starting Session
//$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
//if (empty($_POST['username']) || empty($_POST['password'])) {
//$error = "Username or Password is invalid";
//else
{
// Define $username and $password
$claimid=$_POST['claimant_id'];
$password=$_POST['pwd'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root","abc123","cms");

if(!$connection) 
die (mysqli_connect_error($connection));
// To protect MySQL injection for Security purpose
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);
// Selecting Database
//$db = mysqli_select_db("test", $connection);
// SQL query to fetch information of registerd users and finds user match.
$sql = "select * from clientlogin where claimant_id='$claimid'";
$query = mysqli_query($connection,$sql);// or die("Unable to execute query ".mysqli_errno($connection));
$rows = mysqli_num_rows($query);
if ($rows==1) {

	while($row=mysqli_fetch_assoc($query))
	{
		if($row['pwd']==$password)
		{
			$_SESSION['claim_user']=$row['name'];// Initializing Session
			$_SESSION['claim_id']=$row['claimant_id'];
			header("location: view claim status.php"); // Redirecting To Other Page
		}

	}
	

}  
//else {
//$error = "Username or Password is invalid";
	else if($rows==0)
	{
		echo (" <script language='JavaScript'>
			window.alert('Claimant Id is invalid')
			window.location.href='client login.php';
			</script>");	
	}
	echo (" <script language='JavaScript'>
			window.alert('Password is invalid')
			window.location.href='client login.php';
			</script>");

	//header("location :index.php");
//}
mysqli_close($connection); // Closing Connection
}
}
else
header('client login.php');
?>