<?php 

include 'connection.php';

#---- general queries

#_______________________ dynamic queries

function show($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_driver_request($pk, $id)
{
    $conn = connect();
    $sql = "SELECT  * FROM parcels WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_driver_reqstat($pk, $id)
{
    $conn = connect();
    $sql = "SELECT  * FROM parcels WHERE $pk = '$id' AND status = 'Pending' AND status = 'On The Way' AND status = 'Delivered'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function hide_other_parcels()
{
    $conn = connect();
    $sql = "SELECT  `status` FROM parcels WHERE 'To Be Pick Up'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_drivers($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name WHERE role = 'D'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_drivers_motorcycle($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name WHERE vehicle = 'Motorcycle'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_drivers_truck($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name WHERE vehicle = 'Truck'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_sender($sender)
{
    $conn = connect();
    $sql = "SELECT  * FROM users WHERE id = $sender";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_customers($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name WHERE role = 'U'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function destroy($id, $pk, $table_name)
{
    $conn = connect();
    $sql = "DELETE FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function show_data($table_name, $pk, $id)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return $result->fetch_assoc();
    }
}

function show_customer_details($id, $pk, $table_name)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return $result->fetch_assoc();
    }
}

function upload_img($img_name,$id)
{
    $conn = connect();
    $sql = "UPDATE users SET img = '$img_name' WHERE id ='$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return 1;
    } else {
        die('ERROR: ' . $conn->error);
    }
}

function show_uploaded_images($id, $label)
{
    $conn = connect();
    $sql = "SELECT * FROM images WHERE img_src_id = '$id' AND label  = '$label'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_data_multiple($table_name, $pk, $id)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

#----------general function

function register($fname,$address,$email,$password,$contact,$user_id){
    $conn = connect();
    $sql = "INSERT INTO users(fullname,address,email,password,contact,user_id)VALUES('$fname','$address','$email','$password','$contact','$user_id')";
    $result = $conn->query($sql);
    if($result){
        header("location: /distant-elogistics/process/register_congrats_page.php");
        exit();
    }else{
        die("ERROR ". $conn->error);
    }
}

function driver_register($fname,$address,$email,$password,$contact,$vehicle,$user_id,$driver_lic){
    $conn = connect();
    $sql = "INSERT INTO users(fullname,address,email,password,contact,vehicle,role,user_id,driver_lic,active)VALUES('$fname','$address','$email','$password','$contact','$vehicle','D','$user_id','$driver_lic','P')";
    $result = $conn->query($sql);
    if($result){
        header("location: /distant-elogistics/process/driver_register_congrats_page.php");
        exit();
    }else{
        die("ERROR ". $conn->error);
    }
}

function add_user_admin($fname,$address,$email,$password,$contact,$user_id){
    $conn = connect();
    $sql = "INSERT INTO users(fullname,address,email,password,contact)VALUES('$fname','$address','$email','$password','$contact','$user_id')";
    $result = $conn->query($sql);

    if($result){
        echo '<div class="alert alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>User added successfully</strong> 
              </div>';
    }else{
        die("ERROR ". $conn->error);
    }
}

function add_driver_admin($fname,$address,$contact,$email,$password,$vehicle,$driver_lic){
    $conn = connect();
    $sql = "INSERT INTO users(fullname,address,contact,email,password,vehicle,role,driver_lic)VALUES('$fname','$address','$contact','$email','$password', '$vehicle', 'D',' $driver_lic')";
    $result = $conn->query($sql);

    if($result){
        echo '<div class="alert alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Driver added successfully</strong> 
              </div>';
    }else{
        die("ERROR ". $conn->error);
    }

}

function login($email,$password){
    $conn = connect();
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
       $row = $result->fetch_assoc();
       $_SESSION['fullname'] = $row['fullname'];
       $_SESSION['id'] = $row['id'];
       $_SESSION['address'] = $row['address'];
       $_SESSION['contact'] = $row['contact'];
       $_SESSION['img'] = $row['img'];
       $_SESSION['vehicle'] = $row['vehicle'];
       $_SESSION['user_id'] = $row['user_id'];
       $_SESSION['driver_lic'] = $row['driver_lic'];
       $_SESSION['role'] = $row['role'];
       $_SESSION['active'] = $row['active'];
       if($row['role'] == 'U'){
            header("location: /distant-elogistics/user/customer/");
       }
       if($row['role'] == 'A'){
            header("location: /distant-elogistics/user/admin/");
       }
       if($row['role'] == 'D'){
            header("location: /distant-elogistics/user/driver/");
       }
       if($row['active'] == 'Y'){
       }
       if($row['active'] == 'X'){
            header("location: /distant-elogistics/process/deactivated.php");
            die();
       }
       if($row['active'] == 'P'){
            header("location: /distant-elogistics/process/driver_account_pending.php");
            die();
       }
    }else{
        header("location: /distant-elogistics/process/sign-in_error_page.php");
        exit();
    }
}

#------------- user function
function send_parcel($name,$address,$contact,$sender_id,$weight,$rate,$track_id){
    $conn = connect();
    $sql = "INSERT INTO parcels(fullname,address,contact,sender_id,weight,rate,tracking_id)VALUES('$name','$address','$contact','$sender_id','$weight','$rate','$track_id')";
    $result = $conn->query($sql);

    if($result){
        header('location: ../customer/parcel-status.php');
    }else{
        die('ERROR: '. $conn->error);
    }
}

function admin_update_parcel($driver_id,$status,$parcel_id,$location){
    $conn = connect();
    $sql = "UPDATE parcels SET driver_id = '$driver_id', status = '$status', parcel_location = '$location' WHERE id = '$parcel_id'";
    $result = $conn->query($sql);

    if($result){
       header('location: ../admin/load-entry.php');
    }else{
        die('ERROR: '. $conn->error);
    }
}

function driver_update_parcel($est,$est_time,$status,$location,$parcel_id){
    $conn = connect();
    $sql = "UPDATE parcels SET est = '$est', est_time ='$est_time', status = '$status', parcel_location = '$location' WHERE id = '$parcel_id'";
    $result = $conn->query($sql);

    if($result){
        header('location: ../driver/deliver.php');
    }else{
        die('ERROR: '. $conn->error);
    }
}

function driver_pickup_parcel($pick_up,$pick_up_time,$status,$location,$parcel_id){
    $conn = connect();
    $sql = "UPDATE parcels SET pick_up ='$pick_up', pick_up_time ='$pick_up_time', status = '$status', parcel_location = '$location' WHERE id = '$parcel_id'";
    $result = $conn->query($sql);

    if($result){
        header('location: ../driver/pick-up.php');
    }else{
        die('ERROR: '. $conn->error);
    }
}

function driver_otw_parcel($status,$location,$parcel_id){
    $conn = connect();
    $sql = "UPDATE parcels SET real_pick_up = NOW(), real_pick_up_time = NOW(), status = '$status', parcel_location = '$location' WHERE id = '$parcel_id'";
    $result = $conn->query($sql);

    if($result){
        header('location: ../driver/deliver.php');
    }else{
        die('ERROR: '. $conn->error);
    }
}
function deactivate($id){
    $conn = connect();
    $sql = "UPDATE `users` SET `active` = 'X' WHERE `users`.`id` = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function activate($id)
{
    $conn = connect();
    $sql = "UPDATE `users` SET `active` = 'Y' WHERE `users`.`id` = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function get_load(){
    $conn = connect();
    $sql = "SELECT * FROM parcels WHERE status = 'On The Way' OR status = 'To Be Pick Up' OR status = 'Delivered' OR status = 'Approved' OR status = 'Pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function weight($weight){
    if($weight > 0 AND $weight < 1 ){
        return 20;
    }elseif($weight > 2 AND $weight <= 10 ){
        return 30;
    }elseif($weight > 11 AND $weight <= 20 ){
        return 40;
    }elseif($weight > 21 AND $weight <= 30 ){
        return 50;
    }elseif($weight > 31 AND $weight <= 40 ){
        return 60;
    }elseif($weight > 41 AND $weight <= 50 ){
        return 70;
    }elseif($weight > 51 AND $weight <= 60 ){
        return 80;
    }elseif($weight > 61 AND $weight <= 70 ){
        return 90;
    }elseif($weight > 71 AND $weight <= 80 ){
        return 100;
    }elseif($weight > 81 AND $weight <= 90 ){
        return 110;
    }elseif($weight > 91 AND $weight <= 100 ){
        return 120;
    }elseif($weight > 101 AND $weight <= 110 ){
        return 150;
    }elseif($weight > 111 AND $weight <= 120 ){
        return 160;
    }elseif($weight > 121 AND $weight <= 130 ){
        return 170;
    }elseif($weight > 131 AND $weight <= 140 ){
        return 180;
    }elseif($weight > 141 AND $weight <= 150 ){
        return 190;
    }elseif($weight > 151 AND $weight <= 160 ){
        return 200;
    }elseif($weight > 161 AND $weight <= 170 ){
        return 210;
    }elseif($weight > 171 AND $weight <= 180 ){
        return 220;
    }elseif($weight > 181 AND $weight <= 190 ){
        return 230;
    }elseif($weight > 191 AND $weight <= 200 ){
        return 240;
    }else{
        return 0;
    }
}

function vehicle($weight){
    if($weight > 0 AND $weight < 20 ){
        return 'Motorcycle';
    }else{
        return 'Truck';
    }
}


#------------- receiver's contact support function
function contact_support($report_name,$phone,$report_email,$report_desc,$report_id){
    $conn = connect();
    $sql = "INSERT INTO support(report_name,phone,report_email,report_desc,report_id)VALUES('$report_name','$phone','$report_email','$report_desc','$report_id')";
    $result = $conn->query($sql);

    if($result){
        header("location: /distant-elogistics/");
        exit();
    }else{
        die("ERROR ". $conn->error);
    }

}

function show_reports($table_name)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return $result->fetch_assoc();
    }
}

    function show_reports_multiple($table_name)
    {
        $conn = connect();
        $sql = "SELECT * FROM $table_name";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $rows = array();
            while ($row  = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return FALSE;
    }

}