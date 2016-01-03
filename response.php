<?php
	$q = $_GET['q'];
	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
	mysql_select_db("members") or die ("Couldn't find database");
 	$option = $q{0};
 	$q = substr($q, 1);

   $insert_query = mysql_query("UPDATE response SET answer='$option' WHERE qno = '$q'");

	
?>