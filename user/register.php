<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once (__ROOT__."/process/functions.php");
    error_reporting (E_ALL ^ E_NOTICE);
    error_reporting(0);
    if(isset($_POST['register'])){
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];
        $contact  = $_POST['contact'];
        $confirm_pass_err = "";
        if($confirm_pass != $password){
            echo "<script>alert('Password don\'t match!. Please try again')</script>";
            $confirm_pass_err = "Password don't match. Please Enter Again.";
        }
        else{
            register($fullname,$address,$email,$password,$contact, 'USER-' . uniqid());
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Register</title>
        <link rel="icon" type="image/png" href="/distant-elogistics/images/Distant. - Icon v1.png"/>
        <link href="/distant-elogistics/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <link href="/distant-elogistics/css/font-awesome.css" rel="stylesheet">

        <link href="/distant-elogistics/js/register/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="/distant-elogistics/js/register/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <link href="/distant-elogistics/css/reg_sign.css" rel="stylesheet" media="all">
        <style>
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                margin: 0 auto;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            #myBtn{
                cursor: pointer;
            }
            
            /* The Close Button */
            .close {
            color: #aaaaaa;
            float: right;
            font-size: 48px;
            font-weight: bold;
            }

            .close:hover,
            .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="page-wrapper bg-gra-02 p-b-100" style="padding-top: 100px;">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <a class="d-flex justify-content-center" href="/distant-elogistics/">
                            <img style="width: 80%; margin-bottom: 20px;" src="/distant-elogistics/images/DISTANT. - Logo.svg">
                        </a> <br>
                        <h2 class="mt-2 txt">CREATE YOUR ACCOUNT</h2> <br>
                        <form enctype="multipart/form-data" class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy.'); return false; }">
                            <!-- /*
                            <div class="row row-space">
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>First Name</label>
                                    <input type="text" name="first_name"  placeholder="" class="form-border form-control input101 <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" required="required" maxlength="40"></input>
                                    <span class="focus-input101"></span>
                                    <div class="invalid-feedback"> <?php echo $first_name_err;?></div>
                                </div>
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Middle Name (Optional)</label>
                                    <input type="text" name="middle_name" placeholder="" class="form-border form-control input101 <?php echo (!empty($middle_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>" maxlength="40"></input>
                                    <span class="focus-input101"></span>
                                    <span class="invalid-feedback"><?php echo $middle_name_err;?></span>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="" class="form-border form-control input101 <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>" maxlength="40"></input>
                                    <span class="focus-input101"></span>
                                    <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                                </div>
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" placeholder="" class="form-border form-control input101 <?php echo (!empty($phone)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11"></input>
                                    <span class="focus-input101"></span>
                                    <span class="invalid-feedback"><?php echo $phone_err;?></span>
                                </div>
                            </div>
                            */ -->
                            <div class="row row-space">
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" id="" maxlength="100" class="form-border form-control input101" required="required" autofocus value="<?php echo $fullname; ?>" oninvalid="this.setCustomValidity('Please enter your full name here.')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Phone Number</label>
                                    <input type="text" name="contact" id="" placeholder="09xxxxxxxxx" class="form-border form-control input101" value="<?php echo $contact; ?>" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11">
                                </div>
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 10px;">
                                <label for="location">Address</label>
                                <input type="text" name="address" id="address" style="margin-bottom: 10px;" placeholder="Street Address / City / Province" maxlength="100" class="form-border form-control input101" value="<?php echo $address; ?>" required="required" oninvalid="this.setCustomValidity('Please enter your complete address here.')" oninput="this.setCustomValidity('')">
                                <?php
                                    if(empty($address)){
                                        echo '<iframe width="100%" id="map" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=Cebu&output=embed"></iframe>';
                                    }
                                    else{
                                        echo '<iframe width="100%" id="map" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=';
                                        echo $address;
                                        echo '&output=embed"></iframe>';
                                    }
                                ?>
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="you@example.com" id="" maxlength="100" class="form-border form-control input101" value="<?php echo $email; ?>" required="required">
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Create a strong password. Minimum of 8 characters." id="password" minlength="8" class="form-border form-control input101 <?php echo (!empty($password)) ? 'is-invalid' : ''; ?>" required="required" oninvalid="this.setCustomValidity('Please enter your strong password here.')" oninput="this.setCustomValidity('')">
                                <span class="invalid-feedback"><?php echo $confirm_pass_err; ?></span>
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_pass" placeholder="Confirm your strong password." id="confirm_pass" minlength="8" class="form-border form-control input101 <?php echo (!empty($confirm_pass_err)) ? 'is-invalid' : ''; ?>" required="required"  oninvalid="this.setCustomValidity('Please confirm your strong password here.')" oninput="this.setCustomValidity('')">
                                <span class="invalid-feedback"><?php echo $confirm_pass_err; ?></span>
                            </div>
                            <!--
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="" id="confirm_password" class="form-border form-control input101" minlength="8"></input>
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Profile Picture</label>
                                <input type="file" name="file" style="padding: 5px;" class="form-border form-control input101">
                            </div>
                            -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="checkAgree" id="agree" checked></input>
                                <label class="form-check-label" for="checkAgree">I agree to the DISTANT User agreement. Also understand how DISTANT intends to use my information.<a id="myBtn" style="text-decoration: none;"><br><b>[Privacy Policy]</b></a></label>
                            </div>
                            <br>
                            <button type="submit" name="register" class="btn btn-primary pull-right" value="Register">Register</button>
                            <div>
                                <a>
                                    Have an account?
                                    <a style="color: #7b7457; text-decoration: none;" href="sign-in.php"> Login <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal"  class="page-wrapper p-t-130 p-b-100 modal">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                <span class="close">&times;</span>
                        <a class="d-flex justify-content-center" href="/distant-elogistics/">
                            <img style="width: 80%; margin-bottom: 20px;" src="/distant-elogistics/images/DISTANT. - Logo.svg">
                        </a> <br>
                        <?php
                            require_once (__ROOT__."/privacy-policy/content.html")
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="/distant-elogistics/js/register/jquery/jquery.min.js"></script>

        <script src="/distant-elogistics/js/register/select2/select2.min.js"></script>
        <script src="/distant-elogistics/js/register/datepicker/moment.min.js"></script>
        <script src="/distant-elogistics/js/register/datepicker/daterangepicker.js"></script>

        <script src="/distant-elogistics/js/global.js"></script>
        
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

    </body>
</html>