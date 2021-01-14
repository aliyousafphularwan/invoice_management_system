<?php

	require 'dbc.php';

	$data = array();
	$desc = $_POST["desc"];

	$getdata = mysqli_query($conn, "SELECT * FROM products WHERE description = '$desc'");
	if (mysqli_num_rows($getdata) > 0) {
		while ($row = mysqli_fetch_array($getdata)) {
			$data["description"] = $row["description"];
			$data["hscode"] = $row["hs_code"];
			$data["price"] = $row["price"];
		}
	}else{
		$data = 'no data found.';
	}

	echo json_encode($data);

?>