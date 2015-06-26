<?php 
	include "config/Database.php";
	
	class Kategori {
		public function insertKategori($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil ditambah');
				window.location = '?p=kategori'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal ditambah');
				window.location = '?p=kategori'</script>";
			}
		}
		
		public function deleteKategori($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil dihapus');
				window.location = '?p=kategori'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal dihapus');
				window.location = '?p=kategori'</script>";
			}
		}
		
		public function updateKategori($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil diupdate');
				window.location = '?p=kategori'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal diupdate');
				window.location = '?p=kategori'</script>";
			}
		}
	
		public function getKategori($sql1) {
			$db = new Database();
			$pdo1 = $db->getPDO();
			
			$stmt2 = $pdo1->prepare($sql1);
			$stmt2->execute();
			while($rows = $stmt2->fetch()) { 
				$dataa[] = $rows;
			}
			return $dataa;
		}
	}
?>