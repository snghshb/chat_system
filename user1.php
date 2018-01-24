<?php 
	session_start();
	$_SESSION['username'] = "Vivek Singh";
	//echo var_dump($_SESSION);
	header('Location: index.php');
?>
