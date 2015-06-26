<?php
	error_reporting(0);
	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='update'){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}
		unset($_SESSION['cart']);
		echo "<script>alert('Transaksi Berhasil'); window.location.href='home.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>United Game - No Game No Life</title>
<link href="this_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="stylesheet/styles.css" />
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
	}
</script>
</head>

<body>
<div id="this_wrapper">

	<div id="this_main_column">
    
    	<div id="this_header">
        
       		<div id="site_title">
                <h1><a href="home.php" target="_parent">
                	<img src="images/logo.png" alt="Gadget Store" style="width:100px; height:110px;"><h3 style="float:right; margin-right:10px; ">United Gamers <p style="margin-top:20px; margin-bottom:0px; font-size:20px; color:#9e0000;">No Game No Life</p></h3>
                   </br>
                </a></h1>
            </div>
        
        </div> <!-- end of this_header -->
        
        <div id="this_content_column"   >
			<div id="this_content" style="width: 520px; padding-bottom: 40px;"> 
			<h1 align="center" style="color:white; font-size:20px;"><input type="button" value="Back to Detail" onclick="window.location='shoppingcart.php'" /></br></br>Attention !</h1>
			<ul style="color:white; font-size:15px;">
				<p>Pertama lakukan <strong style="color:red;">Upload Bukti Pembayaran</strong> terlebih dahulu
				<p>Jika sudah, tekan tombol <strong style="color:red;">Upload</strong>
				<p>Kemudian, Isi info data diri anda dan tekan tombol <strong style="color:red;">Place Order</strong>
				<p>Jika anda tidak menerima <strong style="color:red;">Konfirmasi Pesanan</strong> dari pengelola kami melalui <strong style="color:red;">Email/SMS/Telp</strong>, Lakukan konfirmasi ulang dengan <strong style="color:red;">Hubungi Kami</strong> di <strong style="color:red;">Kontak</strong>
			</ul></br>
			
			<h1 align="center" style="color:white; font-size:20px;">Upload Payment</h1></br></br>
				<div align="center">
				
				<form method="post" enctype="multipart/form-data">
					<table border="0" cellpadding="2px" style="color:white; font-size:15px; width: 100px;">
					<tr><td>Upload your Approved Payment: <input type="file" name="gambar" required /></td></tr>
					<tr><td>Your Name : <input type="text" name="keterangan"  /></td></tr> 
					<tr><td><input type="submit" value="Upload" name="save"></td></tr>
					</table>
				</form></br>
				
				<?php
					if (isset($_POST['save'])){
						$fileName = $_FILES['gambar']['name'];
							// Simpan ke Database
							$sql = "insert into simpan (gambar, keterangan) values ('$fileName', '".$_POST['keterangan']."')";
							mysql_query($sql);
							// Simpan di Folder Gambar
							move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
							echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";	
						} 
				?>
				<form name="form1" onsubmit="return validate()">
					<input type="hidden" name="command" />
					<div align="center">
						<h1 align="center" style="color:white;">Billing Info</h1>
						<table border="0" cellpadding="2px" style="color:white;">
							<tr><td>Order Total:</td><td><?php echo get_order_total()?></td></tr>
							<tr><td>Your Name:</td><td><input type="text" name="name" /></td></tr>
							<tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
							<tr><td>Email:</td><td><input type="text" name="email" /></td></tr>
							<tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
							<tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
						</table>
					</div>
				</form>
			
			
			</div> <!-- end of content -->
        </div> <!-- end of content column -->
        
    </div> <!-- end of this_main_column -->
    
</div> <!-- end of this_wrapper -->
<div id="this_footer_wrapper">

	<div id="this_footer">

        Copyright © 2015 United Gamers - No Game No Life | Owner : AndriOct12 | 
        Website UG - United Gamers by <a href="admin/index.php" target="_parent">Administator</a></div> 
	<!-- end of footer -->
</div> <!-- end of footer_wrapper -->
</body>
</html>

