<?php 
	include "config/Database.php";
	
	class Barang {
		public function insertBarang($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil ditambah');
				window.location = '?p=barang'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal ditambah');
				window.location = '?p=barang'</script>";
			}
		}
		
		public function deleteBarang($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil dihapus');
				window.location = '?p=barang'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal dihapus');
				window.location = '?p=barang'</script>";
			}
		}
		
		public function updateBarang($sql) { 
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$result = $stmt->execute();
			if($result) {
				echo "<script language='javascript'>alert('berhasil diupdate');
				window.location = '?p=barang'</script>";
			} else {
				echo "<script language='javascript'>alert('gagal diupdate');
				window.location = '?p=barang'</script>";
			}
		}
	
		public function getBarang($sql) {
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			while($row = $stmt->fetch()) { 
				$data[] = $row;
			}
			return $data;
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
		
		public  static function Uang($rp) {
            $rp = number_format( $rp, 0, '.', '.' );
            $rupiah = "Rp. ".$rp.",-";
            return $rupiah;
        }
	}
?>