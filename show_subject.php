<?php
	$connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server!");
	mysql_select_db("members") or die("Cannot connect to database!");


	if (isset($_GET['hello'])) {
		$tname = $_GET['hello'];	
	}
	$tname = $_GET['hello'];
	$query = mysql_query("select * from qns_set where tname = '$tname'");
	$numrows = mysql_num_rows($query);

?>
<html>
	<head>
		<link rel="stylesheet" href="exam.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit Questions</title>
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
		<div class="container">
			<div class = "row">
				<div class = "col-lg-8 col-lg-offset-2">
					<div class = "panel panel-default">
						<div class = "panel-body">
							<div class = "page-header">
								<h3><?php echo $tname;?></h3>
								<p><?php echo '<a href= add_qns.php?hello='.$tname.'>Add Question </a>';?></p><br>
							</div>

									<?php 
										if($numrows > 0) {
											while($row = mysql_fetch_assoc($query)) {
												$db_qno = $row['qno'];
												$db_question = $row['question'];
												$db_optionA = $row['optionA'];
												$db_optionB = $row['optionB'];
												$db_optionC = $row['optionC'];
												$db_optionD = $row['optionD'];
												$db_ans = $row['answer'];
												echo '<h4>Question #'.$db_qno.'</h4>';
												echo '<p>'.$db_question.' ?'.'</p>';
												echo '<p>'.'A. '.$db_optionA.'</p>';
												echo '<p>'.'B. '.$db_optionB.'</p>';
												echo '<p>'.'C. '.$db_optionC.'</p>';
												echo '<p>'.'D. '.$db_optionD.'</p>';
												echo '<p>'.'<b>Corrrect Answer :</b> '.$db_ans.'</p><hr>';
												}				
										}
									?>
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