<?php
    session_start();
    
    $connect = mysql_connect("127.0.0.1","root","") or die("Cannot connect to server");
    
    mysql_select_db("members") or die("couldn't connect to database");  
//     if (isset($_POST['submit']))
//     {
    	
    	$fname = $_POST['fname'];
    	$lname = $_POST['lname'];
    	$uname = $_POST['uname'];
    	$uname1 = $_POST['uname1'];
    	$passwd = $_POST['passwd'];
    	$gender = $_POST['sex'];
    	$passwd =md5($passwd);  //encrypting password
    	$now = new DateTime();
    	$date = $now->format('Y-m-d H:i:s');
        $query = mysql_query("INSERT INTO users VALUES ('$fname','$lname','$uname','$passwd','$gender','$date')");
   // }
    $redirect_page = 'http://localhost/eLearning/home.html#/signup';
    header('Location: '.$redirect_page);
?>