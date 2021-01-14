<?php

	require 'dbc.php';
	$clients = mysqli_query($conn, "SELECT * FROM customer");
	if (mysqli_num_rows($clients) > 0) {
		while ($row = mysqli_fetch_assoc($clients)) {
			?>
			<div class="row">
			<div class="col-md-2">
				<?php echo $row['first_name']." ".$row['last_name'];?>
			</div>
			<div class="col-md-4">
				<?php echo $row['address']?>
			</div>
			<div class="col-md-2 text-center">
				<?php echo $row['country']?>
			</div>
			<div class="col-md-2">
				<?php echo $row['phone']." - ".$row['mob'];?>
			</div>
			<div class="col-md-2 text-center">
				Active 
			</div>
		</div>
			<?php
		}
	}else{
		
		?>
			<p class="bg-danger text-light text-center rounded p-2 w-25 mx-auto my-5"> No Clients Found. </p>
		<?php

	}

?>