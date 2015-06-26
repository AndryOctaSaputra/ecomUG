<?php 
	class Database {
		private $dbHost;
		private $dbName;
		private $dbUser;
		private $dbPass;
	
		function __construct() {
			$this->db = null;
		}
		
		public function getPDO() {
			if ($this->db == null) {
				$dbHost = "localhost";
				$dbName = "db_shopping";
				$dbUser = "root";
				$dbPass = "";
			
				$this->db = new PDO("mysql:host=".$dbHost."; dbname=".$dbName, $dbUser, $dbPass);
			}
			return $this->db;
		}
	}
?>