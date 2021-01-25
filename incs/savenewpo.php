<?php

	require 'dbc.php';

	$po = $_POST['po'];
	$date = $_POST['date'];
	$client = $_POST['client'];
	$desc = $_POST['desc'];
	$qty = $_POST['qty'];

	$select = mysqli_query($conn, "SELECT * FROM pos WHERE po_no = '$po'");
	if (mysqli_num_rows($select) > 0) {
		echo "po # already registered";	
	}else{
		$insert = mysqli_query($conn, "INSERT INTO pos (po_no, po_date, po_client, description, qty) VALUES ('$po', '$date', '$client', '$desc', '$qty')");
		if (!$insert) {
			echo "error inserting data.";
		}else{
			echo "insertion success.";
		}
	}

?>