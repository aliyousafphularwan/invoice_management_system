<?php 
	include "incs/dbc.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select-country.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php
		if (isset($_SESSION["admin"])) {
			include "dashboard.php";
		}else{
			include "login.php";
		}
	?>

	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jautocalc.js"></script>
	<script type="text/javascript" src="js/bootstrap-select-country.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<script type="text/javascript">
<!--
	$(document).ready(function() {
		$('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2});
		$('form[name=cart]').jAutoCalc({decimalPlaces: 2});

	});
//-->

</body>
</html>