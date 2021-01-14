<div class="container mt-5">
	
	<p> Edit Product </p>

	<div class="row">
		<form method="post" class="my-5">
			<h4> New Product Details </h4>
			<?php
				$pid = $_GET['pid'];
				$query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'");
				while ($row = mysqli_fetch_assoc($query)) {
					?>

					<table class="table table-borderless">
						<tr>
							<td width="10%" class="px-2 py-0">
								<p>Artical # <input type="text" name="artno" id="artno" class="form-control" value="<?php echo $row['art_no']?>"></p>
							</td>
							<td width="10%" class="px-2 py-0">
								<p>Description <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $row['description'];?>"></p>
							</td>
						</tr>

						<tr>
							<td width="10%" class="px-2 py-0">
								<p>HS Code <input type="text" name="hscode" id="hscode" class="form-control" value="<?php echo $row['hs_code'];?>"></p>
							</td>
							<td width="10%" class="px-2 py-0">
								<p>Price <input type="text" name="price" id="price" class="form-control" value="<?php echo $row['price'];?>"></p>
							</td>
						</tr>

						<tr>
							<td colspan="2" width="10%" class="px-2 py-0">
								<p><br><button name="btnupdateproduct" class="btn btn-success float-right">Update Product</button></p>
							</td>
						</tr>
					</table>

					<?php
				}
			?>
			
		</form>
	</div>

</div>

<?php

	if (isset($_POST["btnupdateproduct"])) {
		
		$pid = $_GET['pid'];

		$artno = $_POST["artno"];
		$desc = $_POST["desc"];
		$hscode = $_POST["hscode"];
		$price = $_POST["price"];

		$update = mysqli_query($conn, "UPDATE products SET art_no = '$artno', description = '$desc', hs_code = '$hscode', price = '$price' WHERE id = '$pid'");
		if ($update) {
			echo "<p class='w-25 bg-success text-light p-2 text-center mx-auto my-2'>Successfully Update</p>";
			echo "\n <a href='index.php?page=inventory' class='text-center'>Go Back</a>";
		}

	}

?>