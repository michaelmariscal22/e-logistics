<?php
    include('accept_deny.php');
    $id = $_GET['id'];
    $query = "SELECT `id`, `status`, `pick_up`, `driver_id`, `est`, `parcel_location` FROM `requests`";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $driver_id = $row['driver_id'];
            $parcel_location = $row['parcel_location'];
            $status = $row['status'];
            $pick_up = $row['pick_up'];
            $est = $row['est'];
            $query = "INSERT INTO `delivery`(`driver_id`, `parcel_location`, `status`, `pick_up`, `est`) VALUES ('$driver_id', '$parcel_location', '$status', '$pick_up', '$est');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Delivery task has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>

<br/><br/>
<a href="javascript:history.back()">Back</a>