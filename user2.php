<?php 
	session_start();
	$_SESSION['username'] = "SNGHSHB";
	//echo var_dump($_SESSION);
	header('Location: index.php');
?>
