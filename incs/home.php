<div class="container">
	
	<div class="row">

		<div class="col-md-6">
			<div class="container-fluid">
				<div class="row rounded bg-danger mt-3 pt-3 text-light">
					<div class="col-md-6">
						<p> 
							<b>Latest Invoices</b> 
							<?php
								$invno = mysqli_query($conn, "SELECT inv_no, COUNT(inv_no) FROM invoices GROUP BY inv_no HAVING COUNT(inv_no) > 1");

								if (mysqli_num_rows($invno) > 0) {
									while ($nos = mysqli_fetch_assoc($invno)) {
										
									}
								}

							?>
						</p>
					</div>
					<div class="col-md-6 text-right">
						<a href="#" class="text-light"><i class="fas fa-ellipsis-v"></i></a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<b>Invoice #</b>
					</div>
					<div class="col-md-6">
						<b>Client</b>
					</div>
					<div class="col-md-3 text-right">
						<b>Amount</b>
					</div>
					<?php
						$getinvoices = mysqli_query($conn, "SELECT * FROM invoices");
						if (mysqli_num_rows($getinvoices) > 0) {
							while ($i = mysqli_fetch_assoc($getinvoices)) {
								?>
								<div class="col-md-3">
									<?php echo $i['inv_no'];?>
								</div>
								<div class="col-md-6">
									<?php echo $i['client_address'];?>
								</div>
								<div class="col-md-3 text-right">
									<?php 
										$total = $i['inv_qty'] * $i['inv_price'];
										echo $total;
									?>
								</div>
								<?php
							}
						}else{
							echo "<p class='p-2 bg-danger text-light m-auto rounded'> No Invoice Found. </p>";
						}
					?>
				</div>

			</div>
		</div>

		<div class="col-md-6">
			<div class="container-fluid">
				<div class="row rounded bg-info mt-3 pt-3 text-light">
					<div class="col-md-6">
						<p> <b>Latest Clients</b> </p>
					</div>
					<div class="col-md-6 text-right">
						<a href="#" class="text-light"><i class="fas fa-ellipsis-v"></i></a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<b>Name</b>
					</div>
					<div class="col-md-6">
						<b>Address</b>
					</div>
					<div class="col-md-3 text-right">
						<b>Phone/Mobile</b>
					</div>
					<?php
						$getclients = mysqli_query($conn, "SELECT * FROM customer");
						if (mysqli_num_rows($getclients) > 0) {
							while ($c = mysqli_fetch_assoc($getclients)) {
								?>
								<div class="col-md-3">
									<?php echo $c['first_name']." ".$c['last_name'];?>
								</div>
								<div class="col-md-4">
									<?php echo $c['address'];?>
								</div>
								<div class="col-md-3">
									<?php echo $c['phone']."/".$c['mob'];?>
								</div>
								<?php
							}
						}else{
							echo "<p class='p-2 bg-info text-light m-auto rounded'> No Client Found. </p>";
						}
					?>
				</div>

			</div>
		</div>
		
	</div>

</div>