<?php
   session_start();
 // $expiry = time()+(60*60*24);
  // setcookie('myname','Shiva Reddy',$expiry,'','','',TRUE);
   if (isset($_SESSION['username'])) {
		$connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server!");
		mysql_select_db("members") or die("Cannot connect to database!");
		
		$query = mysql_query("SELECT * FROM subjects WHERE status = 'active'");
		
		$numrows = mysql_num_rows($query);
   }
   else {
   	$redirect_page = 'http://localhost/eLearning/home.html';
   	header('Location: '.$redirect_page);
   }
?>

<html>
   <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome</title>
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
						<li class = "active"><a href = "#home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class = "dropdown">
							<a href = "#socialmedia" class = "dropdown-toggle" data-toggle = "dropdown">Choose Subject <b class="caret"></b></a>
							<ul class = "dropdown-menu">
								<?php 
									if($numrows > 0) {
										while($row = mysql_fetch_assoc($query)) {
											$dbsub_name = $row['name'];
										 	echo '<li>'.'<a href= exam_new.php?hello='.$dbsub_name.'>'.$dbsub_name.'</a>';
										}				
									}
									?>
<!-- 								<li><a href = "#twitter">Twitter</a> -->
<!-- 								<li><a href = "#google">Google</a> -->
<!-- 								<li><a href = "#linkedin">Linkedin</a> -->
							</ul>
						</li>
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
							<h3>Welcome</h3>
						</div>
						<h4>Instructions</h4>
						<ul>
							<li><p>The exam contains 20 questions each question carries one mark.</p></li>
							<li><p>The duration of exam is 20 minutes.</p></li>
							<li><p>Select the appropriate option to specify the correct answer.</p></li>
							<li><p>There is no negative marks</p></li>
							<li><p>Time is over or if you click exit button then your final report will be displayed.</p></li>
						</ul>			
					</div>
				</div>
			</div>
		</div>
  		
	</div>
      		
<!--       		<li><a href="profile.php">Profile</a></li> -->
      		
<!--       		<li><a href="feedback">Feedback</a></li> -->
<!--       		<li><a href="members.php">Members</a></li> -->

      			
		<div class = "navbar navbar-inverse navbar-static-bottom ">
			<div class = "container">
				<p class = "navbar-text"><span class="glyphicon glyphicon-copyright-mark"></span> Copy Rights reserved
			</div>
		</div>
   </body>

</html>