<?php
    include("check_user.php");
    include '../../process/functions.php';
    $data = show_reports('support');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Reports</title>
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
        <div id="user-body" class="wrapper d-flex align-items-stretch" style="min-height: 280%;">
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
                        <a href="reports.php" class="nav-link active fnt" aria-current="page">
                            Reports
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="head-content">Reports</h2>
                <p class="blckp" style="margin-bottom: 40px;" >View here the feedbacks or reports by the customers.</p>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table" style="width: 100%; margin: 0 auto;">
                                <div class="row-user header-tbluser nohover">
                                    <div class="cell">
                                        Name
                                    </div>
                                    <div class="cell">
                                        Description
                                    </div>
                                    <div class="cell">
                                        Phone Number
                                    </div>
                                    <div class="cell">
                                        Email Address
                                    </div>
                                    <div class="cell">
                                        Action
                                    </div>
                                </div>

                                <?php if (!empty(show_reports_multiple('support'))) : ?>
                                    <?php foreach (show_reports_multiple('support') as $row) : ?>
                                        <div class="row-user">
                                            <div class="cell" data-title="Name">
                                                <?php echo $row['report_name'] ?>
                                            </div>
                                            <div class="cell" data-title="Description" title="Click eye icon to view full description.">
                                                <?php
                                                    $string = $row['report_desc'];
                                                    $arr = str_split($string);
                                                    for($i = 0; $i < 20; $i++) {
                                                        print($arr[$i]);
                                                    }
                                                    echo ".......";
                                                ?>
                                            </div>
                                            <div class="cell" data-title="Phone">
                                                <?php echo $row['phone'] ?>
                                            </div>
                                            <div class="cell" data-title="Email Address">
                                                <?php echo $row['report_email'] ?>
                                            </div>
                                            <?php if (!empty(show_data_multiple('support', 'id', $row['id']))) : ?>
                                                <?php foreach (show_data_multiple('support', 'id', $row['id']) as $row) : ?>
                                                    <div class="cell" data-title="Action">
                                                        <a class="" style="cursor: pointer; color: white;" data-bs-toggle="modal" data-bs-target="#VIEW-1234567890<?php echo $row['id']; ?>">
                                                            <span style=" color: black;"> <img style="width: 50px;" src="/distant-elogistics/images/eye.png"> </span>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="VIEW-1234567890<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: Agrandir-Tight; color: white;">Full Description</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <p style="font-family: Agrandir-Narrow; margin-top: 5px;">
                                                                                <?php echo $row['report_desc']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-danger" style="cursor: pointer; color: white;" data-bs-toggle="modal" data-bs-target="#Del-1234567890<?php echo $row['id']; ?>">
                                                            <!-- <a href="../../process/delete.php?report_id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                            Delete
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Del-1234567890<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: Agrandir-Tight; color: white;">Confirm Delete?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="../../process/delete.php?report_id=<?php echo $row['id'] ?>" class="btn btn-danger">Yes</a>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    </div>
                                </div>
                                    <div style="margin-top: 20%; width: 100%; text-align: center; font-family: Agrandir-GrandHeavy; font-size: 24px;">
                                        No Reports Yet.
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