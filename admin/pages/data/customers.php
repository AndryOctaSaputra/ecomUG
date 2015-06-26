<?php 
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_shopping");
	
	if($proses=="tambah") {
		
	} else {
?>
	<div class="row">
		 <!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Pembeli</h1>
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
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Phone</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = mysql_query("SELECT * FROM customers order by serial asc");
									while($r = mysql_fetch_array($sql)) { ?>
											<tr>
												<td><?php echo $r['name'] ?></td>
												<td><?php echo $r['email'] ?></td>
												<td><?php echo $r['address'] ?></td>
												<td><?php echo $r['phone'] ?></td>
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