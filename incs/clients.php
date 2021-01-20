<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="index.php?page=addclient" class="btn btn-warning my-3"><i class="fas fa-plus-circle mx-1"></i>Add New Customer</a>
		</div>
	</div>

	<div class="row bg-primary py-2 text-light">
		<div class="col-md-2 text-center">
			<b>Name</b>
		</div>
		<div class="col-md-4 text-center">
			<b>Address</b>
		</div>
		<div class="col-md-2 text-center">
			<b>Country</b>
		</div>
		<div class="col-md-2 text-center">
			<b>Phone/Mobile</b>
		</div>
		<div class="col-md-2 text-center">
			<b>Status</b>
		</div>
	</div>

	<?php
		$query = mysqli_query($conn, "SELECT * FROM customer");
		while ($row = mysqli_fetch_assoc($query)) {
			?>

			<div class="row border-bottom border-dark">
				<div class="col-md-2 text-center border-left border-dark">
					<?php echo $row['full_name'];?>
				</div>
				<div class="col-md-4">
					<?php echo $row['address'];?>
				</div>
				<div class="col-md-2 text-center">
					<?php echo $row['country'];?>
				</div>
				<div class="col-md-2 text-center">
					<?php echo $row['phone']."\n".$row['mob'];?>
				</div>
				<div class="col-md-2 text-center border-right border-dark">
					<a href="#"><i class="fas fa-edit mr-2"></i></a>
					<a href="#"><i class="fas fa-trash text-danger"></i></a>
				</div>
			</div>

			<?php
		}
	?>
	
</div>