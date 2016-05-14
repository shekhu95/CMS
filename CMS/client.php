<?php
if(isset($_POST['submit']))
{

$con=mysqli_connect("localhost","root","abc123","CMS");

if(!$con)
	die(mysqli_connect_error($con));

$name=$_POST['name'];
$pwd=$_POST['pwd'];

$sql="select * from clientdet where name='$name' and pwd='$pwd'";

$query=mysqli_query($con,$sql) or die(mysql_error($con));

$c=mysqli_num_rows($query);

if($c==1)
	echo "Successful Login";

else
	echo "Unsuccessful";


}
?>