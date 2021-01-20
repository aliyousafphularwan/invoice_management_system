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
							$sum = 0;
							$getinv = mysqli_query($conn, "SELECT DISTINCT inv_no, client_name, inv_date, curreny, sum(inv_amount) as result FROM invoices GROUP BY inv_no");
							if (mysqli_num_rows($getinv) > 0) {
								while ($inv = mysqli_fetch_assoc($getinv)) {
									?>
									<tr>
										<td class="text-center"><?php echo $inv['inv_no'];?></td>
										<td><?php echo $inv['client_name'];?></td>
										<td class="text-center"><?php echo $inv['inv_date'];?></td>
										<td class="text-center">
											<?php 
												
												echo $inv['curreny'].$inv["result"];
											?>		
										</td>
										<td class="text-center">
											<a href="index.php?page=print_invoice&invoice_no=<?php echo $inv['inv_no'];?>"><i class="fas fa-file text-info"></i></a>
											<a href="index.php?page=editinvoice&invno=<?php echo $inv['inv_no'];?>"><i class="fas fa-edit text-dark ml-2"></i></a>
											<a href="#"><i class="fas fa-trash text-danger ml-1"></i></a>
										</td>
									</tr>
									<?php
								}
							}else{
								echo "<p>no invoices found.</p>";
							}
						?>
					</tbody>
				</table>
			</form>
		</div>
	</div>

</div>