<?php
    include("check_user.php");
    include '../../process/functions.php';

    if (isset($_POST['add_parcel'])) {
        $fullname = $_POST['r_fullname'];
        $address = $_POST['r_address'];
        $contact = $_POST['r_contact'];
        $id = $_SESSION['id'];
        $weight = $_POST['weight'];
        $price = weight($weight);
    
        send_parcel($fullname, $address, $contact, $id, $weight, $price, 'DISTANT-' . uniqid());
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Send Parcel</title>
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
		<div id="user-body" id="user-body" class="d-flex align-items-stretch" style="min-height: 100%;">
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
                        <a href="send-parcel.php" class="nav-link active fnt" aria-current="page">
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
                <h2 class="head-content">Send Parcel</h2>
                <p style="color: black; margin-bottom: 40px; font-size: 19px; font-family: Agrandir-Narrow;"><span class="text-danger">Note:</span> Sending parcel are subject to admin's approval for security purposes.</p>
                <div style="width: 80%; margin: 0 auto;">
                    <table>
                        <form style="margin: 0 auto;" action="" method="post">
                            <div class="row row-space">
                                <div class="col-5 sndr">
                                    <div class="dtls">
                                        SENDER'S DETAILS
                                    </div>
                                    <div>
                                        <div class="customer-label">Sender's Name:</div>
                                        <input type="text" name="fullname" value="<?php echo $_SESSION['fullname'] ?>" id="" class="form-border form-control" style="padding: 15px; margin-bottom: 35px;">
                                    </div>
                                    <!--
                                    <div>
                                        <div class="customer-label">Parcel Name:</div>
                                        <input type="text" id="" name="" class="form-border form-control" style="padding: 15px; margin-bottom: 35px;">
                                    </div>
                                    -->
                                    <div>
                                        <label class="customer-label">Sender's Address:</label>
                                        <input type="text" name="address" value="<?php echo $_SESSION['address'] ?>" id="" class="form-border form-control" style="padding: 15px; margin-bottom: 15px;">
                                        <iframe width="100%" style="margin: 0 auto; border-radius: 25px; margin-bottom: 10px;" height="300" src="https://maps.google.com/maps?q=<?php echo $_SESSION['address']; ?>&output=embed"></iframe>
                                    </div>
                                    <!--
                                    <div>
                                        <label class="customer-label">Remarks:</label>
                                        <input type="text" id="parcel_desc" name="parcel_desc" class="form-border form-control" style="padding: 15px; margin-bottom: 35px;">
                                    </div>
                                    -->
                                    <div>
                                        <label class="customer-label">Sender's Phone Number:</label>
                                        <input type="number" name="contact" value="<?php echo $_SESSION['contact'] ?>" id="" class="form-border form-control" oninput="javascript: if (this.value.length > this.maxLength && this.minLength) this.value = this.value.slice(0, this.maxLength && this.minLength);" style="padding: 15px; margin-bottom: 35px;" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11">
                                    </div>
                                    <div>
                                        <label class="customer-label">Parcel Weight (kg):</label>
                                        <input type="number" name="weight" id="" min="1" max="200" maxlength="3" placeholder="1 - 200" class="form-border form-control"  style="padding: 15px; margin-bottom: 35px;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); else this.setCustomValidity('');" title="Enter here your item approximate weight. (0 - 200)" required="required"  oninvalid="this.setCustomValidity('Please enter here your item approximate weight. (0 - 200 kg)')">
                                    </div>
                                </div>
                                <div style="max-width: 1px">
                                    <div style="border-left: 1px solid gray; min-height:96%"></div>
                                </div>
                                <div class="col-5 rcvr">
                                    <div class="dtls">
                                        RECEIVER'S DETAILS
                                    </div>
                                    <div>
                                        <label class="customer-label">Receiver's Name:</label>
                                        <input type="text" name="r_fullname" id="" class="form-border form-control" style="padding: 15px; margin-bottom: 35px;" required="required" oninvalid="this.setCustomValidity('Please enter the full name of your receiver here.')" oninput="this.setCustomValidity('')" title="Enter the full name of your receiver here">
                                    </div>
                                    <div>
                                        <label class="customer-label">Receiver's Address:</label>
                                        <input type="text" name="r_address" id="" placeholder="Street Address / City / Province" class="form-border form-control" style="padding: 15px; margin-bottom: 15px;" required="required" oninvalid="this.setCustomValidity('Please enter the address of your receiver here.')" oninput="this.setCustomValidity('')" title="Enter the the address of your receiver here">
                                        <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Cebu&output=embed"></iframe>
                                        <!-- <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe> -->
                                        <!-- <?php
                                        if (isset($_POST["search_address"]))
                                        {
                                            $address = $_POST["r_address"];
                                            $address = str_replace(" ", "+", $address);
                                        ?> -->
                                            <iframe width="100%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                                        <!-- <?php
                                        }
                                        ?>
                                            <input type="submit" style="margin-bottom: 25px;" name="search_address" class="btn btn-primary" value="Display Map Address"> -->
                                    </div>
                                    <div>
                                        <label class="customer-label">Receiver's Phone Number:</label>
                                        <input type="NUMBER" name="r_contact" id="" placeholder="09xxxxxxxxx" class="form-border form-control" oninput="javascript: if (this.value.length > this.maxLength && this.minLength) this.value = this.value.slice(0, this.maxLength && this.minLength);" style="padding: 15px; margin-bottom: 35px;" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11">
                                    </div>
                                    <!--
                                    <div>
                                        <label class="customer-label">Receiver Email Address:</label>
                                        <input type="text" name="r_contact" id="" class="form-border form-control" style="padding: 15px; margin-bottom: 35px;">
                                    </div>
                                    -->
                                </div>
                            </div>
                            
                            <div class="d-flex pull-right">
                                <input type="submit" name="add_parcel" class="btn btn-primary btn-trace" value="Send your parcel now!">
                            </div>
                        </form>
                    </table>
                </div>
            </div>
		</div>
        <?php
            define('__ROOT__', dirname(dirname(dirname(__FILE__))));
            require_once (__ROOT__."/landing-page/footer.php");
        ?>
        <script>
            var number = Math.min(Math.max(parseInt(number), 1), 100);
        </script>
        <script src="/distant-elogistics/user/js/jquery.min.js"></script>
        <script src="/distant-elogistics/user/js/popper.js"></script>
        <script src="/distant-elogistics/user/js/bootstrap.min.js"></script>
        <script src="/distant-elogistics/user/js/main.js"></script>
        <script src="/distant-elogistics/js/jquery-3.6.0.min.js"></script>
        <script src="/distant-elogistics/js/main.js"></script>
    </body>
</html>