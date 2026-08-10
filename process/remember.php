<?php
if(!empty($_POST["login"])) {
    $conn = connect();
	 $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        if(!isset($_COOKIE["loggedin"])) {
             $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	}
        $result = $conn->query($sql);
	$user = $result->fetch_assoc();
	if($user) {
			$_SESSION["id"] = $user["id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("loggedin",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["loggedin"])) {
					setcookie ("loggedin","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
}
?>