<?php
	$user_email = $user_password = $user_confirm = $first_name = $middle_name = $last_name = $user_address = $phone = "";
	$user_email_err = $user_password_err = $user_confirm_err = $first_name_err = $middle_name_err = $last_name_err = $user_address_err = $phone_err = "";

	error_reporting(error_reporting() & ~E_NOTICE);

	// File upload path
	$targetDir = "../user/prof_pic/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	if(($_SERVER["REQUEST_METHOD"] == "POST") and (isset($_POST["checkAgree"])) && !empty($_FILES["file"]["name"])) {
		$input_first_name = trim($_POST["first_name"]);
		if(empty($input_first_name)){
			$first_name_err = "Please enter your first name.";
		} else{
			$first_name = $input_first_name;
		}
		$optional = array();
		$input_middle_name = trim($_POST["middle_name"]);
		if(empty($input_middle_name)){
			//$middle_name_err = "Please enter your middle name.";
			$optional[] = $middle_name;
		} else{
			$middle_name = $input_middle_name;
		} if(count($optional) > 0) {
			echo implode(' ', $optional).'\'s';
		}
		$input_last_name = trim($_POST["last_name"]);
		if(empty($input_last_name)){
			$last_name_err = "Please enter your last name.";
		} else{
			$last_name = $input_last_name;
		}
		$input_user_address = trim($_POST["user_address"]);
		if(empty($input_user_address)){
			$user_address_err = "Please enter your address.";
		} else{
			$user_address = $input_user_address;
		}
		$input_phone = trim($_POST["phone"]);
		if(empty($input_phone)){
			$phone_err = "Please enter your 11 digit phone number.";
		} else{
			$phone = $input_phone;
		}
		$input_user_email = trim($_POST["user_email"]);
		if(empty($input_user_email)){
			$user_email_err = "Please enter your email address.";
		} else{
			$user_email = $input_user_email;
		}
		$input_user_password = trim($_POST["user_password"]);
		if(empty($input_user_password)){
			$user_password_err = "Please enter your password.";
		} else {
			$user_password = $input_user_password;
		}
		$input_user_confirm = trim($_POST["user_confirm"]);
		if(empty($input_user_confirm)){
			$user_confirm_err = "Please confirm your password.";
		} else {
			$user_confirm = $input_user_confirm;
		}
		if ($input_user_password != $input_user_confirm) {
			$user_confirm_err = "Password don't match.";
		} else {
			if (empty($first_name_err) and empty($middle_name_err) and empty($last_name_err) and empty($user_address_err) and empty($phone_err) and empty($user_email_err) and empty($user_password_err) and empty($user_confirm_err)) {
				require_once "database_connection.php";
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
						// Insert image file name into database
						$sql = "INSERT INTO distant_users (first_name, middle_name, last_name, user_address, phone, user_email, user_password, date_registered, user_level, active, file_name, uploaded_on) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 4,1, '".$fileName."', NOW())";
						if($stmt = mysqli_prepare($conn, $sql)){
							mysqli_stmt_bind_param($stmt, "sssssss", $param_first_name, $param_middle_name, $param_last_name, $param_user_address, $param_phone, $param_user_email, $param_user_password);
							$param_first_name = $first_name;
							$param_middle_name = $middle_name;
							$param_last_name = $last_name;
							$param_user_address = $user_address;
							$param_phone = $phone;
							$param_user_email = $user_email;
							$param_user_password = password_hash($user_password, PASSWORD_DEFAULT);
							if(mysqli_stmt_execute($stmt)){
								header("location: /distant-elogistics/process/register_congrats_page.php");
								exit();
							} else {
								echo "Oops!<br>Something went wrong.<br>Please try again later.";
							}
							mysqli_stmt_close($stmt);
						}
						mysqli_close($conn);
					}
				}
			}
		}
	}
?>