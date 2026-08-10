<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once (__ROOT__."/process/functions.php");
    require_once (__ROOT__."/process/remember.php");

    if (isset($_POST['login'])) {
 
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        login($email,$password);
 
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
        <title>DISTANT. - Sign In</title>
        <link rel="icon" type="image/png" href="/distant-elogistics/images/Distant. - Icon v1.png"/>
        <link href="/distant-elogistics/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <link href="/distant-elogistics/css/font-awesome.css" rel="stylesheet">

        <link href="/distant-elogistics/js/register/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="/distant-elogistics/js/register/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <link href="/distant-elogistics/css/reg_sign.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <a class="d-flex justify-content-center" href="/distant-elogistics/">
                            <img style="width: 80%; margin-bottom: 20px;" src="/distant-elogistics/images/DISTANT. - Logo.svg">
                        </a> <br>
                        <h2 class="mt-2 txt">SIGN IN TO START YOUR SESSION</h2> <br>
                        <form action="" method="post">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="" class="form-border form-control" maxlength="100" required autofocus></input>
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="" class="form-border form-control" maxlength="20" required></input>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" checked />
                                <label for="remember" style="font-size: 15px; font-family: Agrandir-TextBold;">Remember Me</label>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary pull-right" value="Sign In"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="/distant-elogistics/js/register/jquery/jquery.min.js"></script>

        <script src="/distant-elogistics/js/register/select2/select2.min.js"></script>
        <script src="/distant-elogistics/js/register/datepicker/moment.min.js"></script>
        <script src="/distant-elogistics/js/register/datepicker/daterangepicker.js"></script>

        <script src="/distant-elogistics/js/global.js"></script>
    </body>
</html>