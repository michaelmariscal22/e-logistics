<?php
    include("check_user.php");
    include '../../process/functions.php';

    $id = $_GET['id'];

    $order = show_data('parcels', 'id', $id);

    if(isset($_POST['update'])){
        $driver_id = $_POST['driver_id'];
        $status = $_POST['status'];
        $location = $_POST['status'];

        admin_update_parcel($driver_id, $status, $id, $location);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Update</title>
        <link rel="icon" type="image/png" href="/distant-elogistics/images/Distant. - Icon v1.png"/>
        <link href="/distant-elogistics/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <link href="/distant-elogistics/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/distant-elogistics/user/css/nav-style.css">
    </head>
    <body class="bbg1">
        <div style="margin-top: 50px;"> </div>
        <?php
            include ("header.php");
        ?>
        <div id="user-body" class="wrapper d-flex align-items-stretch" style="min-height: 220%;">
            <nav id="sidebar">
                <div id="btn-mn" class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn-menu">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <ul class="nav nav-pills flex-column mb-5 stick-nav">
                    <li class="nav-item" style="margin-top: 50px;">
                        <a href="index.php" class="nav-link active fnt" aria-current="page">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="load-entry.php" class="nav-link text-white">
                            Load Entry
                        </a>
                    </li>
                    <li>
                        <a href="customers.php" class="nav-link text-white">
                            Customers
                        </a>
                    </li>
                    <li>
                        <a href="drivers.php" class="nav-link text-white">
                            Drivers
                        </a>
                    </li>
                    <li>
                        <a href="reports.php" class="nav-link text-white">
                            Reports
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class="container">
                    <div class="row" style="padding-top: 8%; width: 100%;">
                        <div class="col">
                            <!-- form -->
                            <div class="card">
                                <div class="card-header" style="background-color: black; border-radius: 25px;">
                                    <p class="text-center" style="color: white; font-family: Agrandir-TextBold;">UPDATE PARCEL STATUS</p>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <!-- <div class="mb-3">
                                            <input type="date" name="pickup" value="<?php echo $order['pick_up'] ?>" id="" class="form-control" required >
                                            <div class="form-text">Set estimated pick up date</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="time" name="pickup_time" min="08:00" max="17:00" value="<?php echo $order['pick_up_time'] ?>" id="" class="form-control" required >
                                            <div class="form-text">Set estimated pick up time</div>
                                        </div> -->
                                        <div class="mb-3">
                                            <select name="status" id="" class="form-select" required>
                                                    <option value="To Be Approve">To Be Approve</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Pending">Pending</option>
                                            </select>
                                            <div class="form-text">Change Status</div>
                                        </div>
                                        <div class="mb-3">
                                            <?php
                                                if($order['weight'] >= 0 AND $order['weight'] <= 20 ){
                                                    echo '<select name="driver_id" id="" class="form-select" required>';
                                                        foreach(show_drivers_motorcycle('users') as $row ):;
                                                        echo '<option value="';
                                                        echo $row['id'];
                                                        echo '">';
                                                        echo $row['fullname'];
                                                        echo '</option>';
                                                        endforeach;
                                                    echo '</select>';
                                                    echo '<div class="form-text">Choose Motorcycle Driver</div >';
                                                }if($order['weight'] >= 21 AND $order['weight'] <= 200 ){
                                                    echo '<select name="driver_id" id="" class="form-select" required>';
                                                        foreach(show_drivers_truck('users') as $row ):;
                                                        echo '<option value="';
                                                        echo $row['id'];
                                                        echo '">';
                                                        echo $row['fullname'];
                                                        echo '</option>';
                                                        endforeach;
                                                    echo '</select>';
                                                    echo '<div class="form-text">Choose Truck Driver</div >';
                                                }
                                            ?>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <select name="location" id="" class="form-select" required>
                                                    <option value="not-defined">Not defined</option>
                                                    <option value="warehouse-1">Warehouse-1</option>
                                                    <option value="warehouse-2">Warehouse-2</option>
                                                    <option value="Sender Location">Sender Location</option>
                                                    <option value="Receiver Location">Receiver Location</option>
                                            </select>
                                            <div class="form-text">Parcel Location</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="date" name="est" value="<?php echo $order['est'] ?>" id="" class="form-control" required>
                                            <div class="form-text">Set estimated date of arrival</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="time" name="pickup_time" min="08:00" max="17:00" value="<?php echo $order['pick_up_time'] ?>" id="" class="form-control" required >
                                            <div class="form-text">Set estimated time of arrival</div>
                                        </div> -->
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3 p-5">
                                <p style="font-family: Agrandir-Narrow; font-size: 16px; margin-bottom: 25px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Sender's Name: <br>
                                    </span>
                                    <?php echo show_data('users', 'id', $order['sender_id'])['fullname'] ?>
                                </p>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Sender's Address: <br>
                                    </span>
                                    <?php echo show_data('users', 'id', $order['sender_id'])['address'] ?>
                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="200" src="https://maps.google.com/maps?q=<?php echo show_data('users', 'id', $order['sender_id'])['address']; ?>&output=embed"></iframe>
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Receiver's Name: <br>
                                    </span>
                                    <?php echo $order['fullname'] ?>
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Receiver's Address: <br>
                                    </span>
                                    <?php echo $order['address'] ?>
                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="200" src="https://maps.google.com/maps?q=<?php echo  $order['address']; ?>&output=embed"></iframe>
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Receiver's Phone Number: <br>
                                    </span>
                                    <?php echo $order['contact'] ?>
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Tracking ID: <br>
                                    </span>
                                    <?php echo $order['tracking_id'] ?>
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Parcel's Weight: <br>
                                    </span>
                                    <?php echo $order['weight'] ?> kg
                                </p>
                                <br>
                                <p style="font-family: Agrandir-Narrow; font-size: 16px;">
                                    <span style="font-family: Agrandir-TextBold;">
                                        Rate: <br>
                                    </span>

                                    <!-- <?php 
                                        // empty($order['rate'])) ?  "No rate yet" : $order['rate']
                                    ?> -->

                                    P <?php echo $order['rate'] ?>.00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            define('__ROOT__', dirname(dirname(dirname(__FILE__))));
            require_once (__ROOT__."/landing-page/footer.php");
        ?>
        <script src="/distant-elogistics/user/js/jquery.min.js"></script>
        <script src="/distant-elogistics/user/js/popper.js"></script>
        <script src="/distant-elogistics/user/js/bootstrap.min.js"></script>
        <script src="/distant-elogistics/user/js/main.js"></script>
        <script src="/distant-elogistics/js/jquery-3.6.0.min.js"></script>
        <script src="/distant-elogistics/js/main.js"></script>
    </body>
</html>