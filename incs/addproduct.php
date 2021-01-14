<div class="container">
	
	<form method="post" class="my-5">
		<h4> New Product Details </h4>
		<table class="table table-borderless">
			<tr>
				<td width="10%" class="px-2">
					<p>Artical # <input type="text" name="artno" id="artno" class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Description <input type="text" name="desc" id="desc" class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="px-2">
					<p>HS Code <input type="text" name="hscode" id="hscode" class="form-control"></p>
				</td>
				<td width="10%" class="px-2">
					<p>Price <input type="text" name="price" id="price" class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td colspan="2" width="10%" class="px-2">
					<p><br><button name="btnsaveproduct" class="btn btn-success float-right">Save Customer</button></p>
				</td>
			</tr>
		</table>
	</form>

</div>

<?php

	if (isset($_POST["btnsaveproduct"])) {
		$artno = $_POST["artno"];
		$desc = $_POST["desc"];
		$hscode = $_POST["hscode"];
		$price = $_POST["price"];

		$check = mysqli_query($conn, "SELECT * FROM products WHERE art_no = '$artno'");
		if (mysqli_num_rows($check) > 0) {
			echo "<script>alert('product with same artical # already exist.');</script>";
		}else{
			$insert = mysqli_query($conn, "INSERT INTO products (art_no, description, hs_code, price) VALUES ('$artno', '$desc', '$hscode', '$price')");
			if (!$insert) {
				echo "<script>alert('insertion error, try again...');</script>" or die(mysqli_error($conn));
			}else{
				echo "<script>alert('insertion successfull...');</script>";
			}
		}

	}

?>