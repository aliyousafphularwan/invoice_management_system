<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="index.php?page=addproduct" class="btn btn-warning my-3"><i class="fas fa-plus-circle mx-1"></i>Add New Product</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2 table-bordered py-2 bg-info text-light text-center">
			<b>Artical #</b>
		</div>
		<div class="col-md-4 table-bordered py-2 bg-info text-light text-center">
			<b>Description</b>
		</div>
		<div class="col-md-2 table-bordered py-2 bg-info text-light text-center">
			<b>HS Code</b>
		</div>
		<div class="col-md-2 table-bordered py-2 bg-info text-light text-center">
			<b>Price</b>
		</div>
		<div class="col-md-2 table-bordered py-2 bg-info text-light text-center">
			<b>Action(s)</b>
		</div>
	</div>

	<!-- <div id="getproductlist">
		
	</div> -->

	<?php 
		$getpro = mysqli_query($conn, "SELECT * FROM products");
		if (mysqli_num_rows($getpro) > 0) {
			while ($row = mysqli_fetch_assoc($getpro)) {
				?>
				<div class="row">
					<div class="col-md-2 text-center">
						<?php echo $row['art_no']?>
					</div>
					<div class="col-md-4">
						<?php echo $row['description']?>
					</div>
					<div class="col-md-2 text-center">
						<?php echo $row['hs_code']?>
					</div>
					<div class="col-md-2 text-center">
						<?php echo $row['currency'].$row['price']?>
					</div>
					<div class="col-md-2 text-center">
						<a href="#"><i class="fa fa-edit"></i></a>
						<a href="#"><i class="fa fa-trash ml-2 text-danger"></i></a>
					</div>
				</div>
				<?php
			}
		}
	?>

</div>