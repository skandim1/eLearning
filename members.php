<?php
   session_start();
   $connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server!");
   mysql_select_db("members") or die("Cannot connect to database!");
   
   $query = mysql_query("SELECT * FROM users");
   
   $numrows = mysql_num_rows($query);
?>
<html>
	<head>
		<title>Members</title>
		<link rel="stylesheet" href="exam.css">
	</head>
	<body>
		<nav></nav>
		<div class="container">
		<h3>Users Listing</h3><hr>
		<div class="result">
			<table>
				<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th></tr>
				<?php 
				if($numrows > 0) {
					while($row = mysql_fetch_assoc($query)) {
						$dbf_name = $row['firstname'];
						$dbl_name = $row['lastname'];
						$dbu_name = $row['username'];
						$db_gender = $row['gender'];
						echo '<tr>' . '<td>' . $dbf_name . '</td>' . '<td>' . $dbl_name . '</td>' . '<td>' . $dbu_name . '</td>' . '<td>' . $db_gender . '</td>' . '</tr>';
					}				
				}
				?>
			</table>
		</div>
		</div>
	</body>
</html>