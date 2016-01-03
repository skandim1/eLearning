<?php
   session_start();
 // $expiry = time()+(60*60*24);
  // setcookie('myname','Shiva Reddy',$expiry,'','','',TRUE);
   if (isset($_SESSION['username'])) {
   	
   }
   else {
   	$redirect_page = 'http://localhost/eLearning/home.html';
   	header('Location: '.$redirect_page);
   }
?>
<?php
	$time = $_GET['time'];
	$subject = $_GET['name'];
	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
	mysql_select_db("members") or die ("Couldn't find database");
	
	$query = mysql_query("SELECT * FROM response JOIN qns_set ON response.qno = qns_set.qno WHERE response.answer = qns_set.answer and qns_set.tname = '$subject'");	
	$numrows = mysql_num_rows($query);
	$query2 = mysql_query("SELECT * FROM qns_set WHERE tname = '$subject'");
	$total = mysql_num_rows($query2);
	$percent = ($numrows/$total)*100;
	//removing data and making ready for next exam
	mysql_query("UPDATE response SET answer=''");
	//$query2 = mysql_query("SELECT * FROM  exam_results");	
	//$rowcount = mysql_num_rows($query2) + 1;
	$now = new DateTime();
	$date = $now->format('Y-m-d H:i:s');
	$email_id = $_SESSION['username'];
	$result = mysql_query("INSERT INTO exam_results(email_id,test_name,total_marks,time_taken,exam_date) VALUES ('$email_id','$subject','$percent','$time','$date')");

?>
<html>
	<head>	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Result</title>
		<link rel="stylesheet" href="exam.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link rel='stylesheet' type='text/css' href='exam.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
 		<script src="js/bootstrap.js"></script>
	</head>
	<body >
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
						<li class = "active"><a href = "user.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>	
			</div>
		</div>
		<div class="container">
			<div class = "row">
				<div class = "col-lg-8 col-lg-offset-2">
					<div class = "panel panel-default">
						<div class = "panel-body">
							<div class = "page-header">
								<h3>Result</h3>
							</div>
							<p>Thank you for taking the exam.
							<table>
								<tr><td>Subject:</td><td>General Knowledge</td>
								<tr><td>Total Questions:</td><td><?php echo $total ?></td>
							    <tr><td>Correct Answers:</td><td><?php echo $numrows ?></td>
								<tr><td>Time Taken:</td><td><?php echo $time ?></td>
								<tr><td>Score%:</td><td><?php echo round($percent,2); ?>%</td>
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
