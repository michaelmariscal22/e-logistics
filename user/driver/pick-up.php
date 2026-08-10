<?php
    include("check_user.php");
    include '../../process/functions.php';
    include('../../process/accept_deny.php');
    $data = show_data('parcels', 'id', $row['id']);

    $conn = connect();

    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Pick Up</title>
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
        <div id="user-body" class="wrapper d-flex align-items-stretch" style="min-height: 150%;">
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
                        <a href="pick-up.php" class="nav-link active fnt">
                            Pick Up
                        </a>
                    </li>
                    <li>
                        <a href="deliver.php" class="nav-link text-white">
                            Deliver
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="head-content" style="margin-bottom: 40px;">Pick Up Queries</h2>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">
                                <div class="row-user header-tbluser nohover">
                                    <div class="table">
                                        <div class="row-user header-tbluser nohover" style="text-transform: uppercase;">
                                            <div class="cell">
                                                Sender's<br>Full Name
                                            </div>
                                            <div class="cell">
                                                Sender's<br>Address
                                            </div>
                                            <div class="cell">
                                                Sender's<br>Phone Number
                                            </div>
                                            <div class="cell">
                                                <br>Status
                                            </div>
                                            <div class="cell">
                                                <br>Action
                                            </div>
                                        </div>
                                            <?php if (!empty(show_driver_request('driver_id', $_SESSION['id']))) : ?>
                                                <?php foreach (show_driver_request('driver_id', $_SESSION['id']) as $row) : ?>
                                                    <?php if($row['status'] == 'Approved' || $row['status'] == 'To Be Pick Up'): ?>
                                                        <div class="row-user">
                                                            <?php foreach (show_sender($row['sender_id']) as $row_sender) : ?>
                                                                <div class="cell" style="color: black; font-family: Agrandir-Narrow;" data-title="Receiver's Full Name">
                                                                    <?php echo $row_sender['fullname'] ?>
                                                                </div>
                                                                <div class="cell" style="color: black; font-family: Agrandir-Narrow;" data-title="Receiver's Address">
                                                                    <?php echo $row_sender['address'] ?>
                                                                </div>
                                                                <div class="cell" style="color: black; font-family: Agrandir-Narrow;" data-title="Receiver's Phone Number">
                                                                    <?php echo $row_sender['contact'] ?>
                                                                </div>
                                                            <?php endforeach; ?>
                                                            <div class="cell" style="color: black; font-family: Agrandir-Narrow;" data-title="Status">
                                                                <?php echo $row['status'] ?>
                                                            </div>
                                                            <div class="cell" data-title="Action">
                                                                <?php if($row['status'] == 'Approved'): ?>
                                                                    <a class="btn btn-primary my-2" style="font-family: Agrandir-TextBold; color: white;" href="update.php?id=<?php echo $row['id'] ?>">Accept</a>
                                                                    <a class="btn btn-danger my-2" style="font-family: Agrandir-TextBold; color: white;" href="../../process/deny.php?id=<?php echo $row['id'] ?>">Deny</a>
                                                                <?php endif; ?>
                                                                <?php if($row['status'] == 'To Be Pick Up'): ?>
                                                                    <a class="btn btn-primary my-2" style="font-family: Agrandir-TextBold; color: white;" href="update.php?id=<?php echo $row['id'] ?>">Update</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                    </div>
                                                </div>
                                                    <div style="margin-top: 20%; width: 100%; text-align: center; font-family: Agrandir-GrandHeavy; font-size: 24px;">
                                                        No Pick Up Request Yet.
                                                    </div>
                                            <?php endif; ?>
                                    </div>
                                </div>
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