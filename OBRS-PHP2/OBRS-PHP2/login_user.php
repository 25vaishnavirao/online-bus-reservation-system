<?php 
	include 'db_connect.php';
	session_start();

	extract($_POST);
	
	$qry = $conn->query("SELECT * FROM users1 where username='$username' and password = '$password' ");
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $val){
			if($k != 'password')
			$_SESSION['user_'.$k] = $val;
		}
		echo 1;
	}else{
		echo 2;
	}
?>