<?php
    include("check_user.php");
    include '../../process/functions.php';

    $data = show_data('parcels', 'id', $row['id']);

    if (isset($_POST['add_driver'])) {
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $vehicle = $_POST['vehicle'];
        
        $img = $_FILES['img']['name'];
        $target_dir = 'images/';
        $target_file = $target_dir.basename($img);
        
        $_SESSION["img"] = $img;
    
        $validate = upload_img($img,$_row['id']);
        if($validate == 1){
            move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
        }else{
            echo "EHH!";
        }
        add_driver_admin($fullname,$address,$contact,$email,$password,$vehicle,$img);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Drivers</title>
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
        <div id="user-body" class="wrapper d-flex align-items-stretch" style="min-height: 120%;">
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
                        <a href="drivers.php" class="nav-link active fnt" aria-current="page">
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
                <h2 class="head-content">Drivers</h2>
                <button type="submit" style="margin-bottom: 40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId">
                    Add Driver
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: Agrandir-Tight; color: white;">Driver Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <input type="text" name="fullname" id="" class="form-control" required="required">
                                        <div class="form-text">Enter Driver's Full Name</div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="address" id="" class="form-control" required="required">
                                        <div class="form-text">Enter Driver's Address</div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="email" id="" class="form-control" required="required">
                                        <div class="form-text">Enter Driver's Email</div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" id="" class="form-control" required="required">
                                        <div class="form-text">Enter Driver's Password</div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="contact" id="" class="form-control" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11">
                                        <div class="form-text">Enter Driver's Phone Number</div>
                                    </div>
                                    <div class="mb-3">
                                        <select name="vehicle" id="" class="form-select" required>
                                            <option value="Motorcycle">Motorcycle</option>
                                            <option value="Truck">Truck</option>
                                        </select>
                                        <div class="form-text">Select Driver's Vehicle</div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="img" id="" style="padding-top: 10px; border-radius: 5px;" class="form-border form-control input101" required accept="image/png, image/gif, image/jpeg">
                                        <div class="form-text">Upload Driver's License</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="add_driver">Add Driver</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">
                                <div class="row-user header-tbluser nohover">
                                    <div class="cell">
                                        Name
                                    </div>
                                    <div class="cell">
                                        Address
                                    </div>
                                    <div class="cell">
                                        Phone Number
                                    </div>
                                    <div class="cell">
                                        Email Address
                                    </div>
                                    <div class="cell">
                                        Vehicle
                                    </div>
                                    <div class="cell">
                                        Action
                                    </div>
                                </div>
                                <?php if (!empty(show_drivers('users'))) : ?>
                                    <?php foreach (show_drivers('users') as $row) : ?>
                                        <div class="row-user">
                                            <div class="cell" data-title="Driver's Name">
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" title="Click to show driver's profile photo" data-bs-toggle="modal" data-bs-target="#DRIVER-1234<?php echo $row['id']; ?>">
                                                    <?php echo $row['fullname'] ?>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="DRIVER-1234<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white; text-transform: uppercase;">Driver's Profile Photo</h5>
                                                            </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <div class="card-header p-0">
                                                                    <img src="../driver/images/<?php echo $row['img'] ?>" alt="" class="card-img-top">
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
                                            <div class="cell" data-title="Address">
                                                <?php echo $row['address'] ?>
                                            </div>
                                            <div class="cell" data-title="Phone Number">
                                                <?php echo $row['contact'] ?>
                                            </div>
                                            <div class="cell" data-title="Email Address">
                                                <?php echo $row['email'] ?>
                                            </div>
                                            <div class="cell" data-title="Driver">
                                                <a class="text-decoration-none" style="cursor: pointer; font-family: Agrandir-TextBold;" title="Click to show driver's license" data-bs-toggle="modal" data-bs-target="#LICENSE-1234<?php echo $row['id']; ?>">
                                                    <?php echo $row['vehicle'] ?>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="LICENSE-1234<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: Agrandir-Tight; color: white; text-transform: uppercase;">Driver's License</h5>
                                                            </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <div class="card-header p-0">
                                                                    <img src="../driver/images/driver-licenses/<?php echo $row['driver_lic'] ?>" alt="" class="card-img-top">
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
                                            <div class="cell" data-title="Action">
                                                <!-- <a href="../../process/delete.php?user_id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                <?php
                                                    if($row['active']=='Y'){
                                                        echo '<a href="../../process/deactivate.php?user_id=';
                                                        echo $row['id'];
                                                        echo '"class="';
                                                        echo 'btn btn-danger"';
                                                        echo '>Deactivate</a>';
                                                    }else{
                                                        echo '<a href="../../process/activate.php?user_id=';
                                                        echo $row['id'];
                                                        echo '"class="';
                                                        echo 'btn btn-success"';
                                                        echo '>Activate</a>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    </div>
                                </div>
                                    <div style="margin-top: 20%; width: 100%; text-align: center; font-family: Agrandir-GrandHeavy; font-size: 24px;">
                                        No Drivers Yet
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