<?php
    session_start();
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    define('__ROOT__', dirname(dirname(__FILE__)));
    if($_SESSION['role'] == 'A') {
?>
<?php
        header("location: /distant-elogistics/user/admin/index.php");
?>
<?php
        die();
    }
	elseif($_SESSION['active'] == 'X') { 
?>
<?php
        require_once (__ROOT__."/process/deactivated.php");
?>
<?php
	    session_destroy();
    }
	elseif($_SESSION['active'] == false) { 
?>
<?php
	    session_destroy();
    }
    if($_SESSION['role'] == 'U') {
?>
<?php
        header("location: /distant-elogistics/user/customer/index.php");
?>
<?php
        die();
    }
    if($_SESSION['role'] == 'D') {
?>
<?php
        header("location: /distant-elogistics/user/driver/index.php");
?>
<?php
        die();
    }
    else{
        require_once (__ROOT__."/index.php");
    }
?>