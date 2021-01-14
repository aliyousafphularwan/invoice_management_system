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
							$invno = mysqli_query($conn, "SELECT inv_no, COUNT(inv_no) FROM invoices GROUP BY inv_no HAVING COUNT(inv_no) >= 1");
							if (mysqli_num_rows($invno) > 0) {
								while ($nos = mysqli_fetch_assoc($invno)) {
									$invoiceno = $nos['inv_no'];
									?>
									<tr>
										<td><?php echo $invoiceno;?></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="text-center"><a href="index.php?page=print_invoice&invoice_no=<?php echo $invoiceno;?>"><i class="fas fa-file-invoice-dollar mx-2 text-success"></i></a>
											<a href="#"><i class="fas fa-trash-alt mx-2 text-danger"></i></a></td>
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