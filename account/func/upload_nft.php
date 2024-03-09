<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nft_name = $_POST["nft_name"];
	$collection = $_POST["collection"];
	$nft_image = $_POST["nft_image"];
	if (!$collection_name || $collection_name == "") {
		$_SESSION["alert"] = "Collection Name Must Be Provided";
		header("location: create-nfts");
		exit;
	}
	try {
		$select_dup_coll = "SELECT * FROM collections WHERE user_id='" . $get_user["id"] . "' && name='$collection_name'";
		$query_dup_coll = mysqli_query($con, $select_dup_coll);
		if (mysqli_num_rows($query_dup_coll) != 0) {
			$_SESSION["alert"] = "A collection with that a name already exist - Change It";
			header("location: create-nfts");
			exit;
		} else {
			$insert_coll = "INSERT INTO collections (user_id, name) VALUES ('" . $get_user["id"] . "', '$collection_name')";
			$query_coll = mysqli_query($con, $insert_coll);
		}
	} catch (Exception $e) {
		$_SESSION["alert"] = "Error: An error occured";
		header("location: create-nfts");
		exit;
	}
}
