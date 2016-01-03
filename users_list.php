<?php
	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
	mysql_select_db("members") or die ("Couldn't find database");

	$query = mysql_query("SELECT firstname, lastname, username, date_joined FROM users");
	$numrows = mysql_num_rows($query);

?>

<html>
   <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome Admin</title>
		<link rel="stylesheet" href="exam.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
 		<script src="js/bootstrap.js"></script>
   </head>
   <body>
   		<div class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container">
				<a href = "#/home" class = "navbar-brand">eLearning.com</a>
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<div class = "collapse navbar-collapse navHeaderCollapse">
					<ul class = "nav navbar-nav navbar-right">
						<li class = "active"><a href = "admin.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class = "dropdown">
							<a href = "#socialmedia" class = "dropdown-toggle" data-toggle = "dropdown">Modules <b class="caret"></b></a>
							<ul class = "dropdown-menu">
								<li><a href = "#">Manage Subjects</a>
								<li><a href = "#">Add Subject</a>
							</ul>
						</li>
						<li><a href="users_list.php">Users</a></li>
						<li><a href="exam_results.php">Exam Results</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- <p><?php echo 'Welcome :'.$_SESSION['username'] ?></p>	 -->
			</div>
		</div>
		<div class="container">
			<div class = "row">
				<div class = "col-lg-8 col-lg-offset-2">
					<div class = "panel panel-default">
						<div class = "panel-body">
							<div class = "page-header">
								<h3>Users Listing</h3>
							</div>
							<table>
								<tr><td><b>Name</b></td><td><b>Email</b></td><td><b>Date Joined</b></td></tr>
								<?php 
								if($numrows > 0) {
									while($row = mysql_fetch_assoc($query)) {
										$db_name = $row['firstname'] ." ". $row['lastname'];
										$dbu_name = $row['username'];
										$dbu_date_joined = $row['date_joined'];
										echo '<tr>' . '<td>' . $db_name . '</td>' . '<td>' . $dbu_name . '</td>' . '<td>' . $dbu_date_joined . '</td>' .'</tr>';
									}				
								}
								?>
								<tr><td><b>Name</b></td><td><b>Email</b></td><td><b>Date Joined</b></td></tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>  			
		<div class = "navbar navbar-inverse navbar-static-bottom ">
			<div class = "container">
				<p class = "navbar-text"><span class="glyphicon glyphicon-copyright-mark"></span> Copy Rights reserved
			</div>
		</div>
   </body>

</html>