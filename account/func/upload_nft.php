<?php
require_once("../../required/session.php");
require_once("../../required/sql.php");
require_once("auth.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nft_name = $_POST["nft_name"];
	$collection = $_POST["collection"];
	$target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["nft_image"]["name"]);
    move_uploaded_file($_FILES["nft_image"]["tmp_name"], $target_file);
	try {
		$select_coll = "SELECT * FROM collections WHERE user_id='" . $get_user["id"] . "' && id='$collection'";
		$query_coll = mysqli_query($con, $select_coll);
		if (mysqli_num_rows($query_coll) == 0) {
			$_SESSION["alert"] = "Collection not found";
			header("location: create-nfts");
			exit;
		}
		$get_coll = mysqli_fetch_assoc($query_coll);
		$select_nft= "SELECT * FROM nfts WHERE user_id='" . $get_user["id"] . "' && collection_id='$collection' && name='$nft_name'";
		$query_nft = mysqli_query($con, $select_nft);
		if (mysqli_num_rows($query_nft) != 0) {
			$_SESSION["alert"] = "A NFT with that a name already exist - Change It";
			header("location: ../create-nfts");
			exit;
		}
		$insert_nft = "INSERT INTO nfts (user_id, collection_id, name, file) VALUES ('" . $get_user["id"] . "', '$collection', '$nft_name', '$target_file')";
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
