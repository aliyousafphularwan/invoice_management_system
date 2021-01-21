<style type="text/css">
	li{
		list-style: none;
		font-weight: 200;
	}
</style>
<?php

	require 'dbc.php';

	if (isset($_POST['keyword'])) {
		$k = $_POST['keyword'];

		$query = mysqli_query($conn, "SELECT description from products WHERE description LIKE '%$k%'");
		if (mysqli_num_rows($query) > 0) {
			?>
			<ul>
				<?php

					while ($row = mysqli_fetch_assoc($query)) {
						?>
						<li><?php echo $row["description"]?></li>
						<?php
					}

				?>
			</ul>
			<?php
		}else{
			echo "nothing found.";
		}

	}

?>