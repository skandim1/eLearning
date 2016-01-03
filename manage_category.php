<?php
	$connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server!");
	mysql_select_db("members") or die("Cannot connect to database!");
	
	function delete_sub($name) {
		mysql_query("delete from subjects where name = '$name'");
	}
	if (isset($_GET['hello'])) {
		delete_sub($_GET['hello']);
	}
	$query = mysql_query("SELECT * FROM subjects");
 
	$numrows = mysql_num_rows($query);
?>
<html>
	<head>
		<link rel="stylesheet" href="exam.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Manage Category</title>
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
								<li><a href = "manage_category.php">Manage Subjects</a>
								<li><a href = "add_subject.html">Add Subject</a>
<!-- 								<li><a href = "#twitter">Twitter</a> -->
<!-- 								<li><a href = "#google">Google</a> -->
<!-- 								<li><a href = "#linkedin">Linkedin</a> -->
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
		<nav></nav>
		<div class="container">
		<h3>Subjects list</h3><hr>
		<div class="result">
			<table>
				
			</table>
		</div>
		</div>
		
		
		<div class="container">
			<div class = "row">
				<div class = "col-lg-8 col-lg-offset-2">
					<div class = "panel panel-default">
						<div class = "panel-body">
							<div class = "page-header">
								<h3>Subjects List</h3>
							</div>
							<table>
								<tr><th>Subject Name</th><th>Duration</th><th>Status</th><th>Edit/Delete</th></tr>
									<?php 
										if($numrows > 0) {
											while($row = mysql_fetch_assoc($query)) {
											$dbsub_name = $row['name'];
											$db_duration = $row['duration'];
											$db_status = $row['status'];
											echo '<tr>' . '<td>' . $dbsub_name . '</td>' . '<td>' . $db_duration . '</td>' . '<td>' . $db_status . '</td>' . 
											'<td>'.'<a href= show_subject.php?hello='.$dbsub_name.'>Edit / </a><a href= manage_category.php?hello='.$dbsub_name.'>Delete</a>' .'</td>'.'</tr>';  
  
											}				
										}
									?>
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