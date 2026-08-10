<?php
    include('../../process/accept_deny.php');
    $id = $_GET['id'];
    
    $query = "UPDATE parcels SET real_est = NOW(), real_est_time = NOW() WHERE id ='$id';";
        if(performQuery($query)){
            echo "<script>alert('Parcel is now delivered.')</script>";
            header('location: /distant-elogistics/user/driver/deliver.php');
        }else{
            echo "<script>alert(Unknown error occured. Please try again.')</script>";
        }
?>