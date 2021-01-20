<?php
	$id = $_GET['invid'];
	$query = mysqli_query($conn, "SELECT * FROM invoices WHERE id = '$id'");
	$row = mysqli_fetch_assoc($query);
?>

<div class="container mt-2">
	<form method="post">
		<table class="table table-borderless">
			<thead class="table-bordered bg-primary text-light rounded">
				<tr>
					<th width="70%" class="text-center"> Description </th>
					<th width="10%" class="text-center"> Quantity </th>
					<th width="10%" class="text-center"> Price </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="inv_desc" value="<?php echo $row['inv_desc'];?>" class="form-control"></td>
					<td><input type="text" name="inv_qty" value="<?php echo $row['inv_qty'];?>" class="form-control"></td>
					<td><input type="text" name="inv_price" value="<?php echo $row['inv_price'];?>" class="form-control"></td>
				</tr>
			</tbody>
		</table>
		<button class="btn btn-info float-right"><i class="fas fa-save mr-2"></i>Update</button>
	</form>
</div>