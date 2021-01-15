<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="index.php?page=addpacking" class="btn btn-warning my-3"><i class="fas fa-plus-circle mx-1"></i>Add New Packing List</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form method="post">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center p-1 bg-info text-light"> Invoice # </th>
							<th class="text-center p-1 bg-info text-light"> Invoice Date </th>
							<th class="text-center p-1 bg-info text-light"> PO # </th>
							<th class="text-center p-1 bg-info text-light"> Action(s) </th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = mysqli_query($conn, "SELECT * FROM packing GROUP BY inv_no;");
							if (mysqli_num_rows($query) > 0) {
								
								while ($row = mysqli_fetch_assoc($query)) {
									?>
									<tr>
										<td class="text-center"><?php echo $row["inv_no"];?></td>
										<td class="text-center"><?php echo $row["inv_date"];?></td>
										<td class="text-center"><?php echo $row["po_no"];?></td>
										<td class="text-center"><a href="index.php?page=print_packing_list&packing_id=<?php echo $row['inv_no'];?>"><i class="fas fa-file text-info"></i></a>
											<a href="#"><i class="fas fa-trash ml-2 text-danger"></i></a>
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
	</div>

</div>