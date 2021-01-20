<div class="container">
	
	<form method="post" class="my-5">
		<h4> New Client's Details </h4>
		<table class="table table-borderless">
			<tr>
				<td width="10%" colspan="2" class="px-2">
					<p>Full Name <input type="text" autocomplete="off" name="cfname" id="cfname" required class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="px-2">
					<p>Address <input type="text" autocomplete="off" name="caddress" id="caddress" required class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Country <input type="text" autocomplete="off" name="ccountry" class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="px-2">
					<p>Phone (Landline) <input type="text" autocomplete="off" name="cfone" required id="cfone" class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Mobile <input type="text" name="cmob" autocomplete="off" id="cmob" required class="form-control"></p>
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
		$address = $_POST["caddress"];
		$country = $_POST["ccountry"];
		$phone = $_POST["cfone"];
		$mobile = $_POST["cmob"];

		$check = mysqli_query($conn, "SELECT * FROM customer WHERE phone = '$phone'");
		if (mysqli_num_rows($check) > 0) {
			echo "<script>alert('customer with same number already exist.');</script>";
		}else{
			$insert = mysqli_query($conn, "INSERT INTO customer (full_name, address, country, phone, mob) VALUES ('$fname', '$address', '$country', '$phone', '$mobile')") or die(mysqli_error($conn));
			if (!$insert) {
				echo "<script>alert('insertion error, try again...');</script>" or die(mysqli_error($conn));
			}else{
				echo "<script>alert('insertion successfull...');</script>";
			}
		}

	}

?>