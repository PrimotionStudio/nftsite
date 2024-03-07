<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$select_user = "SELECT id, username, email, password FROM users
					WHERE username='$email' || email='$email'";
	$query_user = mysqli_query($con, $select_duplicate);
	if (mysqli_num_rows($query_user) != 0) {
		$_SESSION["alert"] = "Cannot find account linked with that username or email.";
		header("location: sign-in");
	} else {
		if ($c_password != $password) {
			$_SESSION["alert"] = "Invalid Login Credentials";
			header("location: sign-in");
		} else {
			$loginkey = password_hash(time(), PASSWORD_BCRYPT);
			$login_user = "UPDATE users SET loginkey='$loginkey'
							WHERE username='$username' email='$email'";
			$query_login = mysqli_query($con, $login_user);
			$_SESSION["loginkey"] = $loginkey;
			$_SESSION["user_id"] = mysqli_fetch_assoc($query_user)["id"];
			$_SESSION["alert"] = "Your account has been created";
			header("location: account/");
		}
	}
}
