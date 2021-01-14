<?php
	
	$uname = $_POST["uname"];
	$pword = $_POST["pword"];

	if ($uname == 'admin' && $pword == 'admin321') {
		session_start();
		$_SESSION["admin"] = $uname;
	}else{
		echo "wrong username or password...";
	}

?>