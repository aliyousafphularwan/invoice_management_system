<div class="container mt-5">
	<form method="post">
		<h3> Are You Sure to Delete Following Item? </h3>

		<div class="row bg-success p-2 rounded text-light mb-2">
			<div class="col-md-2 text-center">
				<b>Artical #</b>
			</div>
			<div class="col-md-4 text-center">
				<b>Description</b>
			</div>
			<div class="col-md-2 text-center">
				<b>HS Code</b>
			</div>
			<div class="col-md-2 text-center">
				<b>Price</b>
			</div>
			<div class="col-md-2 text-center">
				<b>Delete</b>
			</div>
		</div>

	<?php

		$id = $_GET['pid'];
		$query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
		while ($row = mysqli_fetch_array($query)) {
			?>
			<div class="row">
				
				<div class="col-md-2 text-center">
					<?php echo $row["art_no"];?>
				</div>
				<div class="col-md-4">
					<?php echo $row["description"];?>
				</div>
				<div class="col-md-2 text-center">
					<?php echo $row["hs_code"];?>
				</div>
				<div class="col-md-2 text-center">
					<?php echo $row["price"];?>
				</div>
				<div class="col-md-2 text-center">
					<button name="delpro" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</button>
				</div>

			</div>
			<?php
		}

	?>

	</form>

</div>

<?php

	if (isset($_POST["delpro"])) {
		$pid = $_GET["pid"];

		$del = mysqli_query($conn, "DELETE FROM products WHERE id = '$pid'");
		
		if ($del) {
			echo "<p class='p-2 m-auto text-center bg-success text-light w-25'> Delete Successfully </p>";
			echo "\n<a href='index.php?page=inventory'>Go Back</a>";
		}

	}

?>