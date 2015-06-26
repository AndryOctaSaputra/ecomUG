<?php 
	if($proses=="tambah" || $proses=="edit") { 
		if($proses=="tambah") {
			$action = "?p=barang-submit";
			$button = '<button type="submit" class="btn btn-primary">Submit Button</button>';
			$sql = "SELECT * FROM `kategori`";
			$kategori = Kategori::getKategori($sql);
		} else {
			$sql1 = "SELECT * FROM `barang` WHERE `id_barang`='$id'";
			$barang = Barang::getBarang($sql1);
			foreach($barang as $row => $r);
			$s = "selected";
			$sql = "SELECT * FROM `kategori`";
			$kategori = Barang::getKategori($sql);
			$action = "?p=barang-update-$r[0]";
			$button = '<button type="submit" class="btn btn-primary">Update Button</button>';
		}
	?>
		<div class="row">
			<!--  page header -->
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Barang</h1>
			</div>
			 <!-- end  page header -->
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						 Form Tambah Barang
					</div>
					<div class="panel-body">
						<form action="<?php echo $action ?>" enctype="multipart/form-data" method="POST" role="form">
							<div class="form-group">
								<label>Nama Barang</label>
								<input class="form-control" name="nama" value="<?php echo $r['nama_barang'] ?>" placeholder="">
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select name="kategori" class="form-control">
									<option value=''> -- Pilih Kategori -- </option>
									<?php 
										foreach($kategori as $data => $s) {
											if($r['id_kategori']==$s['id_kategori']) {
												echo "<option value='$s[0]' selected>$s[1]</option>";
											} else {
												echo "<option value='$s[0]'>$s[1]</option>";
											}
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Harga Barang</label>
								<input class="form-control" name="harga" value="<?php echo $r['harga'] ?>" placeholder="">
							</div>
							<div class="form-group">
								<label>Foto</label>
								<input name="foto" value="<?php echo $r['foto'] ?>" type="file">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="ckeditor" name="detail"><?php echo $r['detail'] ?></textarea>
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
		$kategori = $_POST['kategori'];
		$harga = $_POST['harga'];
		$foto = $_FILES["foto"]["name"];
		$detail = $_POST['detail'];
		
		if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["foto"]["error"] . "<br>";
        } else {
            if (file_exists("asset/img/upload/" . $foto)) {
                $sql = "INSERT INTO `barang`(`id_barang`, `nama_barang`, `id_kategori`, `harga`, `foto`, `detail`) VALUES ('','$nama','$kategori','$harga','$foto','$detail')";
                Barang::insertBarang($sql);
            } else {
				$sql = "INSERT INTO `barang`(`id_barang`, `nama_barang`, `id_kategori`, `harga`, `foto`, `detail`) VALUES ('','$nama','$kategori','$harga','$foto','$detail')";
                Barang::insertBarang($sql);
                move_uploaded_file($_FILES["foto"]["tmp_name"],"../images/" .$foto);
            }
        }
		
		// 
		// Barang::insertBarang($sql);
		
		echo '
			<div class="row">
				<!--  page header -->
				<div class="col-lg-12">
					<h1 class="page-header">
						<br>'.$nama.'
						<br>'.$kategori.'
						<br>'.$harga.'
						<br>'.$foto.'
						<br>'.$detail.'
					</h1>
				</div>
				 <!-- end  page header -->
			</div>
		';
		
	} else if($proses=="update") {
		$nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		$harga = $_POST['harga'];
		$foto = $_FILES["foto"]["name"];
		$detail = $_POST['detail'];
		
		if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["foto"]["error"] . "<br>";
        } else {
            if(empty($foto)) {
				if (file_exists("asset/img/upload/" . $foto)) {
					$sql = "UPDATE `barang` SET `nama_barang`='$nama',`id_kategori`='$kategori',`harga`='$harga',`detail`='$detail' WHERE `id_barang`='$id'";
					Barang::updateBarang($sql);
				} else {
					$sql = "UPDATE `barang` SET `nama_barang`='$nama',`id_kategori`='$kategori',`harga`='$harga',`detail`='$detail' WHERE `id_barang`='$id'";
					Barang::updateBarang($sql);
					move_uploaded_file($_FILES["foto"]["tmp_name"],"../images/" .$foto);
				}
			} else {
				if (file_exists("asset/img/upload/" . $foto)) {
					$sql = "UPDATE `barang` SET `nama_barang`='$nama',`id_kategori`='$kategori',`harga`='$harga',`detail`='$detail' WHERE `id_barang`='$id'";
					Barang::updateBarang($sql);
				} else {
					$sql = "UPDATE `barang` SET `nama_barang`='$nama',`id_kategori`='$kategori',`harga`='$harga',`foto`='$foto',`detail`='$detail' WHERE `id_barang`='$id'";
					Barang::updateBarang($sql);
					move_uploaded_file($_FILES["foto"]["tmp_name"],"../images/" .$foto);
				}
			}
        }
		
	} else if($proses=="delete") {
		$sql = "DELETE FROM `barang` WHERE `id_barang`='$id'";
		Barang::deleteBarang($sql);
		
	} else {
?>
	<div class="row">
		<!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Barang</h1>
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
				<a href="?p=barang-tambah" class="btn btn-primary center-block">Tambah Barang</a>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Foto</th>
									<th>Detail</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM `barang`";
									$barang = Barang::getBarang($sql);
									foreach($barang as $data => $r) {
										echo "
											<tr>
												<td>$r[1]</td>
												<td>$r[3]</td>
												<td>$r[4]</td>
												<td>$r[5]</td>
												<td width=130px><a href='?p=barang-edit-$r[0]' style='width: 60px' class='btn btn-success'>Edit</a> <a href='?p=barang-delete-$r[0]' style='width: 60px' class='btn btn-danger'>Hapus</a> </td>
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