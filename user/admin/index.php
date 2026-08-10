<?php
    include("check_user.php");
    include '../../process/functions.php';
    $conn = connect();
    $sql = "SELECT * FROM support";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $total_reports = $stmt->num_rows;
    }
    
    $sql = "SELECT * FROM users WHERE role = 'U'";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $total_customers = $stmt->num_rows;
    }

    $sql = "SELECT * FROM users WHERE role = 'D'";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $total_drivers = $stmt->num_rows;
    }
    
    $sql = "SELECT * FROM parcels WHERE status != 'To Be Approve' AND status != 'Pending'";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $total_loaded = $stmt->num_rows;
    }

    $sql = "SELECT * FROM parcels WHERE status = 'To Be Approve' OR status = 'Pending' OR status = 'Approved'";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $countStat_admin = $stmt->num_rows;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Admin</title>
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
        <div id="user-body" class="wrapper d-flex align-items-stretch admin-cont">
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
                <h2 class="dashboard">Dashboard</h2>
                <p class="ctrlpanel">Control Panel</p>

                <div style="margin-top: 40px;">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <div class="load-entry" style="width: 100%; background-color: #d0cab2; height : 350px; margin: 0 auto;">
                                    <div style="position:relative; top: 0;">
                                        <a style="font-family: Agrandir-GrandHeavy; font-size: 70px; margin-left: 34px;">
                                            <?php echo $total_loaded ?>
                                        </a>
                                    </div>
                                    <div style="position:relative; top: -40px;">
                                        <a style="font-family: Agrandir-Narrow; font-size: 40px; margin-left: 34px;">
                                            Load Entry
                                        </a>
                                    </div>
                                    <div class="more-info">
                                        <a style="color: white;" href="load-entry.php"> More Info > </a>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 5%;"></td>
                            <td >
                                <div class="customer-admin" style="width: 100%; background-color: #14574e; height : 350px; margin: 0 auto;">
                                    <div style="position:relative; top: 0;">
                                        <a style="font-family: Agrandir-GrandHeavy; font-size: 70px; margin-left: 34px; color: black;">
                                            <?php echo $total_customers ?>
                                        </a>
                                    </div>
                                    <div style="position:relative; top: -40px;">
                                        <a style="font-family: Agrandir-Narrow; font-size: 40px; margin-left: 34px; color: black;">
                                            Customers
                                        </a>
                                    </div>
                                    <div class="more-info">
                                        <a style="color: white;" href="customers.php"> More Info > </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="height: 50px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="drivers" style="width: 100%; background-color: #1ea290; height : 350px; margin: 0 auto;">
                                    <div style="position:relative; top: 0;">
                                        <a style="font-family: Agrandir-GrandHeavy; font-size: 70px; margin-left: 34px;">
                                            <?php echo $total_drivers ?>
                                        </a>
                                    </div>
                                    <div style="position:relative; top: -40px;">
                                        <a style="font-family: Agrandir-Narrow; font-size: 40px; margin-left: 34px;">
                                            Drivers
                                        </a>
                                    </div>
                                    <div class="more-info">
                                        <a style="color: white;" href="drivers.php"> More Info > </a>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 5%;"></td>
                            <td >
                                <div class="reports" style="width: 100%; background-color: #7b7457; height : 350px; margin: 0 auto;">
                                    <div style="position:relative; top: 0;">
                                        <a style="font-family: Agrandir-GrandHeavy; font-size: 70px; margin-left: 34px; color: black;">
                                            <?php echo $total_reports ?>
                                        </a>
                                    </div>
                                    <div style="position:relative; top: -40px;">
                                        <a style="font-family: Agrandir-Narrow; font-size: 40px; margin-left: 34px; color: black;">
                                            Reports
                                        </a>
                                    </div>
                                    <div class="more-info">
                                        <a style="color: white;" href="reports.php"> More Info > </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    
                    
                    <div class="limiter" style="margin-top: 4%;">
                        <h4 style="margin-left: 15%;">Approvals and Assign a Driver</h4>
                        <div class="container-table100">
                            <div class="wrap-table100" style="width: 70%;">
                                <div class="table">
                                    <div class="row-user header-tbluser nohover">
                                        <div class="cell">
                                            Receiver's<br>Full Name
                                        </div>
                                        <div class="cell">
                                            Receiver's<br>Address
                                        </div>
                                        <div class="cell">
                                            Receiver's<br>Phone Number
                                        </div>
                                        <div class="cell">
                                            <br>Paid
                                        </div>
                                        <div class="cell">
                                            <br>Status
                                        </div>
                                        <div class="cell">
                                            <br>Action
                                        </div>
                                    </div>
                                    <?php if($countStat_admin == 0) : ?>
                                </div>
                            </div>
                                <div style="margin-top: 20%; width: 100%; text-align: center; font-family: Agrandir-GrandHeavy; font-size: 24px;">
                                    No New Parcels Yet.
                                </div>
                                    <?php endif; ?>
                                    <?php if($countStat_admin == TRUE) : ?>
                                        <?php if (!empty(show('parcels'))) : ?>
                                            <?php foreach (show('parcels') as $row) : ?>
                                                <?php if($row['status'] == 'To Be Approve' || $row['status'] == 'Approved' || $row['status'] == 'Pending') : ?>
                                                    <div class="row-user">
                                                        <div class="cell" data-title="Receiver's Full Name">
                                                            <?php echo $row['fullname'] ?>
                                                        </div>
                                                        <div class="cell" data-title="Receiver's Address">
                                                            <?php echo $row['address'] ?>
                                                        </div>
                                                        <div class="cell" data-title="Receiver's Phone Number">
                                                            <?php echo $row['contact'] ?>
                                                        </div>

                                                        
                                                        <?php if ($row['status'] == 'To Be Approve') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                NO
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] == 'Approved') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                NO
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] == 'To Be Pick Up') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                NO
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] == 'Pending') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                NO
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] == 'On The Way') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                YES
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($row['status'] == 'Delivered') : ?>
                                                            <div class="cell" data-title="Paid">
                                                                YES
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                        <div class="cell" data-title="Status">
                                                            <?php echo $row['status'] ?>
                                                        </div>
                                                        <div class="cell" data-title="Action">
                                                            <?php if($row['status'] == 'To Be Approve'): ?>
                                                                <a class="text-decoration-none" style="font-family: Agrandir-TextBold; color: black;" href="update.php?id=<?php echo $row['id'] ?>">Approve</a> 
                                                                <span class="bg-danger badge float-end" style="font-family: Agrandir-Narrow;">NEW!!</span>
                                                            <?php endif; ?>
                                                            <?php if($row['status'] == 'Approved' || $row['status'] == 'Pending'): ?>
                                                                <a class="btn btn-primary my-2" style="font-family: Agrandir-TextBold; color: white;" href="update.php?id=<?php echo $row['id'] ?>">Update</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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