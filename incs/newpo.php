<div class="container mt-3">
	
	<form method="post">
		<table class="table table-borderless">
			<tr>
				<td>PO #</td>
				<td><input type="text" name="po_no" class="form-control pono"></td>
				<td>PO Date</td>
				<td><input type="text" name="po_date" class="form-control podate" value="<?php echo date('d/m/Y');?>"></td>
			</tr>
			<tr>
				<td>Client</td>
				<td>
					<select class="form-control poclient" name="po_client">
						<option></option>
						<?php 
							$getclients = mysqli_query($conn, "SELECT * FROM customer");
							while ($data = mysqli_fetch_assoc($getclients)) {
								?>
								<option value="<?php echo $data['full_name'];?>"><?php echo $data['full_name'];?></option>
								<?php		
							}	
						?>
					</select>
				</td>
			</tr>
		</table>
		<table class="table table-borderless tbl-newpo">
			<thead>
				<tr>
					<th width="80%" class="bg-info text-light text-center"> Description of Goods </th>
					<th width="20%" class="bg-info text-light text-center"> Quantity </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="text" name="po_desc[]" class="podesc form-control" id="podesc">
					</td>
					<td>
						<input type="text" name="po_qty[]" class="form-control">
					</td>
				</tr>
			</tbody>
		</table>

		<div class="row my-2">
			<div class="col-md-12 text-center">
				<button class="btn btn-warning add" id="btn-add-more-products"><i class="fas fa-plus-circle mx-2"></i>Add More </button>
			</div>
		</div>

		<button class="btn btn-success" name="btnsavepo"><i class="fas fa-save mr-2"></i>submit</button>

	</form>

</div>

<?php 

	if (isset($_POST["btnsavepo"])) {
		$pono = $_POST["po_no"];
		$podate = $_POST["po_date"];
		$poclient = $_POST["po_client"];
		$podesc = $_POST["po_desc"];
		$poqty = $_POST["po_qty"];

		$count = count($podesc);
		$checkpo = mysqli_query($conn, "SELECT po_no FROM pos WHERE po_no = '$pono'");
		if (mysqli_num_rows($checkpo) == 0) {
			for ($i=0; $i < $count; $i++) { 
				$insertpo = mysqli_query($conn, "INSERT INTO pos (po_no, po_date, po_client, description, qty) VALUES ('$pono', '$podate', '$poclient', '$podesc[$i]', '$poqty[$i]')");
			}
			if ($insertpo) {
				echo "<p class='mgssucc'>insertion successfull.</p>";
			}
		}

	}

?>