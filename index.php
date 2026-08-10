<?php
    include("landing-page/check_user.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DISTANT. - E-Logistics</title>
        <link rel="icon" type="image/png" href="/distant-elogistics/images/Distant. - Icon v1.png"/>
        <link href="/distant-elogistics/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/distant-elogistics/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <link href="/distant-elogistics/css/font-awesome.css" rel="stylesheet"> 
    </head>
    <body class="bbg1">
        <?php
            require_once ("landing-page/header.php");
        ?>
        <table class="container-fluid center">
            <tbody>
                <tr>
                    <td> 
                        <?php
                            require_once ("landing-page/features.php");
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
            require_once ("landing-page/footer.php");
        ?>
    </body>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</html>