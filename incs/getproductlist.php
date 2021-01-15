<?php

	require 'dbc.php';

	$query = mysqli_query($conn, "SELECT * FROM products");
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_array($query)) {
			?>

			<div class="row">
				<div class="col-md-2 text-center">
					<?php echo $row["art_no"];?>
				</div>
				<div class="col-md-4">
					<?php echo $row["description"];?>
				</div>
				<div class="col-md-2">
					<?php echo $row["hs_code"];?>
				</div>
				<div class="col-md-2 text-center">
					<?php echo $row["price"]." ".$row["currency"];?>
				</div>
				<div class="col-md-2 text-center">
					<a href="index.php?page=editproduct&pid=<?php echo $row['id'];?>"><i class="fas fa-file-invoice-dollar mx-2 text-success"></i></a>
											<a href="index.php?page=delproduct&pid=<?php echo $row['id'];?>"><i class="fas fa-trash-alt mx-2 text-danger"></i></a>
				</div>
			</div>

			<?php
		}
	}else{
		?>
		<p class="bg-danger text-light text-center rounded p-2 w-25 mx-auto my-5"> No Product(s) Found. </p>
		<?php
	}


?>