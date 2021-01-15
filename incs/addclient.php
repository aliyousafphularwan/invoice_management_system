<div class="container">
	
	<form method="post" class="my-5">
		<h4> New Client's Details </h4>
		<table class="table table-borderless">
			<tr>
				<td width="10%" class="px-2">
					<p>First Name <input type="text" name="cfname" id="cfname" required class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Last Name <input type="text" name="clname" id="clname" required class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="px-2">
					<p>Address <input type="text" name="caddress" id="caddress" required class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Country <select name="ccountry" class="form-control selectpicker countrypicker" data-flag="true" ></select></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="px-2">
					<p>Phone (Landline) <input type="text" name="cfone" required id="cfone" class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Mobile <input type="text" name="cmob" id="cmob" required class="form-control"></p>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<button name="btnsaveclient" class="btn btn-success float-right">Save Customer</button>
				</td>
			</tr>
		</table>
	</form>

</div>

<?php

	if (isset($_POST["btnsaveclient"])) {
		
		$fname = $_POST["cfname"];
		$lname = $_POST["clname"];
		$address = $_POST["caddress"];
		$country = $_POST["ccountry"];
		$phone = $_POST["cfone"];
		$mobile = $_POST["cmob"];

		$check = mysqli_query($conn, "SELECT * FROM customer WHERE phone = '$phone'");
		if (mysqli_num_rows($check) > 0) {
			echo "<script>alert('customer with same number already exist.');</script>";
		}else{
			$insert = mysqli_query($conn, "INSERT INTO customer (first_name, last_name, address, country, phone, mob) VALUES ('$fname', '$lname', '$address', '$country', '$phone', '$mobile')") or die(mysqli_error($conn));
			if (!$insert) {
				echo "<script>alert('insertion error, try again...');</script>" or die(mysqli_error($conn));
			}else{
				echo "<script>alert('insertion successfull...');</script>";
			}
		}

	}

?>