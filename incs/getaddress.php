<?php

	require 'dbc.php';

	$customer = $_POST['customer'];

	$getclient = mysqli_query($conn, "SELECT full_name, address FROM customer WHERE full_name LIKE '%$customer%'");
	if (mysqli_num_rows($getclient) > 0) {
		while ($row = mysqli_fetch_array($getclient)) {
			$res['fullname'] = $row['full_name'];
			$res['address'] = $row['address'];
		}
	}else{
		echo "no client found.";
	}

?>