<div class="container-fluid" id="header-user">
    <div class="navbar">
        <a href="/distant-elogistics/user/admin/"><img class="logo-hdr" src="/distant-elogistics/images/DISTANT. - Logo.svg"></a>
        <?php
            error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
            session_start();
            $sql = "SELECT fullname,address,email,password,contact FROM users WHERE email = ?";
            if($_SESSION['fullname']==true) {
                echo '<div class="dropdown" style="padding-right: 80px;">';
                echo '<button onclick="myFunction()" class="dropbtn"> <i class="fa fa-user" style="padding-right: 1em;"></i>';
                echo $_SESSION["fullname"];
                echo '</button>';
                echo '<div id="myDropdown" class="dropdown-content">';
                echo '<a href="/distant-elogistics/process/sign-out.php">Sign Out</a>';
                echo '</div>';
                echo '</div>';
            }
            elseif($_SESSION['fullname']==false) {
                header("location: /distant-elogistics/process/sign-in_error_page.php");
            }
        ?>
    </div>
</div>