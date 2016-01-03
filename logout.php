<?php
	session_start(); 
	unset($_SESSION['username']);
	
	$redirect_page = 'http://localhost/eLearning/home.html';
	header('Location: '.$redirect_page);
?>