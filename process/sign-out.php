<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("location: /distant-elogistics/index.php");
	exit;
?>