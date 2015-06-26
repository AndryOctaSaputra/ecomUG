<?php 
	include "config/Database.php";
	
	class Transaksi {
		public function getTransaksi($sql) {
			$db = new Database();
			$pdo = $db->getPDO();
			
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			while($row = $stmt->fetch()) { 
				$data[] = $row;
			}
			return $data;
		}
	?>