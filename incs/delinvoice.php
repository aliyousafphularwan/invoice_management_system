<?php 
	$invno = $_GET['invoice_no'];
	$sum = "";
?>
<div class="container">
	
	<form method="post">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center p-1"> Po # </th>
					<th class="text-center p-1"> Description </th>
					<th class="text-center p-1"> Quantity </th>
					<th class="text-center p-1"> Price </th>
					<th class="text-center p-1">  Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '$invno'");
					while ($row = mysqli_fetch_assoc($query)) {
						$sum += $row["inv_amount"];
						?>
						<tr>
							<td class="text-center p-1"> <?php echo $row["inv_po"];?> </td>
							<td class="text-center p-1"> <?php echo $row["inv_desc"];?> </td>
							<td class="text-center p-1"> <?php echo $row["inv_qty"];?> </td>
							<td class="text-center p-1"> <?php echo $row["inv_price"];?> </td>
							<td class="text-center p-1"> <?php echo $row["inv_amount"];?> </td>
						</tr>
						<?php
					}
				?>
				<tr>
					<td colspan="4" class="text-right pr-3 p-1"> Total Value </td>
					<th class="text-center p-1">
						<?php echo $sum;?>
					</th>
				</tr>
			</tbody>
		</table>

		<button class="btn btn-danger" name="btndel">Delete</button>

	</form>

</div>

<?php
	
	if (isset($_POST[""])) {
		
	}

?>