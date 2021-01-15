<?php

	require 'dbc.php';

	if (isset($_POST["desc"])) {
		
		$desc = $_POST["desc"];
		// echo "you entered: ".$desc."\n";
		$query = mysqli_query($conn, "SELECT * FROM products WHERE description LIKE '%$desc%'");
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$data = $row['description'];		
			}
		}

	}else{
		echo "error, check ajax calling method.";
	}

	echo json_encode($data);

?>