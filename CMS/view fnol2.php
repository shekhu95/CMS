<?php
//include('session.php');
session_start();
$login_session =$_SESSION['sup_user'];
//$login_session_id =$_SESSION['login_id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: FNOL sup.php'); // Redirecting To Home Page
}
?>
<html>
<head>
	<link href="dashboard1.css" rel="stylesheet" type="text/css">
</head>

<body>

	<h2>Open FNOL's</h2>
<br>

<?php

	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));	

	$sql="select * from fnol where state='open' order by time_stamp desc";
	$query=mysqli_query($con,$sql);

	$rows = mysqli_num_rows($query);

	if($rows==0)
		{/*echo (" <script language='JavaScript'>
			window.alert('No Claims Registered !');
			</script>");

		header('profile.php');*/
		echo '<p id="msg">No FNOL\'s Registered !<p>';
		}

	else if($rows>0)
		{
			echo "<table> <tr>";
		echo "<th>FNOL_Id</th> <th>Policy_Id</th> <th>LOB</th> <th>State</th> <th>Status</th> <th>Survey Id</th>";
		echo "</tr>";
			while($row=mysqli_fetch_assoc($query))
			{			
			
				echo "<tr><td>";
				echo $row['fnol_id'];
				echo "</td>";

				echo "<td>";
				echo $row['policy_id'];
				echo "</td>";

				echo "<td>";
				echo $row['lob'];
				echo "</td>";

				echo "<td>";
				echo $row['state'];
				echo "</td>";

				echo '<td width="200">';
				echo $row['status'];
				echo "</td>";

				echo '<td>';
				echo $row['survey_id'];
				echo "</td></tr>";

				
				//echo "</tr>";
				//echo "</table>";
				//echo "<br>";
				//echo "---------------------------------------------";
				//echo "<br>";
			}
			echo "</table>";

		}
?>
</body>
</html>