<?php 
include 'functions.php';

    if(isset($_GET['user_id'])):
        activate($_GET['user_id'],'id');
    endif;
?>