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
<html>
<head>
	<link href="dashboard1.css" rel="stylesheet" type="text/css">
</head>

<body>

	<h2>View Assigned FNOL's</h2>
<br>

<?php

	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));	

	$sql="select f.fnol_id,f.policy_id,f.lob,c.claimant_id,c.name,c.phone_no,c.email,c.address from claimant_det c,fnol f where f.survey_id='$login_session_id' and f.policy_id=c.policy_id and f.report IS NULL order by f.time_stamp desc";
	$query=mysqli_query($con,$sql);

	$rows = mysqli_num_rows($query);

	if($rows==0)
		{
		echo '<p id="msg">No FNOL\'s Assigned !<p>';
		}

	else if($rows>0)
		{
			echo "<table> <tr>";
		echo "<th>FNOL Id</th> <th>Policy Id</th> <th>LOB</th> <th>Claimant Id</th> <th>Name</th> <th>Phone</th> <th>Email</th> <th>Address</th>";
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
				echo $row['claimant_id'];
				echo "</td>";

				echo '<td>';
				echo $row['name'];
				echo "</td>";

				echo '<td>';
				echo $row['phone_no'];
				echo "</td>";

				echo '<td width="100">';
				echo $row['email'];
				echo "</td>";

				echo '<td >';
				echo $row['address'];
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