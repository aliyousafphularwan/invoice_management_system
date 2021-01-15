<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="index.php?page=addinvoice" class="btn btn-warning my-3"><i class="fas fa-plus-circle mx-1"></i>Add New Invoice</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form method="post">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center p-1 bg-info text-light"> Invoice # </th>
							<th class="text-center p-1 bg-info text-light"> Customer </th>
							<th class="text-center p-1 bg-info text-light"> Invoice Date </th>
							<th class="text-center p-1 bg-info text-light"> Amount </th>
							<th class="text-center p-1 bg-info text-light"> Action(s) </th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = mysqli_query($conn, "SELECT * FROM invoices GROUP BY inv_no;");
							if (mysqli_num_rows($query) > 0) {
								while ($row = mysqli_fetch_assoc($query)) {
									?>
									<tr>
										<td class="text-center"><?php echo $row['inv_no'];?></td>
										<td class="text-center"><?php echo $row['client_name'];?></td>
										<td class="text-center"><?php echo $row['inv_date'];?></td>
										<td class="text-center">
											<?php
												$sum = 0;
												$sum += $row['inv_amount'];
												echo $row["curreny"].$sum;
											?>	
										</td>
										<td class="text-center">
											<p>
												<a href="index.php?page=print_invoice&invoice_no=<?php echo $row['inv_no'];?>"><i class="fas fa-file"></i></a>
												<a href="index.php?page=delinvoice&invoice_no=<?php echo $row['inv_no'];?>"><i class="fas fa-trash text-danger ml-2"></i></a>
											</p>
										</td>
									</tr>
									<?php
								}
							}else{

							}
						?>
					</tbody>
				</table>
			</form>
		</div>
	</div>

</div>