<?php
	error_reporting(0);
	$pages = $_GET['p'];
	list($pages, $proses, $id) = explode('-', $pages);
	
	if ($pages=='home' || $pages=='')		{ include_once("pages/home.php"); }
	elseif($pages=='customers')				{ include_once("pages/data/customers.php"); }
	elseif($pages=='barang')				{ include_once("pages/data/barang.php"); }
	elseif($pages=='kategori')				{ include_once("pages/data/kategori.php"); }
	elseif($pages=='payment')				{ include_once("pages/data/payment.php"); }
	elseif($pages=='transaksi')				{ include_once("pages/data/transaksi.php"); }
	
	else { include_once("pages/error.php"); }

?>