<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username &&$password)
    {
    	$connect = mysql_connect("127.0.0.1","root","") or die("couldn't connect to database");
    	mysql_select_db("members") or die ("Couldn't find database");
    	
    	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
    	
    	$numrows = mysql_num_rows($query);
    	
    	if($numrows !=0)
    	{
    		while($row = mysql_fetch_assoc($query))
    		{
    			$dbusername = $row['username'];
    			$dbpassword = $row['password'];

    		}
    		if(($username==$dbusername) &&(md5($password)==$dbpassword) && ($username == "shivareddykandimalla@gmail.com"))
    		{
    			$_SESSION['username'] = $username;
    			//setcookie('myname','Shiva','time()*(60*60*24)','/','','',TRUE);
    			$redirect_page = 'http://localhost/eLearning/admin.php';
    		    header('Location: '.$redirect_page);
    	
    			
    		}
    		else if(($username==$dbusername) &&(md5($password)==$dbpassword)&& ($username != "shivareddykandimalla@gmail.com"))
    		{
    			$_SESSION['username'] = $username;
    			//setcookie('myname','Shiva','time()*(60*60*24)','/','','',TRUE);
    			$redirect_page = 'http://localhost/eLearning/user.php';
    		    header('Location: '.$redirect_page);
    	
    			
    		}
    		else 
    		{
    			//echo "Your password is incorrect!";
    			//$msg = "Your password is incorrect!";
    			//$msgEncoded = base64_encode($msg);
    			$redirect_page = 'http://localhost/eLearning/home.html#/login';
    			header('Location: '.$redirect_page);
    			//header("location:login.php?msg=".$msgEncoded);
    		}
    			

    	}
    	else 
    	{
    		$redirect_page = 'http://localhost/eLearning/home.html#/login';
    		header('Location: '.$redirect_page);
    	}
    		
    	}
    	else
    	{
    		$redirect_page = 'http://localhost/eLearning/home.html#/login';
    		header('Location: '.$redirect_page);
    	}
    		
?>