<?php
    include("check_user.php");
    include '../../process/functions.php';
    $data = show_data('parcels', 'id', $row['id']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Load Entry</title>
        <link rel="icon" type="image/png" href="/distant-elogistics/images/Distant. - Icon v1.png"/>
        <link href="/distant-elogistics/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <link href="/distant-elogistics/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/distant-elogistics/user/css/nav-style.css">
    </head>
    <body class="bbg1">
        <div style="margin-top: 50px;"></div>
        <?php
            include ("header.php");
        ?>
        <div id="user-body" class="wrapper d-flex align-items-stretch" style="min-height: 200%;">
            <nav id="sidebar">
                <div id="btn-mn" class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn-menu">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <ul class="nav nav-pills flex-column mb-5 stick-nav">
                    <li class="nav-item" style="margin-top: 50px;">
                        <a href="index.php" class="nav-link text-white">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="load-entry.php" class="nav-link active fnt" aria-current="page">
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
                <h2 class="head-content">Load Entry</h2>
                <!-- <input type="submit" style="margin-bottom: 40px;" class="btn btn-primary" value="Add Load Entry"> -->
                <div class="limiter" style="margin-top: 50px;">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">
                                <div class="row-user header-tbluser nohover" style="text-transform: uppercase;">
                                    <div class="cell">
                                        <br>Sender
                                    </div>
                                    <div class="cell">
                                        <br>Receiver
                                    </div>
                                    <div class="cell">
                                        <br>Driver
                                    </div>
                                    <div class="cell">
                                        Date & <br>Time
                                    </div>
                                    <div class="cell">
                                        <br>Weight
                                    </div>
                                    <div class="cell">
                                        <br>Rate
                                    </div>
                                    <div class="cell">
                                        <br>Status
                                    </div>
                                    <div class="cell">
                                        <br>Action
                                    </div>
                                </div>

                                <?php if (!empty(get_load())) : ?>
                                    <?php foreach (get_load() as $row) : ?>
                                        <div class="row-user">
                                            <div class="cell" data-title="Sender's Name">
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" title="Click to show the Sender's Full Information and Profile" data-bs-toggle="modal" data-bs-target="#<?php echo show_data('users','id',$row['sender_id'])['user_id']; ?>">
                                                    <?php echo show_data('users','id',$row['sender_id'])['fullname'] ?>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="<?php echo show_data('users','id',$row['sender_id'])['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white;">Sender's Profile</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <div class="card-header p-0">
                                                                        <img src="../customer/images/<?php echo show_data('users','id',$row['sender_id'])['img'] ?>" alt="" class="card-img-top">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Name:</label>
                                                                    <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                        <?php echo show_data('users','id',$row['sender_id'])['fullname'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Address:</label>
                                                                    <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                        <?php echo show_data('users','id',$row['sender_id'])['address'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Email:</label>
                                                                    <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                        <?php echo show_data('users','id',$row['sender_id'])['email'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Phone Number:</label>
                                                                    <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                        <?php echo show_data('users','id',$row['sender_id'])['contact'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (!empty(show_data_multiple('parcels', 'id', $row['id']))) : ?>
                                                <?php foreach (show_data_multiple('parcels', 'id', $row['id']) as $row) : ?>
                                                    <div class="cell" data-title="Receiver's Name">
                                                        <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" title="Click to show the Receiver's Full Information" data-bs-toggle="modal" data-bs-target="#<?php echo $row['tracking_id'] ?>">
                                                            <?php echo $row['fullname']; ?>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="<?php echo $row['tracking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: Agrandir-Tight; color: white;">Receiver's Information</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <div class="card-header p-0">
                                                                                <img src="/distant-elogistics/images/placeholder.png" alt="" class="card-img-top">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Name:</label>
                                                                            <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                                <?php echo show_data('parcels','id',$row['id'])['fullname']; ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Address:</label>
                                                                            <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                                <?php echo show_data('parcels','id',$row['id'])['address']; ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Phone Number:</label>
                                                                            <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                                <?php echo show_data('parcels','id',$row['id'])['contact']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                            <div class="cell" data-title="Driver">
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" data-bs-toggle="modal" title="Click to show the Driver's Full Information and Profile" data-bs-target="#<?php echo show_data('users','id',$row['driver_id'])['user_id']; ?>">
                                                    <?php
                                                        echo show_data('users','id',$row['driver_id'])['fullname'];
                                                    ?>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="<?php echo show_data('users','id',$row['driver_id'])['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white;">Driver Profile</h5>
                                                            </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <div class="card-header p-0">
                                                                    <img src="../driver/images/<?php echo show_data('users','id',$row['driver_id'])['img'] ?>" alt="" class="card-img-top">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Name:</label>
                                                                <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                    <?php echo show_data('users','id',$row['driver_id'])['fullname'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Address:</label>
                                                                <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                    <?php echo show_data('users','id',$row['driver_id'])['address'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Email:</label>
                                                                <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                    <?php echo show_data('users','id',$row['driver_id'])['email'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Phone Number:</label>
                                                                <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                    <?php echo show_data('users','id',$row['driver_id'])['contact'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Vehicle:</label>
                                                                <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                    <?php echo show_data('users','id',$row['driver_id'])['vehicle'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">Driver's License:</label>
                                                                <div class="card-header p-0">
                                                                    <img src="../driver/images/driver-licenses/<?php echo show_data('users','id',$row['driver_id'])['driver_lic'] ?>" alt="" class="card-img-top">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cell" data-title="Date & Time">
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" data-bs-toggle="modal" title="Click to show Date and Time Status" data-bs-target="#DateTime-1234<?php echo $row['id'] ?>">
                                                    View
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="DateTime-1234<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white;">Date and Time Status</h5>
                                                            </div>
                                                        <div class="modal-body">
                                                            <p style="font-family: Agrandir-TextBold;">Estimated Date & Time to Pick Up</p>
                                                            <p style="font-family: Agrandir-Narrow;">
                                                                <?php
                                                                    if($row['pick_up'] == NULL){
                                                                        echo 'TO BE UPDATE';
                                                                    }else{
                                                                        echo $row['pick_up'];
                                                                        echo ' | ';
                                                                        echo $row['pick_up_time'];
                                                                    }
                                                                ?>
                                                            </p>

                                                            <br>
                                                            <br>

                                                            <p style="font-family: Agrandir-TextBold;">Realtime Picked Up Date & Time</p>
                                                            <p style="font-family: Agrandir-Narrow;">
                                                                <?php
                                                                    if($row['real_pick_up'] == NULL){
                                                                        echo 'TO BE UPDATE';
                                                                    }else{
                                                                        echo $row['real_pick_up'];
                                                                        echo ' | ';
                                                                        echo $row['real_pick_up_time'];
                                                                    }
                                                                ?>
                                                            </p>

                                                            <br>
                                                            <br>

                                                            <p style="font-family: Agrandir-TextBold;">Estimated Date & Time of Arrival</p>
                                                            <p style="font-family: Agrandir-Narrow;">
                                                                <?php
                                                                    if($row['est'] == NULL){
                                                                        echo 'TO BE UPDATE';
                                                                    }else{
                                                                        echo $row['est'];
                                                                        echo ' | ';
                                                                        echo $row['est_time'];
                                                                    }
                                                                ?>
                                                            </p>

                                                            <br>
                                                            <br>

                                                            <p style="font-family: Agrandir-TextBold;">Realtime Date & Time of Arrival</p>
                                                            <p style="font-family: Agrandir-Narrow;">
                                                                <?php
                                                                    if($row['real_est'] == NULL){
                                                                        echo 'TO BE UPDATE';
                                                                    }else{
                                                                        echo $row['real_est'];
                                                                        echo ' | ';
                                                                        echo $row['real_est_time'];
                                                                    }
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cell" data-title="Weight">
                                                <?php echo $row['weight'] ?> kg
                                            </div>
                                            <div class="cell" data-title="Rate">
                                                <?php echo "₱ ".$row['rate'] ?>.00
                                            </div>

                                            <?php if ($row['status'] == 'To Be Pick Up') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;"> <img style="width: 45px;" src="/distant-elogistics/images/tbpu.png"> <?php echo $row['status'] ?></span>
                                                </div>
                                            <?php elseif ($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;"> <img style="width: 45px;" src="/distant-elogistics/images/otw.png"> <?php echo $row['status'] ?> </span>
                                                </div>
                                            <?php elseif ($row['status'] == 'Delivered') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;"> <img style="width: 45px;" src="/distant-elogistics/images/delivered.png"> <?php echo $row['status'] ?></span>
                                                </div>
                                            <?php elseif ($row['status'] == 'To Be Approve') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;"> <img style="width: 45px;" src="/distant-elogistics/images/action.png"> <?php echo $row['status'] ?></span>
                                                </div>
                                            <?php elseif ($row['status'] == 'Approved') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;" title="Waiting For Driver"> <img style="width: 60px;" src="/distant-elogistics/images/approved.png">  </span>
                                                </div>
                                            <?php elseif ($row['status'] == 'Pending') : ?>
                                                <div class="cell" data-title="Status">
                                                    <span style=" color: black;"> <img style="width: 45px;" src="/distant-elogistics/images/pending.png"> <?php echo $row['status'] ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty(show_data_multiple('parcels', 'id', $row['id']))) : ?>
                                                <?php foreach (show_data_multiple('parcels', 'id', $row['id']) as $row) : ?>
                                                    <div class="cell" data-title="Action">
                                                        <a class="btn btn-danger" style="cursor: pointer; color: white;" data-bs-toggle="modal" data-bs-target="#Del-123456789<?php echo $row['id']; ?>">
                                                            <!-- <a href="../../process/delete.php?parcel_id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                            Delete
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Del-123456789<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: Agrandir-Tight; color: white;">Confirm Delete Entry?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="../../process/delete.php?parcel_id=<?php echo $row['id'] ?>" class="btn btn-danger">Yes</a>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    </div>
                                </div>
                                    <div style="margin-top: 20%; width: 100%; text-align: center; font-family: Agrandir-GrandHeavy; font-size: 24px;">
                                        No Loads Entries Yet.
                                    </div>
                                <?php endif; ?>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>