<?php
	$connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server!");
	mysql_select_db("members") or die("Cannot connect to database!");
	$tname = $_GET['hello'];
	
	$query1 = mysql_query("SELECT * FROM qns_set WHERE tname = '$tname'");
	
	$numrows1 = mysql_num_rows($query1);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exam</title>
	<link rel="stylesheet" href="exam.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
 	<script src="js/bootstrap.js"></script>
 	<script src="validation.js"></script>
 	<script src="js/angular.min.js"></script>
 	<script src="js/angular-route.min.js"></script>
 	<script src="js/main.js"></script>
	<script src="js/exam.js"></script>
</head>
<body onload = "start_func('<?php echo $numrows1?>','<?php echo $tname?>')">
	<div class="container">
		<div class = "row">
			<div class = "col-lg-8 col-lg-offset-2">
				<div class = "panel panel-default">
					<div class = "panel-body">
					<div class = "page-header">
						<h3>Exam</h3>
					</div>
					<p id="demo"></p>
					<div id="time"></div>
					<div class="question_container">
						<button  class="prev_next"   onclick="previous()">PREVIOUS</button>
						<button class="prev_next"    onclick="next()">NEXT</button>
						<form action="" name="abc">
							<div id="question"></div><br>
						</form>
						<button class="commit" onclick="submit()">COMMIT</button><br>
   						<button id="exit" onclick="exit_pop()">I'M DONE, SUBMIT TEST</button>
   						<p>Do not go to any other page while taking exams. Your data may be lost.
						<div id="response"></div><br>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>