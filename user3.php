<?php 
	session_start();
	$_SESSION['username'] = "Hambone";
	//echo var_dump($_SESSION);
	header('Location: index.php');
?>
