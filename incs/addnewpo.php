<?php

	require 'dbc.php';

	$desc = $_POST['podsc'];

	$query = mysqli_query($conn, "SELECT description from products WHERE art_no LIKE '%$desc%'");
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			$data['description'] = $row['description'];
		}
	}else{
		$data['description'] = "artical not found.";
	}

	echo json_encode($data);

?>