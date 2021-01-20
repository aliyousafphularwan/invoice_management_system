<?php

	$id = $_GET['invno'];
	$query = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '$id'");
	$row = mysqli_fetch_assoc($query);

?>
<div class="container mt-2">
	
	<table class="table table-bordered">
		<tr>
			<td>
				<p>Mode of Shippment
					<!-- <input type="text" class="form-control" name="mos"> -->
					<select class="form-control mos" name="mos" required>
						<option value="">select</option>
						<option value="By Air">By Air</option>
						<option value="By Sea">By Sea</option>
						<option value="By DHL Courier">By DHL Courier</option>
						<option value="By UPS Courier">By UPS Courier</option>
					</select>
				</p>

				<p class="awbyes">
					AWB # <br>
					<input type="text" name="awbno" class="form-control">
				</p>

				<p class="blyes">
						BL # <br>
						<input type="text" name="blno" class="form-control">
				</p>
			</td>

			<td>
				<p>Mode of Payment
					<!-- <input type="text" class="form-control" name="mop"> -->
					<select class="form-control" name="mop" required>
						<option value="">select</option>
						<option value="Advance">Advance</option>
						<option value="Sight 30 Days">Sight 30 Days</option>
						<option value="Sight 60 Days">Sight 60 Days</option>
						<option value="Sight 90 Days">Sight 90 Days</option>
					</select>
				</p>
			</td>
		</tr>
	</table>

	<table class="table table-borderless">
		<thead class="text-center bg-primary text-light">
			<tr>
				<th width="10%" class="table-bordered">PO #</th>
				<th width="80%" class="table-bordered">Description</th>
				<th width="10%" class="table-bordered">HS Code</th>
				<th width="10%" class="table-bordered">Quantity</th>
				<th width="10%" class="table-bordered">Price</th>
				<th width="10%" class="table-bordered">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$dataquery = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '".$_GET['invno']."'");
				while ($getdata = mysqli_fetch_assoc($dataquery)) {
					?>
					<tr>
						<td class="text-center"><?php echo $getdata['inv_po'];?></td>
						<td><?php echo $getdata['inv_desc'];?></td>
						<td class="text-center"><?php echo $getdata['inv_hscode'];?></td>
						<td class="text-center"><?php echo $getdata['inv_qty'];?></td>
						<td class="text-center"><?php echo $getdata['inv_price'];?></td>
						<td class="text-center">
							<a href="index.php?page=editinvitm&invid=<?php echo $getdata['id'];?>"><i class="fas fa-edit text-primary"></i></a>
							<a href="index.php?page=delinvitm&invid=<?php echo $getdata['id'];?>"><i class="fas fa-trash text-danger ml-2"></i></a>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>

</div>