<?php
	$invno = '';
	$sum = 0;
?>
<div class="container">
	
	<div class="row">

		<div class="col-md-6">
			<div class="container-fluid">
				<div class="row rounded bg-danger mt-3 pt-3 text-light">
					<div class="col-md-6">
						<p> 
							<b>Latest Invoices</b> 
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
					<div class="col-md-3">
						<b>Invoice Date</b>
					</div>
					<div class="col-md-3">
						<b>Client</b>
					</div>
					<div class="col-md-3 text-right">
						<b>Amount</b>
					</div>
				</div>

				<?php
					$getinvs = mysqli_query($conn, "SELECT DISTINCT inv_no, client_name, inv_date, curreny, sum(inv_amount) as result FROM invoices GROUP BY inv_no");
					if (mysqli_num_rows($getinvs) > 0) {
						while ($invs = mysqli_fetch_assoc($getinvs)) {
							$invno = $invs['inv_no'];
							?>
							<div class="row">
								<div class="col-md-3">
									<?php echo $invno;?>
								</div>
								<div class="col-md-3">
									<?php echo $invs['inv_date'];?>
								</div>
								<div class="col-md-3">
									<?php echo $invs['client_name'];?>
								</div>
								<div class="col-md-3 text-right">
									<?php
										
										echo $invs['curreny']."".$invs['result'];
									?>
								</div>
							</div>
							<?php
						}
					}else{

					}
				?>

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