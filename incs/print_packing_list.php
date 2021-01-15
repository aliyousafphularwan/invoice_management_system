<style type="text/css">
	body{
		font-size: 9pt;
		font-weight: bold;
	}
	table th{
		text-align: center;
	}
</style>

<div>
	<button id="printit" class="btn btn-info m-3" onClick="printdiv('printme');"> Print Invoice </button>
</div>

<div class="container" id="printme">
	
	<div class="">
		<div class="row">
			<div class="col-md-12">
				<img src="imgs/logo.png" width="220">
				<p>
					Commissioner Road, Muhammad Pura, Sialkot-51310-Pakistan<br>
					Tel: +92 52 4598233 Fax: +92 52 4598277<br>
					Email: info@intrade.com.pk
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="text-center" style="font-size: 18pt;"><u>PACKING LIST</u></p>
			</div>
		</div>

		<div class="row">
		<?php 

			$pack_id = $_GET['packing_id'];

			$getdata = mysqli_query($conn, "SELECT * FROM packing WHERE inv_no = '$pack_id' LIMIT 1");

			while ($row = mysqli_fetch_assoc($getdata)) {
				?>
				<div class="col-md-4">
					<p class="table-bordered border-dark p-2"> Invoice No. <u><?php echo $row['inv_no'];?></u></p>
				</div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4">
					<p class="table-bordered border-dark p-2">Invoice Date. <?php echo $row['inv_date'];?></p>
				</div>
				<?php
			}

		?>
	
		</div>
	</div>

	<table class="table table-borderless">
		<thead style="border: solid 1px #000;">
			<tr>
				<th width="10%" style="border-right: solid 1px #000;" class="text-center p-1"> Carton # </th>
				<th width="10%" style="border-right: solid 1px #000;" class="text-center p-1"> Quantity </th>
				<th width="70%" style="border-right: solid 1px #000;" class="text-center p-1" colspan="4"> Description of Goods </th>
				<th width="10%" style="border-right: solid 1px #000;" class="text-center p-1"> PO. # </th>
			</tr>
		</thead>

		<tbody style="border: solid 1px #000;">
			<?php
				$id = $_GET["packing_id"]; 
				$gettable = mysqli_query($conn, "SELECT * FROM packing WHERE inv_no = '$id'");
				while ($data = mysqli_fetch_assoc($gettable)) {
					?>
					<tr>
						<td class="text-center p-1" style="border-right:solid 1px #000;font-weight: 500;"><?php echo $data["carton_no"];?></td>
						<td class="text-center p-1" style="border-right:solid 1px #000;font-weight: 500;"><?php echo $data["qty"];?></td>
						<td class="p-1" colspan="4" style="border-right:solid 1px #000;font-weight: 500;"><?php echo $data["desc_of_goods"];?></td>
						<td class="text-center p-1" style="border-right:solid 1px #000;font-weight: 500;"><?php echo $data["po_no"];?></td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>

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