<?php
    session_start();
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    if($_SESSION['fullname'] == true) {
	}
	elseif($_SESSION['fullname'] == false) { 
?>
<?php
        require_once (__ROOT__."/process/error_404.html");
?>
<?php
        die();
    }
?>
<?php
    if($_SESSION['role'] == 'U') {
    }
    else{
?>
<?php
        require_once (__ROOT__."/process/error_404.html");
?>
<?php
        die();
    }
?>