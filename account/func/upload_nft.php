<?php
require_once("../../required/session.php");
require_once("../../required/sql.php");
require_once("auth.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nft_name = $_POST["nft_name"];
	$collection = $_POST["collection"];
	if ($_FILES['nft_image']["name"] == "") {
		$_SESSION["alert"] =  "An error occured while uploading your file";
		header("location: create-nfts");
		exit;
	}
	$file_name = $_FILES['nft_image']['name'];
	$file_size = $_FILES['nft_image']['size'];
	$file_tmp = $_FILES['nft_image']['tmp_name'];
	$dot = explode('.', $file_name);
	$file_ext = strtolower(end($dot));
	$allowed_formats = ["jpg", "jpeg", "png", "gif"];
	$file_format = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
	if (!in_array($file_format, $allowed_formats)) {
		$_SESSION["alert"] =  "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
		header("location: create-nfts");
		exit;
	}
	if (($file_size > (10 * 1024 * 1024)) || ($file_size < 0)) {
		$_SESSION["alert"] = "Your file must be at most 10mb";
	}
	try {
		$select_coll = "SELECT * FROM collections WHERE user_id='" . $get_user["id"] . "' && id='$collection'";
		$query_coll = mysqli_query($con, $select_coll);
		if (mysqli_num_rows($query_coll) == 0) {
			$_SESSION["alert"] = "Collection not found";
			header("location: create-nfts");
			exit;
		}
		$get_coll = mysqli_fetch_assoc($query_coll);
		$select_nft = "SELECT * FROM nfts WHERE user_id='" . $get_user["id"] . "' && collection_id='$collection' && name='$nft_name'";
		$query_nft = mysqli_query($con, $select_nft);
		if (mysqli_num_rows($query_nft) != 0) {
			$_SESSION["alert"] = "A NFT with that a name already exist - Change It";
			header("location: ../create-nfts");
			exit;
		}
		$new_file_name = "../uploads/nft-" . date("Y-m-d-h:i:sa") . rand(0,999999) . "." . $file_ext;
		move_uploaded_file($file_tmp, $new_file_name);
		$nft_image = str_replace("../", "", $new_file_name);
		$insert_nft = "INSERT INTO nfts (user_id, collection_id, name, file) VALUES ('" . $get_user["id"] . "', '$collection', '$nft_name', '$nft_image')";
		$query_nft = mysqli_query($con, $insert_nft);
		$_SESSION["alert"] = "NFT uploaded successfully";
		header("location: ../create-nfts");
		exit;
	} catch (Exception $e) {
		$_SESSION["alert"] = "Error: An error occured";
		header("location: ../create-nfts");
		exit;
	}
}
