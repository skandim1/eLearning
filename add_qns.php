<?php
// define variables and set to empty values

//$question = $optionA = $optionB = $optionC = $optionD = $ans = "";
$tname = $_GET['hello'];
$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
mysql_select_db("members") or die ("Couldn't find database");
if (isset($_POST["submit"])) {
	$question = $_POST["question"];
	$optionA = $_POST["optionA"];
	$optionB = $_POST["optionB"];
	$optionC = $_POST["optionC"];
	$optionD = $_POST["optionD"];
	$ans = $_POST["ans"];
	$query2 = mysql_query("select * from qns_set WHERE tname = '$tname'");
	$count = mysql_num_rows($query2) + 1;
	$query = mysql_query("INSERT INTO qns_set(question,optionA,optionB,optionC,optionD,answer,tname,qno) VALUES ('$question','$optionA','$optionB','$optionC','$optionD','$ans','$tname','$count')");
	
	$redirect_page = 'http://localhost/eLearning/add_qns.php?hello='.$tname;
	header('Location: '.$redirect_page);
}
?>
<!DOCTYPE HTML> 
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Subject</title>
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
			</div>
		</div>
		<div class="container">
		<div class = "row">
			<div class = "col-lg-8 col-lg-offset-2">
				<div class = "panel panel-default">
					<div class = "panel-body">
							<div class = "page-header">
<h2>Add Question</h2>
</div>
	<form class="form-horizontal" method="post" action="<?php echo 'add_qns.php?hello='.$tname; ?>">
<!--    Question: <textarea rows= "5" cols = "40" name="question" placeholder="Question"></textarea> -->
<!--    <br><br> -->
<!--    OptionA: <input type="text" name="optionA" placeholder="OptionA"> -->
<!--    <br> -->
<!--    OptionB: <input type="text" name="optionB" placeholder="OptionB"> -->
<!--    <br> -->
<!--    OptionC: <input type="text" name="optionC" placeholder="OptionC"> -->
<!--    <br> -->
<!--    OptionD: <input type="text" name="optionD" placeholder="OptionD"> -->
<!--    <br> -->
<!--    Correct Answer: <input type="text" name="ans" placeholder="Answer"> -->
<!--    <br><br> -->
<!--    <input type="submit" name="submit" value="Submit">  -->
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">Question:</label>
    		<div class="col-sm-10">
     		 <input name="question" type="text" class="form-control" id="inputEmail3" placeholder="Question">
    		</div>
  		</div>
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">OptionA:</label>
    		<div class="col-sm-10">
     		 <input name="optionA" type="text" class="form-control" id="inputEmail3" placeholder="OptionA">
    		</div>
  		</div>
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">OptionB:</label>
    		<div class="col-sm-10">
     		 <input name="optionB" type="text" class="form-control" id="inputEmail3" placeholder="OptionB">
    		</div>
  		</div>
 		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">OptionC:</label>
    		<div class="col-sm-10">
     		 <input name="optionC" type="text" class="form-control" id="inputEmail3" placeholder="OptionC">
    		</div>
  		</div>
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">OptionD:</label>
    		<div class="col-sm-10">
     		 <input name="optionD" type="text" class="form-control" id="inputEmail3" placeholder="OptionD">
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">Correct Answer:</label>
    		<div class="col-sm-10">
     		 <input name="ans" type="text" class="form-control" id="inputEmail3" placeholder="Answer">
    		</div>
  		</div>	
  		  <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
      			<button name = "submit" type="submit" value = "Submit" class="btn btn-primary">Submit</button>
      			</div>
      			</div>
   </form>
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