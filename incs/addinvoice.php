<div class="container mt-2">
	<form name="invoice" method="post">
		<table class="table table-borderless">
			
			<tr>
				<td>
					<p>Invoice type:
					<select class="form-control" name="invtype" id="invtype">
						<option value="0">select</option>
						<option value="Custom Invoice">Custom Invoice</option>
						<option value="Revised Invoice">Revised Invoice</option>
						<option value="Invoice">Invoice</option>
					</select>
					</p>
				</td>
				<td>
					<p>Invoice No:<input type="text" name="invno" id="invno" class="form-control"></p></td>
				<td>
					<p>Invoice Date:<input type="text" id="invdate" name="invdate" class="form-control" value="<?php echo date('d/m/Y');?>"></p>
				</td>
				<td><p>E-Form #<input type="text" name="eformno" class="form-control"></p></td>
				<td><p>Shipping Mark<input type="text" name="shipmark" class="form-control"></p></td>
				<td>
					<p>Currency
					<select name="currency" class="form-control">
						<option value="&#36;">US $</option>
						<option value="&#163;">Sterling Pounds &#163;</option>
						<option value="&#128;">Jap &#128;</option>
					</select>
					</p>
				</td>
			</tr>

			<tr>
				<td colspan="2"> 
					<p>Customer<input type="text" class="form-control" id="invto" name="invto"></p> 
				</td>
				<td colspan="4"> 
					<p>Shipping Address<input type="text" name="invtoad" id="invtoad" value="" class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<p>Notify<textarea class="form-control" name="notify"></textarea></p></td>
				<td colspan="2">
					<p>No. of Packages & Goods description<textarea class="form-control" name="pgd"></textarea></p>
				</td>
				<td>
					<p>Mode of Shippment
						<!-- <input type="text" class="form-control" name="mos"> -->
						<select class="form-control" name="mos">
							<option value="0">select</option>
							<option value="By Air">By Air</option>
							<option value="By Sea">By Sea</option>
							<option value="Courier">Courier</option>
						</select>
					</p>
				</td>
				<td>
					<p>Mode of Payment
						<!-- <input type="text" class="form-control" name="mop"> -->
						<select class="form-control" name="mop">
							<option value="0">select</option>
							<option value="Advance">Advance</option>
							<option value="Partial">Partial</option>
							<option value="Other">Other</option>
						</select>
					</p>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<p>Freight
					<select name="freight" id="selectfreight" class="form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select>
					</p>
				</td>
				<td colspan="2">
					<p>Insurance
					<select name="insurance" id="selectinsurance" class="form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select>
					</p>
				</td>
				<td colspan="2">
					<p>Discount
					<select name="discount" id="selectdiscount" class="form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select></p>
				</td>
			</tr>

		</table>
		
		<table name="invoice" id="tbl-items-append" class="table table-bordered">
			<tr name="line_items">
				<td><input type="text" id="itempo" name="itempo[]" placeholder="PO #" class="form-control"></td>
				<td><input type="text" id="itemdesc" name="itemdesc[]" placeholder="Description" class="form-control"></td>
				<td><input type="text" id="itemhscode" name="itemhscode[]" placeholder="HS Code" class="form-control"></td>
				<td><input type="text" id="itemqty" name="itemqty[]" placeholder="qty" class="form-control"></td>
				<td><input type="text" id="itemprice" name="itemprice[]" placeholder="Unit Price" class="form-control"></td>
				<td style="width: 120px;"><input type="text" class="form-control" placeholder="amount" name="itemamount" id="itemamount">
				</td>
			</tr>
		</table>

		<div class="row my-2">
			<div class="col-md-12 text-center">
				<button class="btn btn-success" id="btn-add-more-products"><i class="fas fa-plus-circle mx-2"></i>Add More Product(s) </button>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 isfreightyes">
				<p>Fraight: <input type="text" name="fraamount" class="form-control"></p>
			</div>
			<div class="col-md-4 isinsuranceyes">
				<p>Insurance: <input type="text" name="fraamount" class="form-control"></p>
			</div>
			<div class="col-md-4 isdiscountyes">
				<p>Discount: <input type="text" name="fraamount" class="form-control"></p>
			</div>
		</div>

		<div class="float-right my-3">
			<button class="btn btn-info" name="btn_save_invoice"><i class="fas fa-save mr-2"></i>Save Invoice</button>
		</div>

	</form>
</div>

<?php

	//id="save-invoice"

	if (isset($_POST["btn_save_invoice"])) {
		
		$type = $_POST['invtype'];
		$ino = $_POST["invno"];
		$date = $_POST["invdate"];
		$client = $_POST["invto"];
		$cadres = $_POST["invtoad"];
		$eform = $_POST["eformno"];
		$shipmark = $_POST["shipmark"];
		$currency = $_POST["currency"];
		$notify = $_POST["notify"];
		$pgd = $_POST['pgd'];
		$freight = $_POST['freight'];
		$insurance = $_POST['insurance'];
		$discount = $_POST['discount'];
		$mop = $_POST["mop"];
		$mos = $_POST["mos"];


		$po = $_POST['itempo'];
		$desc = $_POST['itemdesc'];
		$hscode = $_POST['itemhscode'];
		$qty = $_POST['itemqty'];
		$price = $_POST['itemprice'];
		$amount = $_POST["itemamount"];

		$count = count($po);

		echo $count;

		// for ($i=0; $i < $count; $i++) { 
		// 	$insert = mysqli_query($conn, "INSERT INTO invoices (inv_type, client_name, client_address, inv_notify, inv_pgd, inv_no, inv_date, inv_eform, inv_mos, inv_mop, shipmark,  inv_po, inv_desc, inv_hscode, inv_qty, inv_price, inv_amount, inv_fraight, inv_insurance, inv_discount) VALUES ('$type', '$client', '$cadres', '$notify', '$pgd', '$ino', '$date', '$eform', '$mos', '$mop', '$shipmark', '$po[$i]', '$desc[$i]', '$hscode[$i]', '$qty[$i]', '$price[$i]', '$amount', '$freight', '$insurance', '$discount')") or die(mysqli_error($conn));

		// 	if ($insert) {
		// 		echo "insertion successfull...";
		// 	}else{
		// 		echo "insertion failed...";
		// 	}

		// }

	}

?>