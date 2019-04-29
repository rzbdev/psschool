<?php
$server = $_SERVER['SERVER_NAME'];
	session_start();
	session_unset();
	session_destroy();
	
	//header('Location:http://psschool.stpreview.com/admin/login.php')
	header('Location:http://'.$server.'/admin/login.php');
?>

