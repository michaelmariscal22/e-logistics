<?php
    include '../process/functions.php';

    if (isset($_POST['report'])) {
        $report_name = $_POST['report_name'];
        $phone = $_POST['phone'];
        $report_email = $_POST['report_email'];
        $report_desc = $_POST['report_desc'];
        $report_id = $_SESSION['id'];
        $id = $_SESSION['id'];
    
        contact_support($report_name,$phone,$report_email,$report_desc,$report_id,$id);
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
        <title>DISTANT. - Contact Us</title>
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
                        </a>
                        <br>
                        <br>
                        <br>
                        <h1>Contact Us</h1>
                        <p>
                            Please fill this form in decent manner.
                        </p>
                        <br>
                        <br>
                        <form class="login100-form validate-form" action="" method="post">
                            <div class="row row-space">
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Name</label>
                                    <input type="text" name="report_name" id="" class="form-border form-control input101" maxlength="100">
                                </div>
                                <div class="col-2 form-group wrap-input100" style="margin-bottom: 20px;">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" id="" placeholder="09xxxxxxxxx" class="form-border form-control input101" pattern="^[0-9]{3,45}$" title="You can only enter numbers, with a minimal of 11 digits are accepted." required="required" minlength="11" maxlength="11">
                                </div>
                            </div>
                            <div class="form-group wrap-input100" style="margin-bottom: 20px;">
                                <label>Email</label>
                                <input type="email" name="report_email" id=""placeholder="you@example.com" class="form-border form-control input101" maxlength="100">
                            </div>
                            <textarea type="text" name="report_desc" id="" class="form-border form-control sprt" style="min-height: 230px;" placeholder="Please describe your problem with as much detail as possible. (For example, any specific error or bugs that you encountered in our system."></textarea>
                            <br>
                            <button type="submit" name="report" class="btn btn-primary pull-right" value="Submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require_once ("footer.php");
        ?> 
    </body>
</html>