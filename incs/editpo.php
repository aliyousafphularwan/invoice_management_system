<div class="container">
	<form method="post">
	
		<?php

			$pono = $_GET['pono'];

			$getdata = mysqli_query($conn, "SELECT * FROM pos WHERE po_no = '$pono' GROUP BY po_no");
			while ($data = mysqli_fetch_assoc($getdata)) {
				?>
				<table class="table table-borderless">
					<tr>
						<td>PO #</td>
						<td><input type="text" class="form-control" name="po_no" value="<?php echo $data['po_no'];?>"></td>
						<td>PO Date</td>
						<td><input type="text" class="form-control" name="po_date" value="<?php echo $data['po_date'];?>"></td>
					</tr>
					<tr>
						<td>Client</td>
						<td><input type="text" class="form-control" name="po_client" value="<?php echo $data['po_client'];?>"></td>
					</tr>
				</table>
				<?php
			}
		?>

		<table class="table table-borderless mt-5">
			<thead>
				<tr>
					<th width="80%" class="bg-info rounded text-light text-center">Description</th>
					<th width="20%" class="bg-info rounded text-light text-center">Quantity</th>
					<th colspan="2" width="20%" class="bg-info rounded text-light text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$getpos = mysqli_query($conn, "SELECT * FROM pos WHERE po_no = '".$_GET['pono']."'");
					while ($pos = mysqli_fetch_assoc($getpos)) {
						?>
							<tr>
								<td class="table-borderless"><input type="text" name="podesc[]" value="<?php echo $pos['description'];?>" class="form-control"></td>
								<td class="table-borderless"><input type="text" name="poqty[]" value="<?php echo $pos['qty'];?>" class="form-control"></td>
								<td class="text-center" style="vertical-align: middle;">
									<a class="btn btn-primary" href="index.php?page=editpoitem&itmid=<?php echo $pos['id']?>"><i class="fas fa-edit text-light"></i></a>
								</td>
								<td>
									
									<a class="btn btn-danger" href="index.php?page=delpoitem&itmid=<?php echo $pos['id']?>"><i class="fas fa-trash text-light"></i></a>
								</td>
							</tr>
						<?php
					}
				?>
			</tbody>
		</table>

		<button name="btnupdatepo">save</button>

	</form>
</div>

<?php
	
	if (isset($_POST["btnupdatepo"])) {

		$id = $_GET['pono'];

		$pono = $_POST['po_no'];
		$podate = $_POST['po_date'];
		$poclient = $_POST['po_client'];
		$desc = $_POST['podesc'];
		$qty = $_POST['poqty'];

		$count = count($desc);

		for ($i=0; $i < $count; $i++) { 

			$update = mysqli_query($conn, "UPDATE pos SET qty = '$qty[$i]' WHERE po_no = '$id'") or die(mysqli_error($conn));

		}

		if (!$update) {
			echo "done";
		}else{
			echo "no" or die(mysqli_error($conn));
		}

	}

?>