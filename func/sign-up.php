<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	if ($password != $confirm) {
		$_SESSION["alert"] = "Passwords do not match";
		header("location: sign-up");
		exit;
	} else {
		$select_duplicate = "SELECT id, username, email FROM users
							WHERE username='$username' || email='$email' && verified='true'";
		$query_duplicate = mysqli_query($con, $select_duplicate);
		if (mysqli_num_rows($query_duplicate) != 0) {
			$_SESSION["alert"] = "Username or Email is already in use.";
			header("location: sign-up");
			exit;
		} else {
			$create_user = "INSERT INTO users (username, email, password)
							VALUES ('$username', '$email', '$password')";
			$query_user = mysqli_query($con, $create_user);
			$user_id = mysqli_insert_id($con);

			// OTP Verification
			$otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
			$create_otp = "INSERT INTO otp (user_id, otp_type, otp_code)
							VALUES ('$user_id', 'verify', '$otp')";
			$query_otp = mysqli_query($con, $create_otp);

			// Send Mail Here
			$_SESSION["alert"] = "Your account has been created. Verify your account";
			$_SESSION["otp_mail"] = $email;
			$_SESSION["user_id"] = $user_id;
			header("location: verify");
			exit;
		}
	}
}
