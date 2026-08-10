<?php
    include("check_user.php");
    include '../../process/functions.php';

    $id = $_GET['id'];

    $order = show_data('parcels', 'id', $id);

    if(isset($_POST['update'])){
        $est = $_POST['est'];
        $est_time = $_POST['est_time'];
        $status = $_POST['status'];
        $location = $_POST['location'];

        driver_update_parcel($est,$est_time,$status,$location,$id);
    }

    if(isset($_POST['otw'])){
        $status = $_POST['status'];
        $location = $_POST['location'];

        driver_otw_parcel($status,$location,$id);
    }

    if(isset($_POST['pick'])){
        $pick_up = $_POST['pick_up'];
        $pick_up_time = $_POST['pick_up_time'];
        $status = $_POST['status'];
        $location = $_POST['location'];

        driver_pickup_parcel($pick_up,$pick_up_time,$status,$location,$id);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if (!empty(show_driver_request('id', $id))) : ?>
            <?php foreach (show_driver_request('id', $id) as $row) : ?>
                <?php if($row['status'] == 'Approved'): ?>
                    <title>DISTANT. - Pick Up Parcel</title>
                <?php endif; ?>
                <?php if($row['status'] == 'To Be Pick Up'): ?>
                    <title>DISTANT. - Update Parcel</title>
                <?php endif; ?>
                <?php  if($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse'): ?>
                    <title>DISTANT. - Update Parcel</title>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
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
                        <a href="index.php" class="nav-link text-white">
                            Dashboard
                        </a>
                    </li>
                    <?php if (!empty(show_driver_request('id', $id))) : ?>
                        <?php foreach (show_driver_request('id', $id) as $row) : ?>
                            <?php if($row['status'] == 'Approved' || $row['status'] == 'To Be Pick Up'): ?>
                                <li>
                                    <a href="pick-up.php" class="nav-link active fnt" aria-current="page">
                                        Pick Up
                                    </a>
                                </li>
                                <li>
                                    <a href="deliver.php" class="nav-link text-white">
                                        Deliver
                                    </a>
                                </li>
                            </ul>
                            <?php else : ?>
                                <li>
                                    <a href="pick-up.php" class="nav-link text-white">
                                        Pick Up
                                    </a>
                                </li>
                                <li>
                                    <a href="deliver.php" class="nav-link active fnt" aria-current="page">
                                        Deliver
                                    </a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
                                        <?php if (!empty(show_driver_request('id', $id))) : ?>
                                            <?php foreach (show_driver_request('id', $id) as $row) : ?>
                                                <?php if($row['status'] == 'Approved'): ?>
                                                    <div class="mb-3">
                                                        <input type="date" name="pick_up" value="<?php echo $order['pick_up'] ?>" id="" class="form-control" required >
                                                        <div class="form-text" style="text-transform: uppercase;">Estimated pick up date</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="time" name="pick_up_time" min="08:00" max="17:00" value="<?php echo $order['pick_up_time'] ?>" id="" class="form-control" required >
                                                        <div class="form-text" style="text-transform: uppercase;">Estimated pick up time</div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse'): ?>
                                                    <div class="mb-3">
                                                        <input type="date" name="est" value="<?php echo $order['est'] ?>" id="" class="form-control" required>
                                                        <div class="form-text" style="text-transform: uppercase;">Estimated date of arrival</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="time" name="est_time" min="08:00" max="17:00" value="<?php echo $order['est_time'] ?>" id="" class="form-control" required >
                                                        <div class="form-text" style="text-transform: uppercase;">Estimated time of arrival</div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="mb-3">
                                            <?php if (!empty(show_driver_request('id', $id))) : ?>
                                                <?php foreach (show_driver_request('id', $id) as $row) : ?>
                                                    <?php if($row['status'] == 'Approved'): ?>
                                                        <select name="status" id="" class="form-select" required>
                                                                <option value="To Be Pick Up">To Be Pick Up</option>
                                                        </select>
                                                    <?php endif; ?>
                                                    <?php if($row['status'] == 'To Be Pick Up'): ?>
                                                        <select name="status" id="" class="form-select" required>
                                                                <option value="On The Way">On The Way </option>
                                                        </select>
                                                    <?php endif; ?>
                                                    <?php if($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse'): ?>
                                                        <select name="status" id="" class="form-select" required>
                                                                <option value="On The Way">On The Way </option>
                                                                <option value="Delivered">Delivered</option>
                                                                <option value="Return to Warehouse">Return to Warehouse</option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <div class="form-text" style="text-transform: uppercase;">Change Status</div>
                                        </div>
                                        <div class="mb-3">
                                            <?php if (!empty(show_driver_request('id', $id))) : ?>
                                                <?php foreach (show_driver_request('id', $id) as $row) : ?>
                                                    <?php if($row['status'] == 'Approved'): ?>
                                                        <select name="location" id="" class="form-select" required>
                                                                <option value="Sender Location">Sender's Location</option>
                                                        </select>
                                                    <?php endif; ?>
                                                    <?php if($row['status'] == 'To Be Pick Up'): ?>
                                                        <select name="location" id="" class="form-select" required>
                                                            <option value="warehouse-1">Warehouse 1 - Colon, Cebu City</option>
                                                            <option value="warehouse-2">Warehouse 2 - Mandaue, Cebu City</option>
                                                            <option value="warehouse-3">Warehouse 3 - San Fernando</option>
                                                            <option value="warehouse-4">Warehouse 4 - Madridejos</option>
                                                            <option value="warehouse-5">Warehouse 5 - Santa Fe</option>
                                                            <option value="warehouse-6">Warehouse 6 - Daanbantayan</option>
                                                            <option value="warehouse-7">Warehouse 7 - Medellin</option>
                                                            <option value="warehouse-8">Warehouse 8 - San Remigio</option>
                                                            <option value="warehouse-9">Warehouse 9 - Tabogon</option>
                                                            <option value="warehouse-10">Warehouse 10 - Tabuelan </option>
                                                            <option value="warehouse-11">Warehouse 11 - Borbon</option>
                                                            <option value="warehouse-12">Warehouse 12 - Sogod</option>
                                                            <option value="warehouse-13">Warehouse 13 - Tuburan</option>
                                                            <option value="warehouse-14">Warehouse 14 - Catmon</option>
                                                            <option value="warehouse-15">Warehouse 15 - Carmen</option>
                                                            <option value="warehouse-16">Warehouse 16 - Danao</option>
                                                            <option value="warehouse-17">Warehouse 17 - Asturias</option>
                                                            <option value="warehouse-18">Warehouse 18 - Balamban</option>
                                                            <option value="warehouse-19">Warehouse 19 - Toledo</option>
                                                            <option value="warehouse-20">Warehouse 20 - Compostela</option>
                                                            <option value="warehouse-21">Warehouse 21 - Liloan</option>
                                                            <option value="warehouse-22">Warehouse 22 - Consolacion</option>
                                                            <option value="warehouse-23">Warehouse 23 - Lapu Lapu</option>
                                                            <option value="warehouse-24">Warehouse 24 - Cordova</option>
                                                            <option value="warehouse-25">Warehouse 25 - Minglanilla</option>
                                                            <option value="warehouse-26">Warehouse 26 - Naga</option>
                                                            <option value="warehouse-27">Warehouse 27 - San Fernando</option>
                                                            <option value="warehouse-28">Warehouse 28 - Pinamungahan</option>
                                                            <option value="warehouse-29">Warehouse 29 - Aloguinsan</option>
                                                            <option value="warehouse-30">Warehouse 30 - Talisay</option>
                                                            <option value="warehouse-31">Warehouse 31 - Carcar</option>
                                                            <option value="warehouse-32">Warehouse 32 - Barili</option>
                                                            <option value="warehouse-33">Warehouse 33 - Dumanjug</option>
                                                            <option value="warehouse-34">Warehouse 34 - Ronda</option>
                                                            <option value="warehouse-35">Warehouse 35 - Alcantara</option>
                                                            <option value="warehouse-36">Warehouse 36 - Moalboal</option>
                                                            <option value="warehouse-37">Warehouse 37 - Badian</option>
                                                            <option value="warehouse-38">Warehouse 38 - Alegria</option>
                                                            <option value="warehouse-39">Warehouse 39 - Malabuyoc</option>
                                                            <option value="warehouse-40">Warehouse 40 - Ginatilan</option>
                                                            <option value="warehouse-41">Warehouse 41 - Samboan</option>
                                                            <option value="warehouse-42">Warehouse 42 - Santander</option>
                                                            <option value="warehouse-43">Warehouse 43 - Oslob</option>
                                                            <option value="warehouse-44">Warehouse 44 - Boljoon</option>
                                                            <option value="warehouse-45">Warehouse 45 - Alcoy</option>
                                                            <option value="warehouse-46">Warehouse 46 - Dalaguete</option>
                                                            <option value="warehouse-47">Warehouse 47 - Argao</option>
                                                            <option value="warehouse-48">Warehouse 48 - Sibonga</option>
                                                            <option value="warehouse-49">Warehouse 49 - Bogo City</option>
                                                            <option value="warehouse-50">Warehouse 50 - Pilar</option>
                                                        </select>
                                                    <?php endif; ?>
                                                    <?php if($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse'): ?>
                                                        <select name="location" id="" class="form-select" required>
                                                            <option value="Receiver Location">Receiver's Location</option>
                                                            <option value="warehouse-1">Warehouse 1 - Colon, Cebu City</option>
                                                            <option value="warehouse-2">Warehouse 2 - Mandaue, Cebu City</option>
                                                            <option value="warehouse-3">Warehouse 3 - San Fernando</option>
                                                            <option value="warehouse-4">Warehouse 4 - Madridejos</option>
                                                            <option value="warehouse-5">Warehouse 5 - Santa Fe</option>
                                                            <option value="warehouse-6">Warehouse 6 - Daanbantayan</option>
                                                            <option value="warehouse-7">Warehouse 7 - Medellin</option>
                                                            <option value="warehouse-8">Warehouse 8 - San Remigio</option>
                                                            <option value="warehouse-9">Warehouse 9 - Tabogon</option>
                                                            <option value="warehouse-10">Warehouse 10 - Tabuelan </option>
                                                            <option value="warehouse-11">Warehouse 11 - Borbon</option>
                                                            <option value="warehouse-12">Warehouse 12 - Sogod</option>
                                                            <option value="warehouse-13">Warehouse 13 - Tuburan</option>
                                                            <option value="warehouse-14">Warehouse 14 - Catmon</option>
                                                            <option value="warehouse-15">Warehouse 15 - Carmen</option>
                                                            <option value="warehouse-16">Warehouse 16 - Danao</option>
                                                            <option value="warehouse-17">Warehouse 17 - Asturias</option>
                                                            <option value="warehouse-18">Warehouse 18 - Balamban</option>
                                                            <option value="warehouse-19">Warehouse 19 - Toledo</option>
                                                            <option value="warehouse-20">Warehouse 20 - Compostela</option>
                                                            <option value="warehouse-21">Warehouse 21 - Liloan</option>
                                                            <option value="warehouse-22">Warehouse 22 - Consolacion</option>
                                                            <option value="warehouse-23">Warehouse 23 - Lapu Lapu</option>
                                                            <option value="warehouse-24">Warehouse 24 - Cordova</option>
                                                            <option value="warehouse-25">Warehouse 25 - Minglanilla</option>
                                                            <option value="warehouse-26">Warehouse 26 - Naga</option>
                                                            <option value="warehouse-27">Warehouse 27 - San Fernando</option>
                                                            <option value="warehouse-28">Warehouse 28 - Pinamungahan</option>
                                                            <option value="warehouse-29">Warehouse 29 - Aloguinsan</option>
                                                            <option value="warehouse-30">Warehouse 30 - Talisay</option>
                                                            <option value="warehouse-31">Warehouse 31 - Carcar</option>
                                                            <option value="warehouse-32">Warehouse 32 - Barili</option>
                                                            <option value="warehouse-33">Warehouse 33 - Dumanjug</option>
                                                            <option value="warehouse-34">Warehouse 34 - Ronda</option>
                                                            <option value="warehouse-35">Warehouse 35 - Alcantara</option>
                                                            <option value="warehouse-36">Warehouse 36 - Moalboal</option>
                                                            <option value="warehouse-37">Warehouse 37 - Badian</option>
                                                            <option value="warehouse-38">Warehouse 38 - Alegria</option>
                                                            <option value="warehouse-39">Warehouse 39 - Malabuyoc</option>
                                                            <option value="warehouse-40">Warehouse 40 - Ginatilan</option>
                                                            <option value="warehouse-41">Warehouse 41 - Samboan</option>
                                                            <option value="warehouse-42">Warehouse 42 - Santander</option>
                                                            <option value="warehouse-43">Warehouse 43 - Oslob</option>
                                                            <option value="warehouse-44">Warehouse 44 - Boljoon</option>
                                                            <option value="warehouse-45">Warehouse 45 - Alcoy</option>
                                                            <option value="warehouse-46">Warehouse 46 - Dalaguete</option>
                                                            <option value="warehouse-47">Warehouse 47 - Argao</option>
                                                            <option value="warehouse-48">Warehouse 48 - Sibonga</option>
                                                            <option value="warehouse-49">Warehouse 49 - Bogo City</option>
                                                            <option value="warehouse-50">Warehouse 50 - Pilar</option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <div class="form-text" style="text-transform: uppercase;">Parcel Location</div>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <?php if (!empty(show_driver_request('id', $id))) : ?>
                                                <?php foreach (show_driver_request('id', $id) as $row) : ?>
                                                    <?php if($row['status'] == 'Approved'): ?>
                                                        <button type="submit" name="pick" class="btn btn-primary">Pick Up</button>
                                                    <?php endif; ?>
                                                    <?php if($row['status'] == 'To Be Pick Up'): ?>
                                                        <button type="submit" name="otw" class="btn btn-primary">Update</button>
                                                    <?php endif; ?>
                                                    <?php  if($row['status'] == 'On The Way' || $row['status'] == 'Return to Warehouse'): ?>
                                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
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