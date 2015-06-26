<?php 
	if($proses=="tambah" || $proses=="edit") { 
		$sql = "SELECT * FROM `kategori` WHERE `id_kategori`='$id'";
		$kategori = Kategori::getKategori($sql);
		foreach($kategori as $data => $r);
		if($proses=="tambah") {
			$action = "?p=kategori-submit";
			$button = '<button type="submit" class="btn btn-primary">Submit Button</button>';
		} else {
			$action = "?p=kategori-update-$r[0]";
			$button = '<button type="submit" class="btn btn-primary">Update Button</button>';
		}
	?>
		<div class="row">
			<!--  page header -->
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Kategori</h1>
			</div>
			 <!-- end  page header -->
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						 Form Tambah Kategori
					</div>
					<div class="panel-body">
						<form action="<?php echo $action ?>" method="POST" role="form">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input class="form-control" name="nama" value="<?php echo $r[1] ?>" placeholder="">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="ckeditor" name="detail"><?php echo $r[2] ?></textarea>
							</div>
							<?php echo $button ?>
							<button type="reset" class="btn btn-success">Reset Button</button>&nbsp&nbsp&nbsp&nbsp<a href="index.php">Back</a>
						</form>
					</div>
				</div>
				<!--End Advanced Tables -->
			</div>
		</div>
<?php
	} else if($proses=="submit") {
		$nama = $_POST['nama'];
		$detail = $_POST['detail'];
		
		$sql = "INSERT INTO `kategori`(`id_kategori`, `nama_kategori`, `detail`) VALUES ('','$nama','$detail')";
		Kategori::insertKategori($sql);
		
	} else if($proses=="delete") {
		$sql = "DELETE FROM `kategori` WHERE `id_kategori`='$id'";
		Kategori::deleteKategori($sql);
		
	} else if($proses=="update") {
		$nama = $_POST['nama'];
		$detail = $_POST['detail'];
		
		$sql = "UPDATE `kategori` SET `nama_kategori`='$nama', `detail`='$detail' WHERE `id_kategori`='$id'";
		Kategori::updateKategori($sql);
		
	} else {
?>
	<div class="row">
		<!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Kategori</h1>
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
				<a href="?p=kategori-tambah" class="btn btn-primary center-block">Tambah Kategori</a>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nama Kategori</th>
									<th>Detail</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM `kategori`";
									$kategori = Kategori::getKategori($sql);
									foreach($kategori as $data => $r) {
										echo "
											<tr>
												<td>$r[1]</td>
												<td>$r[2]</td>
												<td width=130px><a href='?p=kategori-edit-$r[0]' style='width: 60px' class='btn btn-success'>Edit</a> <a href='?p=kategori-delete-$r[0]' style='width: 60px' class='btn btn-danger'>Hapus</a> </td>
											</tr>
										";
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
<?php 
	}
?>