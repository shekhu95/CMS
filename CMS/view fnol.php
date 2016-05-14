<?php
//include('session.php');
session_start();
$login_session =$_SESSION['login_user'];
//$login_session_id =$_SESSION['login_id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: CSR login.php'); // Redirecting To Home Page
}
?>
<html>
<head>
	<link href="dashboard1.css" rel="stylesheet" type="text/css">
</head>

<body>

	<h2>View Claim Status</h2>
<br>

<?php

	$con = mysqli_connect("localhost", "root","abc123","cms");
	if(!$con)
		die("Could not connect to database ".mysqli_connect_error($con));	

	//$sql="select * from fnol order by time_stamp desc";
	$sql="select c.policy_id,c.phone_no,c.email,c.name,f.lob,c.state,f.status,f.comments from claimant_det c, fnol f where c.policy_id=f.policy_id order by c.state";
	$query=mysqli_query($con,$sql);

	$rows = mysqli_num_rows($query);

	if($rows==0)
		{/*echo (" <script language='JavaScript'>
			window.alert('No Claims Registered !');
			</script>");

		header('profile.php');*/
		echo '<p id="msg">No Claims Registered !<p>';
		}

	else if($rows>0)
		{
			echo "<table> <tr>";
		//echo "<th>FNOL_Id</th> <th>Policy_Id</th> <th>LOB</th> <th>State</th> <th>Status</th>";
			echo "<th>Policy Id</th> <th>Name</th> <th>Phone</th> <th>Email Id</th> <th>LOB</th> <th>State</th> <th>Status</th> <th>Verdict</th>";
		echo "</tr>";
			while($row=mysqli_fetch_assoc($query))
			{			
			
				echo "<tr><td>";
				echo $row['policy_id'];
				echo "</td>";

				echo "<td>";
				echo $row['name'];
				echo "</td>";

				echo "<td>";
				echo $row['phone_no'];
				echo "</td>";

				echo "<td width='200'>";
				echo $row['email'];
				echo "</td>";

				echo "<td>";
				echo $row['lob'];
				echo "</td>";

				echo '<td>';
				echo $row['state'];
				echo "</td>";

				echo '<td width="150">';
				echo $row['status'];
				echo "</td>";

				echo "<td>";
				echo $row['comments'];
				echo "</td> </tr>";

			}
			echo "</table>";

		}
?>
</body>
</html>