<ul>
	<?php

		require 'dbc.php';

		if (isset($_POST['k'])) {
			$k = $_POST['k'];

			$query = mysqli_query($conn, "SELECT description from products WHERE description LIKE '%$k%'");
			if (mysqli_num_rows($query) > 0) {
				while ($row = mysqli_fetch_assoc($query)) {
					?>
					<li><?php echo $row['description'];?></li>
					<?php
				}
			}else{
				echo "nothing found.";
			}

		}

	?>
</ul>