<div class="container mt-3">
	
	<div class="row">
		<form method="post" class="form-group">
			<div class="col-md-12">
				<select class="form-control" name="invtype">
					<option value="">select</option>
					<option value="Invoice">Invoice</option>
					<option value="Proforma Invoice">Proforma Invoice</option>
					<option value="Commercial Invoice">Commercial Invoice</option>
					<option value="Free Samples">Free Samples</option>
				</select>
				<button class="btn btn-success mt-3">select</button>
			</div>
		</form>
	</div>

</div>

<?php

	if (isset($_POST["invtype"])) {
		$type = $_POST['invtype'];

		if ($type == "Invoice") {
			echo "edit Invoice";
		}
		else if($type == "Proforma Invoice"){
			echo "edit Proforma Invoice";
		}
		else if($type == "Commercial Invoice"){
			echo "edit Commercial Invoice";
		}
		else if($type == "Free Samples"){
			echo "edit Free Samples";
		}else{
			echo "select invoice type";
		}

	}

?>