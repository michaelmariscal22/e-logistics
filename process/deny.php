<?php
    include('accept_deny.php');
    $id = $_GET['id'];
    
    $query = "UPDATE parcels SET driver_id = '', status = 'Pending' WHERE id ='$id';";
        if(performQuery($query)){
            echo "<script>alert('Parcel Pick Up Denied. Parcel is now pending for admin\'s action.')</script>";
            header('location: /distant-elogistics/user/driver/pick-up.php');
        }else{
            echo "<script>alert(Unknown error occured. Please try again.')</script>";
        }
?>