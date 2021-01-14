<?php
	require 'dbc.php';
	
	$invtype = $_POST["invtype"];
	$invno = $_POST["invno"];
	$invdate = $_POST["invdate"];
	$itempo = $_POST["itempo"];
	$itemdesc = $_POST["itemdesc"];
	$itemhscode = $_POST["itemhscode"];
	$itemqty = $_POST["itemqty"];
	$itemprice = $_POST["itemprice"];
	$itemamount = $_POST["itemamount"];

	echo $invtype;
	echo "\n".count($itemhscode);

	// for ($count=0; $count < count($itempo); $count++) { 
	// 	$item_clean_po = mysqli_real_escape_string($conn, $itempo[$count]);
	// 	$item_clean_desc = mysqli_real_escape_string($conn, $itemdesc[$count]);
	// 	$item_clean_hscode = mysqli_real_escape_string($conn, $itemhscode[$count]);
	// 	$item_clean_qty = mysqli_real_escape_string($conn, $itemqty[$count]);
	// 	$item_clean_price = mysqli_real_escape_string($conn, $itemprice[$count]);
	// 	$item_clean_amount = mysqli_real_escape_string($conn, $itemamount[$count]);

	// 	// echo($item_clean_desc) or die(mysqli_error($conn));

	// 	$addinvoice = mysqli_query($conn, "INSERT INTO invoices (inv_type, inv_no, inv_date, inv_po, inv_desc, inv_hscode, inv_qty, inv_price, inv_amount) VALUES ('$invtype','$invno','$invdate','$item_clean_po','$item_clean_desc','$item_clean_hscode','$item_clean_qty','$item_clean_price','$item_clean_amount')") or die(mysqli_error($conn));

	// 	if (!$addinvoice) {
	// 		echo "insertion failed..." or die(mysqli_error($conn));
	// 	}else{
	// 		echo "insertion successfull.";
	// 	}

	// }

?>