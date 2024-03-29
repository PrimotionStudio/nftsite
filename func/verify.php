<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_id = $_POST["user_id"];
	$mail = $_POST["mail"];
	$otp = $_POST["otp"];
	$select_user = "SELECT * FROM users
					WHERE id='$user_id' || email='$mail'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) == 0) {
		$_SESSION["alert"] = "Cannot find account";
		header("location: sign-in");
		exit;
	}

	$getuser = mysqli_fetch_assoc($query_user);
	$select_otp = "SELECT * FROM otp WHERE user_id='$user_id' && otp_code='$otp'";
	$query_otp = mysqli_query($con, $select_otp);
	if (mysqli_num_rows($query_otp) == 0) {
		$_SESSION["alert"] = "Invalid Verification Code";
		header("location: verify");
		exit;
	}
	$get_otp = mysqli_fetch_assoc($query_otp);
	if ($get_otp["otp_code"] != $otp) {
		$_SESSION["alert"] = "Invalid Verification Code";
		header("location: verify");
		exit;
	}
	$delete_otp = "DELETE FROM otp WHERE user_id='$user_id' && otp_code='$otp'";
	$query_del_otp = mysqli_query($con, $delete_otp);
	$loginkey = password_hash(time(), PASSWORD_BCRYPT);
	$login_user = "UPDATE users SET loginkey='$loginkey', verified='true'
					WHERE id='$user_id' || email='$mail'";
	$query_login = mysqli_query($con, $login_user);
	$_SESSION["loginkey"] = $loginkey;
	$_SESSION["user_id"] = $user_id;
	unset($_SESSION["otp_mail"]);
	header("location: account/");
	exit;
}
