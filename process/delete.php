<?php 
include 'functions.php';

    if(isset($_GET['user_id'])):
        destroy($_GET['user_id'],'id','users');
    endif;

    if(isset($_GET['report_id'])):
        destroy($_GET['report_id'],'id','support');
    endif;

    if(isset($_GET['parcel_id'])):
        destroy($_GET['parcel_id'],'id','parcels');
    endif;

    if(isset($_GET['driver_id'])):
        destroy($_GET['driver_id'],'id','users');
    endif;

?>