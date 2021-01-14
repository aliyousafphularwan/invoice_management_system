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
					<select name="freight" class="selectfreight form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select>
					</p>
				</td>
				<td colspan="2">
					<p>Insurance
					<select name="insurance" class="selectinsurance form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select>
					</p>
				</td>
				<td colspan="2">
					<p>Discount
					<select name="discount" class="selectdiscount form-control">
						<option value="0">select</option>
						<option value="No">No</option>
						<option value="Yes">Yes</option>
					</select></p>
				</td>
			</tr>

		</table>
		
		<table name="invoice" id="tbl-items-append" class="table table-bordered tbl">
			<tbody>
				<tr name="line_items">
				<td><input type="text" class="itempo form-control" name="itempo[]" placeholder="PO #"></td>
				<td>
					<!-- <input type="text" class="itemdesc form-control" name="itemdesc[]" placeholder="Description"> -->
					
					<select name="itemdesc[]" class="itemdesc form-control selectpicker" data-show-subtext="true" data-live-search="true">
						<option value="0">select</option>
						<?php
							$selectall = mysqli_query($conn, "SELECT * FROM products");
							while ($products = mysqli_fetch_array($selectall)) {
								?>
								<option data-subtext="<?php echo $products['description'];?>"><?php echo $products["description"];?></option>
								<?php
							}
						?>
					</select>

				</td>
				<td><input type="text" class="itemhscode form-control" readonly name="itemhscode[]" placeholder="HS Code"></td>
				<td><input type="text" class="itemqty form-control" name="itemqty[]" placeholder="qty" class="form-control"></td>
				<td><input type="text" class="itemprice form-control" readonly name="itemprice[]" placeholder="Unit Price"></td>
				<td style="width: 120px;"><input type="text" placeholder="amount" name="itemamount" readonly class="itemamount form-control">
				</td>
			</tr>
			</tbody>
		</table>

		<div class="row my-2">
			<div class="col-md-12 text-center">
				<button class="btn btn-success add" id="btn-add-more-products"><i class="fas fa-plus-circle mx-2"></i>Add More Product(s) </button>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 isfreightyes">
				<p>Fraight: <input type="text" name="fraamount" class="form-control fraamount"></p>
			</div>
			<div class="col-md-4 isinsuranceyes">
				<p>Insurance: <input type="text" name="insamount" class="form-control insamount"></p>
			</div>
			<div class="col-md-4 isdiscountyes">
				<p>Discount: <input type="text" name="disamount" class="form-control disamount"></p>
			</div>
		</div>

		<table class="table-bordered float-right">
			<tbody>
				<tr>
					<td> Total </td>
					<td><input type="text" name="ttlamount" class="ttlamount form-control"></td>
				</tr>

				<tr>
					<td> Freight </td>
					<td><input type="text" readonly name="" class=" form-control"></td>
				</tr>

				<tr>
					<td> Insurance </td>
					<td><input type="text" readonly name="" class=" form-control"></td>
				</tr>

				<tr>
					<td> Discount </td>
					<td><input type="text" name="" class=" form-control"></td>
				</tr>
			</tbody>
		</table>

		<div class="my-3">
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

		for ($i=0; $i < $count; $i++) { 
			$insert = mysqli_query($conn, "INSERT INTO invoices (inv_type, client_name, client_address, inv_notify, inv_pgd, inv_no, inv_date, inv_eform, inv_mos, inv_mop, shipmark,  inv_po, inv_desc, inv_hscode, inv_qty, inv_price, inv_amount, inv_fraight, inv_insurance, inv_discount) VALUES ('$type', '$client', '$cadres', '$notify', '$pgd', '$ino', '$date', '$eform', '$mos', '$mop', '$shipmark', '$po[$i]', '$desc[$i]', '$hscode[$i]', '$qty[$i]', '$price[$i]', '$amount', '$freight', '$insurance', '$discount')") or die(mysqli_error($conn));

			if ($insert) {
				echo "insertion successfull...";
			}else{
				echo "insertion failed...";
			}

		}

	}

?>