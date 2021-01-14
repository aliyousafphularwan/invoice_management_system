<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 bg-danger">
			<div class="custom-sidebar">
				<div class="custom-sidebar-head">
					<h2>Intrade</h2>
				</div>
				<div>
					<ul class="navbar-nav sidebar-links">
						<li><a href="index.php?page=home">Home</a></li>
						<li><a href="index.php?page=invoices">Invoice Management</a></li>
						<li><a href="index.php?page=inventory">Product Management</a></li>
						<li><a href="index.php?page=clients">Client Management</a></li>
						<li><a href="index.php?page=production_orders">PO Management</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-10 p-0">
			<div class="bg-info p-1">
				<div class="row">
					<div class="col-md-6">
						<form method="post">
							<input type="text" class="form-control w-50" name="search" placeholder="search">
						</form>
					</div>
					<div class="col-md-6 text-right mt-1">
						<?php echo $_SESSION["admin"];?><span class="text-danger mx-2">|</span>
						<a href="incs/logout.php" style="color: #fff;" id="logout">Logout</a>
					</div>
				</div>
			</div>


			<div class="container page-loader">
				<?php

					if (!isset($_GET["page"])) {
						include "incs/home.php";
					}else{
						$page = $_GET["page"];
						include "incs/$page.php";
					}

				?>
			</div>

		</div>
	</div>
</div>