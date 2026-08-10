<?php
    include("check_user.php");
    include '../../process/functions.php';
    $data = show_data('parcels', 'sender_id', $_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Parcel Status</title>
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
		<div id="user-body" class="d-flex align-items-stretch" style="min-height: 200%;">
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
                        <a href="send-parcel.php" class="nav-link text-white">
                            Send Parcel
                        </a>
                    </li>
                    <li>
                        <a href="parcel-status.php" class="nav-link active fnt" aria-current="page">
                            Parcel Status
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="head-content">Parcel Status</h2>
                <p class="contp" style="margin-bottom: 40px;" >Check your parcel status here and previous sent parcels.</p>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">
                                <div class="row-user header-tbluser nohover">
                                    <div class="cell">
                                        <br>Tracking ID
                                    </div>
                                    <div class="cell">
                                        Receiver's<br>Name
                                    </div>
                                    <div class="cell">
                                        Receiver's<br>Location
                                    </div>
                                    <div class="cell">
                                        Receiver's<br>Contact
                                    </div>
                                    <div class="cell">
                                        <br>Weight
                                    </div>
                                    <div class="cell">
                                        <br>Price
                                    </div>
                                    <div class="cell">
                                        <br>Status
                                    </div>
                                </div>
                                
                                <?php if (!empty(show_data_multiple('parcels', 'sender_id', $_SESSION['id']))) : ?>
                                    <?php foreach (show_data_multiple('parcels', 'sender_id', $_SESSION['id']) as $row) : ?>
                                        <div class="row-user">
                                            <div class="cell" data-title="Tracking ID">
                                                <!-- Button trigger modal -->
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" title="Click to show parcel details." data-bs-toggle="modal" data-bs-target="#<?php echo $row['tracking_id'] ?>">
                                                    <?php echo $row['tracking_id'] ?>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="<?php echo $row['tracking_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white;">Parcel Status</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php if ($row['status'] == 'To Be Approve') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold;">
                                                                        Parcel is subject for approval. Please wait, thank you.
                                                                    </p>
                                                                <?php } elseif ($row['status'] == 'Approved') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $_SESSION['address'] ?>&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Parcel is approved. Waiting for driver's confirmation...
                                                                    </p>
                                                                <?php } elseif ($row['status'] == 'Pending') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->

                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Parcel is on pending. Please Wait.
                                                                    </p>
                                                                <?php } elseif ($row['status'] == 'To Be Pick Up') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $_SESSION['address'] ?>&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        The parcel is to be picked up to your location.
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-1') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Colon+Cebu+City&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 1
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-2') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Mandaue+City&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 2
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-51') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=San+Fernando&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 3
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-4') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Madridejos&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 4
                                                                   </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-5') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Santa+Fe&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 5
                                                                    </p>
                                                                      <?php } elseif ($row['parcel_location'] == 'warehouse-6') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Daanbantayan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 6
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-7') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Medellin&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 7
                                                                    </p>
                                                                    
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-8') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=San+Remigio&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 8
                                                                    </p>
                                                                    
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-9') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Tabogon&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 9
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-10') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Tabuelan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 10
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-11') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Borbon&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 11
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-12') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Sogod&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 12
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-13') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Tuburan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 13
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-14') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Catmon&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 14
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-15') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Carmen&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 15
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-16') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Danao&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 16
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-17') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Asturias&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 17
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-18') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Balamban&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 18
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-19') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Toledo&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 19
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-20') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Compostela&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 20
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-21') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Liloan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 21
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-22') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Consolacion&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 22
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-23') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Lapu+Lapu&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 23
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-24') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Cordova&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 24
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-25') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Minglanilla&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 25
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-26') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Naga&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 26
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-27') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=San+Fernando&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 27
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-28') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Pinamungahan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 28
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-29') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Aloguinsan=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 29
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-30') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Talisay&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 30
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-31') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Carcar&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 31
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-32') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Barili&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 32
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-33') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Dumanjug&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 33
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-34') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Ronda&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 34
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-35') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Alcantara&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 35
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-36') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Moalboal&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 36
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-37') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Badian&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 37
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-38') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Alegria&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 38
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-39') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Malabuyoc&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 39
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-40') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Ginatilan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 40
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-41') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Samboan&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 41
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-42') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Santander&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 42
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-43') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Oslob&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 43
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-44') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Boljoon&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 44
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-45') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Alcoy&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 45
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-46') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Dalaguete&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 46
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-47') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Argao&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 47
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-48') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Sibonga&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 48
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'warehouse-49') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Bogo&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 49
                                                                    </p>
                                                                 <?php } elseif ($row['parcel_location'] == 'warehouse-50') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Pilar&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Warehouse 50
                                                                    </p>
                                                                <?php } elseif ($row['parcel_location'] == 'Receiver Location') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $row['address'] ?>&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Receiver's Location
                                                                    </p>
                                                                <?php } elseif ($row['status'] == 'Delivered') { ?>
                                                                    <!-- insert a map of a warehouse here or any images -->
                                                                    <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $row['address'] ?>&output=embed"></iframe>
                                                                    <!-- temporary placeholder -->
                                                                    <p style="font-family: Agrandir-TextBold; text-align:left; margin-top: 5px;">
                                                                        Parcel is delivered to receiver's location.
                                                                    </p>
                                                                <?php } ?>

                                                                <br>
                                                                <br>
                                                                
                                                                <p style="font-family: Agrandir-TextBold;">Paid?</p>
                                                                <?php if ($row['status'] == 'To Be Approve') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        NO
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($row['status'] == 'Approved') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        NO
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($row['status'] == 'To Be Pick Up') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        NO
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($row['status'] == 'Pending') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        NO
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        Yes
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($row['status'] == 'Delivered') : ?>
                                                                    <p style="font-family: Agrandir-Narrow;">
                                                                        Yes
                                                                    </p>
                                                                <?php endif; ?>

                                                                <br>
                                                                <br>

                                                                <p style="font-family: Agrandir-TextBold;">Price</p>
                                                                <p style="font-family: Agrandir-Narrow;">
                                                                    ₱ <?php echo $row['rate'] ?>.00
                                                                </p>

                                                                <br>
                                                                <br>

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
                                            <div class="cell" data-title="Receiver's Name">
                                                <?php echo $row['fullname'] ?>
                                            </div>
                                            <div class="cell" data-title="Receiver's Location">
                                                <?php echo $row['address'] ?>
                                            </div>
                                            <div class="cell" data-title="Receiver's Contact">
                                               <?php echo $row['contact'] ?>
                                            </div>
                                            <div class="cell" data-title="Weight">
                                                <?php echo $row['weight'] ?> kg
                                            </div>
                                            <div class="cell" data-title="Price">
                                                ₱ <?php echo $row['rate'] ?>.00
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
                                        </div>
                                    <?php endforeach ?>
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