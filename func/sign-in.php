<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$select_user = "SELECT id, username, email, password FROM users
					WHERE username='$email' || email='$email' && verified='true'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) == 0) {
		$_SESSION["alert"] = "Cannot find account linked with that username or email.";
		header("location: sign-in");
		exit;
	} else {
		$getuser = mysqli_fetch_assoc($query_user);
		if ($getuser["password"] != $password) {
			$_SESSION["alert"] = "Invalid Login Credentials";
			header("location: sign-in");
			exit;
		} else {
			$loginkey = password_hash(time(), PASSWORD_BCRYPT);
			$login_user = "UPDATE users SET loginkey='$loginkey'
							WHERE username='$email' || email='$email'";
			$query_login = mysqli_query($con, $login_user);
			$_SESSION["loginkey"] = $loginkey;
			$_SESSION["user_id"] = $getuser["id"];
			header("location: account/");
			exit;
		}
	}
}
