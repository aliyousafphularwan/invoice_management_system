<?php

	$itmid = $_GET['itmid'];

	$query = mysqli_query($conn, "DELETE FROM pos WHERE id = '$itmid'");
	if ($query) {
		echo "deleted";
	}else{
		echo "not deleted";
	}

?>