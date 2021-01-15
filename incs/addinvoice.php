<?php $total_amount_type = "";?>
<div class="container mt-2">
	<form name="invoice" method="post">
		<table class="table table-borderless">
			
			<tr>
				<td>
					<p>Invoice type:
					<select class="form-control" name="invtype" id="invtype" required="">
						<option value="">select</option>
						<option value="Invoice">Invoice</option>
						<option value="Proforma Invoice">Proforma Invoice</option>
						<option value="Commercial Invoice">Commercial Invoice</option>
						<option value="Free Samples">Free Samples</option>
					</select>
					</p>
				</td>
				<td>
					<p>Invoice No:<input type="text" name="invno" id="invno" required class="form-control"></p></td>
				<td>
					<p>Invoice Date:<input type="text" id="invdate" required name="invdate" class="form-control" value="<?php echo date('d/m/Y');?>"></p>
				</td>
				<td><p>E-Form #<input type="text" name="eformno" required class="form-control"></p></td>
				<td><p>Shipping Mark<input type="text" required name="shipmark" class="form-control"></p></td>
				<td>
					<p>Currency
					<select name="currency" class="form-control currency" required>
						<option value="US &#36;">US $</option>
						<option value="&#163;">Pounds &#163;</option>
						<option value="&#128;">Euro &#128;</option>
					</select>
					</p>
				</td>
			</tr>

			<tr>
				<td colspan="2"> 
					<p>Customer<input type="text" class="form-control" id="invto" required name="invto"></p> 
				</td>
				<td colspan="4"> 
					<p>Shipping Address<input type="text" name="invtoad" id="invtoad" required value="" class="form-control"></p>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<p>Notify<textarea class="form-control" name="notify" required></textarea></p></td>
				<td colspan="2">
					<p>No. of Packages & Goods description<textarea class="form-control" required name="pgd"></textarea></p>
				</td>
				<td colspan="2">
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

					<p class="awbyes">
						AWB # <br>
						<input type="text" name="awbno" class="form-contol">
					</p>

					<p class="blyes">
						BL # <br>
						<input type="text" name="blno" class="form-contol">
					</p>
				</td>
				<td>
					
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<p>Freight
					<input type="text" value="0" name="freight" required class="selectfreight form-control">
					</p>
				</td>
				<td colspan="2">
					<p>Insurance
					<input type="text" value="0" name="insurance" required class="selectinsurance form-control">
					</p>
				</td>
				<td colspan="2">
					<p>Discount
					<input type="text" value="0" name="discount" required class="selectdiscount form-control"></p>
				</td>
			</tr>

		</table>
		
		<table name="invoice" id="tbl-items-append" class="table table-bordered tbl">
			<tbody>
				<tr name="line_items">
				<td><input type="text" class="itempo form-control" required name="itempo[]" placeholder="PO #"></td>
				<td>
					<input type="text" autocomplete="off" class="itemdesc form-control" required name="itemdesc[]" placeholder="Description">
					
				</td>
				<td><input type="text" class="itemhscode form-control" required readonly name="itemhscode[]" placeholder="HS Code"></td>
				<td><input type="text" class="itemqty form-control" required name="itemqty[]" placeholder="qty" class="form-control"></td>
				<td><input type="text" class="itemprice form-control" required readonly name="itemprice[]" placeholder="Unit Price"></td>
				<td style="width: 120px;"><input type="text" required placeholder="amount" name="itemamount[]" readonly class="itemamount form-control">
				</td>
			</tr>
			</tbody>
		</table>

		<div class="row my-2">
			<div class="col-md-12 text-center">
				<button class="btn btn-success add" id="btn-add-more-products"><i class="fas fa-plus-circle mx-2"></i>Add More Product(s) </button>
			</div>
		</div>

		<table class="table-bordered float-right">
			<tbody>
				<tr>
					<td> Total </td>
					<td><input type="text" name="ttlamount" class="ttlamount form-control"></td>
				</tr>

				<tr>
					<td> Total Value </td>
					<td><input type="text" name="ttlamount" readonly required class="ttlvalue form-control"></td>
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

		if ($freight == 0 && $insurance == 0) {
			$total_amount_type = "FOB";
		}else if($insurance == 0){
			$total_amount_type = "C&F";
		}else{
			$total_amount_type = "CIF";
		}

		$checkinv = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '$ino'");
		if (mysqli_num_rows($checkinv) == 0) {
			for ($i=0; $i < $count; $i++) { 
				$insert = mysqli_query($conn, "INSERT INTO invoices (inv_type, client_name, client_address, inv_notify, inv_pgd, inv_no, inv_date, inv_eform, inv_mos, inv_mop, shipmark, curreny, inv_po, inv_desc, inv_hscode, inv_qty, inv_price, inv_amount, inv_fraight, inv_insurance, inv_discount) VALUES ('$type', '$client', '$cadres', '$notify', '$pgd', '$ino', '$date', '$eform', '$mos', '$mop', '$shipmark', '$currency', '$po[$i]', '$desc[$i]', '$hscode[$i]', '$qty[$i]', '$price[$i]', '$amount[$i]', '$freight', '$insurance', '$discount')") or die(mysqli_error($conn));

				// print_r($amount[$i]."<br>");

			}

			if ($insert) {
				echo "<p class='mgssucc w-25 rounded p-2 text-center bg-success text-light'>insertion successfull<p>";
			}else{
				echo "<p class='msgerr w-25 rounded p-2 text-center bg-danger text-light'>insertion failed<p>";
			}
		}else{
			echo "<p class='msgerr w-25 rounded p-2 text-center bg-danger text-light'>Invoice Number Already Exist.<p>";
		}

	}

?>





