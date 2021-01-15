<div class="container">
	
	<form method="post">
		<div class="row">
			<table class="table table-borderless p-0 m-0">
				<tr>
					<td colspan="">
						<p>
							Invoice #
							<input type="text" name="inv_num" class="form-control w-50">
						</p>
					</td>
					<td class="ml-auto">
						<p>
							Invoice Date
							
    						<input type="date" name="inv_date" class="form-control w-50 datepicker" value="dd/mm/yyyy">  
						</p>
					</td>
				</tr>
			</table>
			<table class="table table-bordered tbl-pack">
				<thead>
					<tr>
						<th width="10%" class="text-center"> Carton # </th>
						<th width="10%" class="text-center"> Quantity </th>
						<th width="50%" class="text-center"> Description of Goods </th>
						<th width="10%" class="text-center"> PO #. </th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><input type="text" name="pack_cart[]" autocomplete="off" class="form-control pack-cart"></td>
						<td><input type="text" name="pack_qty[]" autocomplete="off" class="form-control pack-qty"></td>
						<td><input type="text" name="pack_desc[]" autocomplete="off" class="form-control pack-desc"></td>
						<td><input type="text" name="pack_po[]" autocomplete="off" class="form-control pack-po"></td>
					</tr>
				</tbody>
			</table>

			<button class="btn btn-info ml-auto btn-add-more"><i class="fas fa-plus-circle"></i>Add More</button>

		</div>	

		<button class="btn btn-success" name="btnsavepacking"><i class="fas fa-save mr-2"></i>Save Packing List</button>

	</form>

</div>

<?php

	if (isset($_POST["btnsavepacking"])) {
		$invno = $_POST["inv_num"];
		$invdate = $_POST["inv_date"]; 
		$carton = $_POST["pack_cart"]; 
		$qty = $_POST["pack_qty"]; 
		$desc = $_POST["pack_desc"]; 
		$po = $_POST["pack_po"];

		$count = count($carton);

		$checkinv = mysqli_query($conn, "SELECT * FROM packing WHERE inv_no = '$invno'");
		if (mysqli_num_rows($checkinv) > 0) {
			# code...
		}else{
			for ($i=0; $i < $count; $i++) { 
				$insert = mysqli_query($conn, "INSERT INTO packing (inv_no, inv_date, carton_no, qty, desc_of_goods, po_no) VALUES ('$invno', '$invdate', '$carton[$i]', '$qty[$i]', '$desc[$i]', '$po[$i]')");
			}

			if ($insert) {
				echo "<p class='mgssucc w-25 rounded p-2 text-center m-auto bg-success text-light'>insertion successfull<p>";
			}else{
				echo "<p class='mgserr w-25 rounded p-2 text-center m-auto bg-danger text-light'>insertion failed<p>";
			}

		}

	}

?>