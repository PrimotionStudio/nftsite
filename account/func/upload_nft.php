<?php
require_once("../../required/session.php");
require_once("../../required/sql.php");
require_once("func/auth.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nft_name = $_POST["nft_name"];
	$collection = $_POST["collection"];
	$nft_image = $_POST["nft_image"];
	$target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    echo "Image uploaded successfully!";
	try {
		$select_dup_coll = "SELECT * FROM collections WHERE user_id='" . $get_user["id"] . "' && name='$collection_name'";
		$query_dup_coll = mysqli_query($con, $select_dup_coll);
		if (mysqli_num_rows($query_dup_coll) != 0) {
			$_SESSION["alert"] = "A collection with that a name already exist - Change It";
			header("location: ../create-nfts");
			exit;
		} else {
			$insert_coll = "INSERT INTO collections (user_id, name) VALUES ('" . $get_user["id"] . "', '$collection_name')";
			$query_coll = mysqli_query($con, $insert_coll);
		}
	} catch (Exception $e) {
		$_SESSION["alert"] = "Error: An error occured";
		header("location: ../create-nfts");
		exit;
	}
}
