<?php
session_start(); // Starting Session
//$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
//if (empty($_POST['username']) || empty($_POST['password'])) {
//$error = "Username or Password is invalid";
//else
{
// Define $username and $password
$csrid=$_POST['csr_id'];
$password=$_POST['pwd'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root","abc123","cms");

if(!$connection) 
die (mysqli_connect_error($connection));

$sql = "select * from csrlogin where csr_id='$csrid'";
$query = mysqli_query($connection,$sql);// or die("Unable to execute query ".mysqli_errno($connection));
$rows = mysqli_num_rows($query);
if ($rows==1) {

	while($row=mysqli_fetch_assoc($query))
	{
		if($row['pwd']==$password)
		{
			$_SESSION['login_user']=$row['name'];// Initializing Session
			//$_SESSION['login_id']=$row['csr_id'];
			header("location: register_claim1.php"); // Redirecting To Other Page
		}

	}
	

}  
//else {
//$error = "Username or Password is invalid";
	else if($rows==0)
	{
		echo (" <script language='JavaScript'>
			window.alert('CSR Id is invalid')
			window.location.href='CSR login.php';
			</script>");	
	}
	echo (" <script language='JavaScript'>
			window.alert('Password is invalid')
			window.location.href='CSR login.php';
			</script>");

	//header("location :index.php");
//}
mysqli_close($connection); // Closing Connection
}
}
else
header('CSR login.php');
?>