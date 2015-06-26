<?php 
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_shopping");
	
	if($proses=="tambah") {
		
	} else {
?>
	<div class="row">
		 <!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Transaksi</h1>
		</div>
		 <!-- end  page header -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!-- Advanced Tables -->
			<div class="panel panel-default">
				<div class="panel-heading">
					 Advanced Tables
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Date</th>
									<th>CustomerId</th>
									<th>OrderId</th>
									<th>ProductId</th>
									<th>Quantity</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = mysql_query("SELECT * FROM order_detail,orders ORDER BY customerid ASC");
									while($r = mysql_fetch_array($sql)) { ?>
											<tr>
												<td><?php echo $r['date'] ?></td>
												<td><?php echo $r['customerid'] ?></td>
												<td><?php echo $r['orderid'] ?></td>
												
												<td><?php echo $r['productid'] ?></td>
												<td><?php echo $r['quantity'] ?></td>
												<td><?php echo $r['price'] ?></td>
											</tr>
									<?php 
										}
									?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			<!--End Advanced Tables -->
		</div>
	</div>

<?php } ?>
