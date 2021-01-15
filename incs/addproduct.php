<div class="container">
	
	<form method="post" class="my-5">
		<h4> New Product Details </h4>
		<table class="table table-borderless">
			<tr>
				<td width="10%" class="">
					<p>Artical # <input type="text" name="artno" id="artno" required class="form-control"></p>
				</td>
				<td width="10%" class="">
					<p>Description <input type="text" name="desc" id="desc" required class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td width="10%" class="">
					<p>HS Code <input type="text" name="hscode" id="hscode" required class="form-control"></p>
				</td>
				<td width="10%" class="">
					<p>Price <input type="text" name="price" id="price" required class="form-control"></p>
				</td>
			</tr>
			<tr>
				<td width="10%" class="">
					<p>
					Currency
					<select name="currency" class="form-control" required>
						<option value="0">select</option>
						<option value="&#36;">US $</option>
						<option value="&#163;">Pounds &#163;</option>
						<option value="&#128;">Euro &#128;</option>
					</select>
					</p>
				</td>
			</tr>

			<tr>
				<td colspan="2" width="10%" class="">
					<p><br><button name="btnsaveproduct" class="btn btn-success float-right">Save Product</button></p>
				</td>
			</tr>
		</table>
	</form>

</div>

<?php

	if (isset($_POST["btnsaveproduct"])) {
		$artno = $_POST["artno"];
		$desc = $artno." ".$_POST["desc"];
		$hscode = $_POST["hscode"];
		$price = $_POST["price"];
		$currency = $_POST["currency"];

		if ($currency == '0') {
			echo "<script> alert('select currency...'); </script>";
		}else{

			$check = mysqli_query($conn, "SELECT * FROM products WHERE art_no = '$artno'");
				if (mysqli_num_rows($check) > 0) {
					echo "<script>alert('product with same artical # already exist.');</script>";
				}else{
					$insert = mysqli_query($conn, "INSERT INTO products (art_no, description, hs_code, price, currency) VALUES ('$artno', '$desc', '$hscode', '$price', '$currency')");
					if (!$insert) {
						echo "<script>alert('insertion error, try again...');</script>" or die(mysqli_error($conn));
					}else{
						echo "<script>alert('insertion successfull...');</script>";
					}
				}

		}

	}

?>