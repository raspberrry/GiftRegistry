<?php
	session_start();
	extract($_POST);
	$_SESSION['list']=$list;
	header("Location: createlist.php");
?>