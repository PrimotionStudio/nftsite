<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$collection_name = $_POST["collection_name"];
	if (!$collection_name || $collection_name == "") {
		$_SESSION["alert"] = "Collection Name Must Be Provided";
		header("location: create-nfts");
		exit;
	}
	$select_dup_coll = "SELECT * FROM collections WHERE user_id='".$get_user["id"]."' && name='$collection_name'";
	$query_dup_coll = mysqli_query($con, $select_dup_coll);
	if (mysqli_num_rows($query_dup_coll) == 0) {
		
	}
}