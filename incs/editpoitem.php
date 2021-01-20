<div class="container">
	<form method="post">
		<table class="table table-borderless mt-3">
			<thead>
				<tr>
					<th class="bg-info rounded text-light text-center">Description</th>
					<th class="bg-info rounded text-light text-center">Quantity</th>
				</tr>
			</thead>
			
		<?php

			$itmid = $_GET['itmid'];

			$getitm = mysqli_query($conn, "SELECT * FROM pos WHERE id = '$itmid'");
			while ($row = mysqli_fetch_assoc($getitm)) {
				?>

				<tbody>
					<tr>
						<td width="80%"><input type="text" name="itmdesc" class="form-control" value="<?php echo $row['description'];?>"></td>

						<td width="20%"><input type="text" name="itmqty" class="form-control" value="<?php echo $row['qty'];?>"></td>
					</tr>
				</tbody>

				<?php
			}

		?>
		</table>

		<button name="btnupdatepoitm" class="btn btn-success"><i class="fas fa-save mr-2"></i>save item</button>
	</form>
</div>

<?php

	if (isset($_POST['btnupdatepoitm'])) {
		$itmid = $_GET['itmid'];
		$desc = $_POST['itmdesc'];
		$qty = $_POST['itmqty'];

		$update = mysqli_query($conn, "UPDATE POS SET description = '$desc', qty = '$qty' WHERE id = '$itmid'");

		if ($update) {
			echo "updated";
		}else{
			echo "not updated";
		}

	}

?>