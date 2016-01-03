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
	$q = intval($_GET['q']);
	$tname = $_GET['name'];
	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
	mysql_select_db("members") or die ("Couldn't find database");

		$query = mysql_query("SELECT * FROM qns_set WHERE qno = '$q' and tname = '$tname'");
		$numrows = mysql_num_rows($query);
		if($numrows > 0) {
			while($row = mysql_fetch_assoc($query)) {
				$db_qno = $row['qno'];
				$db_question = $row['question'];
				$db_optionA = $row['optionA'];
				$db_optionB = $row['optionB'];
				$db_optionC = $row['optionC'];
				$db_optionD = $row['optionD'];
				echo '<h4>Question #'.$db_qno.'</h4>';
				echo '<p>'.$db_question.'</p>';
				echo '<input type = "radio" name = "option" value = "A">'.$db_optionA.'</input><br>';
				echo '<input type = "radio" name = "option" value = "B">'.$db_optionB.'</input><br>';
				echo '<input type = "radio" name = "option" value = "C">'.$db_optionC.'</input><br>';
				echo '<input type = "radio" name = "option" value = "D">'.$db_optionD.'</input><br>';

			}
		}
?>
