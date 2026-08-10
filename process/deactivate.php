<?php 
include 'functions.php';

    if(isset($_GET['user_id'])):
        deactivate($_GET['user_id'],'id');
    endif;
?>