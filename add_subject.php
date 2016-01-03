<?php
	$subjectName = $_POST['subjectName'];
	$duration = $_POST['duration'];
	$status = $_POST['status'];
	if(is_null($status)) {
		$status = 'inactive';
	}
	else 
		$status = 'active';
	
	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
	mysql_select_db("members") or die ("Couldn't find database");
	
	$query = mysql_query("INSERT INTO subjects(name,duration,status) VALUES ('$subjectName','$duration','$status')");
	
	$redirect_page = 'http://localhost/eLearning/add_subject.html';
	header('Location: '.$redirect_page);
?>

<!-- <html> -->
<!-- 	<head> -->
<!-- 		<title>Add Subject</title> -->
<!-- 	</head> -->
<!-- 	<body> -->
<!-- 	<form action="add_subject.php" method="post"> -->
<!-- 			Subject Name: <input type="text"><br> -->
<!-- 			Duration: <input type="text"><br> -->
<!-- 		    Status: <input type="checkbox">Active<br> -->
<!-- 			<button>Submit</button> -->
	
<!-- 	</form> -->

<!-- 	</body> -->
<!-- </html> -->