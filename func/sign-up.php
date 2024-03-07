<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	echo 1;
	if ($password != $confirm) {
		echo 2;
		$_SESSION["alert"] = "Passwords do not match";
		header("location: sign-up");
	} else {
		echo 3;
		$select_duplicate = "SELECT id, username, email FROM users WHERE username=? || email=?";
		$stmt = mysqli_prepare($con, $select_duplicate);
		mysqli_stmt_bind_param($stmt, "ss", $username, $email);
		mysqli_stmt_execute($stmt);
		// $c_id = "id";
		// $c_username = "username";
		// $c_email = "email";
		// mysqli_stmt_bind_result($stmt, $c_id, $c_username, $c_email);
		while (mysqli_stmt_fetch($stmt)) {
			// echo "=> $c_id, $c_username, $c_email";
		}
		if ($stmt->num_rows != 0) {
			$_SESSION["alert"] = "Username or Email is already in use.";
			header("location: sign-up");
		} else {
			$create_user = "INSERT INTO users (username, email, password)
							VALUES (?, ?, ?)";
			$query = mysqli_prepare($con, $create_user);
			mysqli_stmt_bind_param($query, "sss", $username, $email, $password);
			mysqli_stmt_execute($query);
			$_SESSION["alert"] = "Your account has been created";
			header("location: sign-in");
		}
		mysqli_stmt_close($stmt);
		mysqli_stmt_close($query);
	}
}
