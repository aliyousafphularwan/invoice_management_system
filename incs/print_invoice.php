<style type="text/css">
	body{
		font-size: 9pt;
		font-weight: bold;
	}
	.invsender{
		display: flex;
		flex-direction: row;
		justify-content: space-between;
	}
	/*.invoice-type{
		font-size: 16pt;
	}*/
</style>

	<div>
		<button id="printit" class="btn btn-info m-3" onClick="printdiv('printme');"> Print Invoice </button>
	</div>

<?php
	$invid = $_GET['invoice_no'];
	$sum = 0;
	
?>

<div class="" width="3508" id="printme">
	<table class="table table-borderless p-2 tbl-fnl-inv">
		<tr>
	<?php

		$query = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '$invid' LIMIT 1;");
		while ($row = mysqli_fetch_assoc($query)) {
			
			?>

					<!-- <p class="invoice-type"><?php echo $row['inv_type']?></p> -->
						<td colspan="6"> 
							
							<div class="row">
								<div class="col-sm-6">
									<div class="invoice-logo invsender">
										<img src="imgs/logo.png" width="220">
										
									</div> 
									<p class="invsender">
										Commissioner Road, Muhammad Pura,<br> Sialkot-51310-Pakistan<br>
										Tel: +92123456789 Fax: +92123456789<br>
										Email: info@intrade.com.pk
									</p>
								</div>
								<div class="col-sm-6 text-right">
									<h4 class="invoice-type px-5"><?php echo $row['inv_type']?></h4>
								</div>
							</div>

							<div class="table-bordered border-dark m-1 px-3 py-1">
								Consignee:
								<p style="font-weight: 300;"> <?php echo $row['client_name']."<br>".$row['client_address'];?> </p>
							</div>
							<div class="table-bordered border-dark m-1 px-3 py-1">
								Notify:
								<p style="font-weight: 300;"> <?php echo $row["inv_notify"];?> </p>
							</div>
							<div class="table-bordered border-dark m-1 px-3 py-1">
								No. of Packages & Goods description:
								<p style="font-weight: 300;"> <?php echo $row["inv_pgd"];?> </p>
							</div>
						</td>
						<td colspan="3" class="p-1">
							<div class="idateno">
								<p>INVOICE NO: <span class="text-lite">FL/<?php echo $row['inv_no']?>/<?php echo date('y');?></span> </p>
								<p>INVOICE Date: <span class="text-lite"><?php echo date('d/m/Y');?><span></p>
							</div>
							<p class="table-bordered border-dark m-1 px-3 py-1">Form "E" No. <?php echo $row['inv_eform'];?></p>
							<p class="table-bordered border-dark m-1 px-3 py-1">Country of Origin of goods (Pakistan)</p>
							<p class="table-bordered border-dark m-1 px-3 py-1">Terms of Delivery and payment</p>
							<p class="table-bordered border-dark m-1 px-3 py-1">REX Registration #: <b>PKREXPK20455003</b></p>

							<div class="text-center">
								<img src="imgs/tri.png" width="200" class="mx-auto">
							</div>
							<p class="text-center p-0 m-0"> <?php echo $row['shipmark'];?> </p>
						</td>
					
				
			<?php

		}

	?>
	</tr>
	</table>
	
	<table class="w-100 my-1 p-0">
		<thead style="border-bottom: solid 1px #000;">
			<tr>
				<th class="text-center p-1"> PO# </th>
				<th class="text-center p-1" colspan="4"> DESCRIPTION </th>
				<th class="text-center p-1"> HS CODE </th>
				<th class="text-center p-1"> QUANTITY </th>
				<th class="text-center p-1"> PRICE ($) </th>
				<th class="text-center p-1"> AMOUNT ($) </th>
			</tr>
		</thead>

		<tbody>
			<?php
				$query2 = mysqli_query($conn, "SELECT inv_po, inv_desc, inv_hscode, inv_qty, inv_price FROM invoices WHERE inv_no = '$invid'");
				while ($r = mysqli_fetch_assoc($query2)) {
					?>
						<tr>
							<td class="text-center p-1"><?php echo $r['inv_po'];?></td>
							<td class="p-1" colspan="4"> <?php echo $r['inv_desc'];?> </td>
							<td class="text-center p-1"> <?php echo $r['inv_hscode'];?></td>
							<td class="text-center p-1"> <?php echo $r['inv_qty'];?> </td>
							<td class="text-center p-1"> <?php echo $r['inv_price'];?> </td>
							<td class="text-center p-1"> <?php echo $r['inv_price'] * $r['inv_qty'];?> </td>
						</tr>
					<?php
				}

			?>
			<tr class="p-2">
				<td colspan="8" class="text-right">
					<div class="mx-2">
						<p class="p-0 m-0"> Freight: </p>
						<p class="p-0 m-0"> Insurance: </p>
						<p class="p-0 m-0"> Discount: </p>
						<p class="p-0 m-0"> Total: </p>
					</div>
				</td>
				<?php
					$calc = mysqli_query($conn, "SELECT * FROM invoices WHERE inv_no = '$invid'");
					while ($get = mysqli_fetch_array($calc)) {
						
						
						
					}
				?>
				<td>
					<p class="p-0 m-0 text-center"> 0 </p>
					<p class="p-0 m-0 text-center"> 0 </p>
					<p class="p-0 m-0 text-center"> 0 </p>
					<p class="p-0 m-0 text-center"> 
						<?php
							$q = mysqli_query($conn, "SELECT SUM(inv_price * inv_qty) as sum FROM invoices WHERE inv_no = '$invid'");
							while ($d = mysqli_fetch_assoc($q)) {
								echo $d['sum']." $";
								$num = $d['sum'];
							}
						?> 
					</p>
				</td>
			</tr>
			
		</tbody>
	</table>

	<div class="container">
		<div class="row table-bordered">
			<div class="col-md-3">
			</div>
			<div class="col-md-3">
			</div>

			<div class="col-md-3">
			</div>
			<div class="col-md-3">
				 
				<div class="row">
					<div class="col-sm-6">
						Total FOB Value:
					</div>
					<div class="col-sm-6">
						<?php echo $num;?> $
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
</script>