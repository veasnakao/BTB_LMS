<?php
	$name = $_POST['txtName'];
	$pass = $_POST['txtPass'];

	if($name=='admin' && $pass=='admin'){
		session_register('name');
		session_register('pass');
		header("location:adminpage.php");
	}
	else{
		echo "Please your username and password again!";
	}

?>
