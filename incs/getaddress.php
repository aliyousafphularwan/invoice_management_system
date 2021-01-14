<?php

	require 'dbc.php';

	$customer = $_POST['customer'];

	$getclient = mysqli_query($conn, "SELECT address FROM customer WHERE first_name = '$customer'");
	if (mysqli_num_rows($getclient) > 0) {
		while ($row = mysqli_fetch_array($getclient)) {
			echo $row['address'].", ".$row["country"];
		}
	}else{
		echo "no client found.";
	}

?>