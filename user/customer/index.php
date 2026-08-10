<?php
    include("check_user.php");
    include '../../process/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Customer</title>
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
		<div id="user-body" class="d-flex align-items-stretch" style="min-height: 90%;">
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
                        <a href="send-parcel.php" class="nav-link text-white">
                            Send Parcel
                        </a>
                    </li>
                    <li>
                        <a href="parcel-status.php" class="nav-link text-white">
                            Parcel Status
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="head-content">Dashboard</h2>
                <p class="contp">Send your parcels now, free pick-up delivery around Cebu Province only.</p>
                <table class="container-fluid center" style="width: 10%">
                    <tbody>
                        <tr>
                            <div class="map-container d-flex justify-content-center">
                            </div>
                        </tr>
                        <!-- <tr>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="form-outline">
                                        <input type="text" type="text" name="order_id" class="form-border form-control entertrack" style="padding: 25px;" id="form1" placeholder="ENTER TRACKING NUMBER">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <div class="form-outline" id="trace">
                                        <button class="btn btn-primary btn-trace" type="submit">TRACE IT NOW</button>
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
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