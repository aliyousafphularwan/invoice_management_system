<div class="container mt-3">
	
	<h4> <u>Prodution Orders List</u> </h4>

	<div class="row">
		<div class="col-md-6">
			<a href="index.php?page=newpo" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Add Product Order</a>
		</div>
	</div>

	<form method="post">
		<table class="table table-bordered mt-2">
			<thead>
				<tr>
					<th class="text-center bg-info text-light">PO #</th>
					<th class="text-center bg-info text-light">PO Date</th>
					<th class="text-center bg-info text-light">Client</th>
					<th class="text-center bg-info text-light">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = mysqli_query($conn, "SELECT * FROM pos GROUP BY po_no");
					if (mysqli_num_rows($sql) > 0) {
						while ($row = mysqli_fetch_assoc($sql)) {
							?>
							<tr>
								<td class="text-center"><?php echo $row['po_no'];?></td>
								<td class="text-center"><?php echo $row['po_date'];?></td>
								<td class="text-center"><?php echo $row['po_client'];?></td>
								<td class="text-center">
									<a href="index.php?page=editpo&pono=<?php echo $row['po_no'];?>"><i class="fas fa-edit mr-2"></i></a>
									<a href="#"><i class="fas fa-trash text-danger mr-2"></i></a>
								</td>
							</tr>
							<?php
						}
					}
				?>
			</tbody>
		</table>
	</form>

</div>