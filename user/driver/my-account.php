<?php
    include("check_user.php");
    include '../../process/functions.php';

    
    $lic = $_SESSION["driver_lic"];

    if(isset($_POST['upload'])){
        $img = $_FILES['img']['name'];
        $target_dir = 'images/';
        $target_file = $target_dir.basename($img);
        
        $_SESSION["img"] = $img;

        $validate = upload_img($img,$_SESSION['id']);
        if($validate == 1){
            move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
        }else{
            echo "EHH!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - Driver's Account</title>
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
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="head-content">Driver's Account</h2>
                <div style="margin-top: 40px;">
                    <table style="width: 70%; margin: 0 auto;">
                        <tr>
                            <td style="width: 40%;">
                                <?php if (empty($_SESSION['img'])) : ?>
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img src="../../images/placeholder.png" alt="" class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="form-text">Upload Profile Picture</div>
                                                <div class="input-group">
                                                    <input type="file" name="img" id="" style="padding-top: 10px; border-radius: 5px;" class="form-border form-control input101" required accept="image/png, image/gif, image/jpeg">
                                                    <button class="btn btn-primary" name="upload"> <span><img src="../../images/upload.png" style="width: 20px;" alt=""></span> </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img src="images/<?php echo $_SESSION['img'] ?>" alt="" class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-text">Update profile picture.</div>
                                        <div class="input-group">
                                            <input type="file" name="img" id="" style="padding-top: 10px; border-radius: 5px;" class="form-border form-control input101" required accept="image/png, image/gif, image/jpeg">
                                            <button class="btn btn-primary" name="upload"> <span><img src="../../images/upload.png" style="width: 20px;" alt=""></span> </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif ?> 
                            </td>
                            <td style="width: 5%;"></td>
                            <td>
                                <div class="card card-body" style="width: 100%; margin: 0 auto;">
                                    <p style="font-family: Agrandir-Narrow; font-size: 28px;"> <span style="font-family: Agrandir-TextBold;">Driver's License:</p>
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img src="images/driver-licenses/<?php echo $_SESSION['driver_lic'] ?>" alt="" class="card-img-top">
                                        </div>
                                    </div>
                                    <br>
                                    <form action="" method="post">
                                        <p style="font-family: Agrandir-Narrow; font-size: 28px;"> <span style="font-family: Agrandir-TextBold;">Name:</span> <?php echo $_SESSION['fullname'] ?></p>
                                        <p style="font-family: Agrandir-Narrow; font-size: 28px;"> <span style="font-family: Agrandir-TextBold;">Address:</span> <?php echo $_SESSION['address'] ?></p>
                                        <p style="font-family: Agrandir-Narrow; font-size: 28px;"> <span style="font-family: Agrandir-TextBold;">Contact:</span> <?php echo $_SESSION['contact'] ?></p>
                                        <p style="font-family: Agrandir-Narrow; font-size: 28px;"> <span style="font-family: Agrandir-TextBold;">Vehicle:</span> <?php echo $_SESSION['vehicle'] ?></p>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
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