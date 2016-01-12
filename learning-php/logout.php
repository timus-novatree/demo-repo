<?php
	error_reporting(E_ALL);
	session_start();
	session_unset();
	session_destroy();
	header('location:index.php');
	exit();
?>