<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$select_user = "SELECT id, username, email, password FROM users
					WHERE username='$email' || email='$email'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) == 0) {
		$_SESSION["alert"] = "Cannot find account linked with that username or email.";
		header("location: sign-in");
	} else {
		$getuser = mysqli_fetch_assoc($query_user);
		if ($getuser["password"] != $password) {
			$_SESSION["alert"] = "Invalid Login Credentials";
			header("location: sign-in");
		} else {
			$otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
			$_SESSION["otp_mail"] = $getuser["email"];
			$create_otp = "INSERT INTO otp (user_id, otp_type_ otp_code)
							VALUES ('" . $getuser["id"] . "', 'verify', '$otp')";
			$query_otp = mysqli_query($con, $create_otp);
			// Send Mail Here
			header("location: verify");
		}
	}
}
