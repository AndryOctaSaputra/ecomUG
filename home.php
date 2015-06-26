<?php
	error_reporting(0);
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_shopping");
	
	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
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
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 4,
						elemsSlide: 2,
						duration: 200,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 158,
						showControls:1});
		},
		
	});

function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
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
        
        <div id="this_content_column">

            <div id="this_left_sidebar"><span class="top"></span><span class="bottom"></span>
            
            	<div class="left_sidebar_section">
					<a href="home.php" target="_parent"><h2 style="color:#9e0000; text-decoration:none; display:block;">Home</h2></a>
					<a href="shoppingcart.php" target="_parent"><h2 style="color:#9e0000; text-decoration:none; display:block;">Your Cart</h2></a>
					<h2>Categories</h2>
                    
                    <ul class="categories_list">
                        <?php 
						$sql = mysql_query("SELECT * FROM kategori order by nama_kategori asc");
						while($r = mysql_fetch_array($sql)) { ?>
							<li><a href="?p=produk&id=<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></a></li>
						<?php 
							}
						?>
            		</ul>
				</div>
                
               
            </div> <!-- end of this_left_sidebar -->
           
            <div id="this_content">
			<form name="form1">
				<input type="hidden" name="productid" />
				<input type="hidden" name="command" />
			</form>
			<?php 
				if($_GET['p']=="produk") { 
					$sql = mysql_query("SELECT * FROM barang WHERE id_kategori='".$_GET['id']."'");
					$no = 1;
					while($r = mysql_fetch_array($sql)) { ?>
						<div class="product_box margin_r10">	
							<h3><?php echo "$r[nama_barang]" ?></h3>
							<img src="images/<?php echo "$r[foto]" ?>" alt="product" />
							<p style="color:white;"<?php echo $r['detail']?>
							<p class="price" style="color:white;">Rp<?php echo $r['harga']?> | <input type="button" value="Add to Cart" onclick="addtocart(<?php echo $r['id_barang']?>)" />
						</div>
			<?php 
			}
			?>
			
			<?php 
			} else { 
			?>
			<h2>Featured Products</h2>
		
				<?php 
					$batas = 6;
					$halaman = $_GET['halaman'];
					if (empty ($halaman)){
						$posisi = 0;
						$halaman = 1;
					}  else {
						$posisi = ($halaman - 1) * $batas;
					}
					
					
					$sql = mysql_query("SELECT * FROM barang LIMIT $posisi,$batas")or die("select * from barang"."<br/><br/>".mysql_error());
					$no = 1;
					while($r = mysql_fetch_array($sql)) { ?>
						<div class="product_box margin_r10">	
							<h3><?php echo "$r[nama_barang]" ?></h3>
							<img src="images/<?php echo "$r[foto]" ?>" alt="product" />
							<p style="color:white;"<?php echo $r['detail']?>
							<p class="price" style="color:white;">Rp<?php echo $r['harga']?> | <input type="button" value="Add to Cart" onclick="addtocart(<?php echo $r['id_barang']?>)" />
						
						</div>
				<?php 
						$no++;
					}
				?>
			<div class="cleaner"></div>
			<ul class="pagination">
			<?php 
				$tampil2 = mysql_query("SELECT * FROM barang");
				$jmlData = mysql_num_rows($tampil2);
				$jmlHal = ceil($jmlData/$batas);

				//Link ke halaman sebelumnya (Prev)
				if ($halaman > 1){
					$prev = $halaman - 1;
					echo "<li><a href=$_SERVER[PHP_SELF]?halaman=$prev> &laquo </a></li>";
				}  else {
					echo "";
				}

				//Tampilkan link halaman 1,2,3,...
				for($i=1;$i<=$jmlHal;$i++){
					if ($i != $halaman){
						echo "<li><a href='$_SERVER[PHP_SELF]?halaman=$i'> $i  </a></li>";
					}  else {
						echo "<li class='active' style='height:auto; width:auto;'> <a href=''> $i  </a> </li>";
					}
				}

				//Link ke halaman berikutnya (Next)
				if ($halaman < $jmlHal){
					$next = $halaman + 1;
					echo "<li style='height:auto; width:auto;'><a href=$_SERVER[PHP_SELF]?halaman=$next > &raquo </a></li>";
				}else{
					echo " </center>";
				}
			?>
				</ul>
			<?php
				}
			?>
        </div> <!-- end of content -->
            
		</div> <!-- end of content column -->
        
    </div> <!-- end of this_main_column -->
    
    <div id="this_right_sidebar"><span class="top"></span><span class="bottom"></span>
        
        <div class="right_sidebar_section">
        
        	<h2>Contact</h2>
            
            <div class="news_section">
                <h4>Kami Buka Hari Senin s/d Sabtu Jam 11.00-19.00WIB, </br>Minggu & Tanggal Merah Libur</h4>
                <p><strong>GSM</strong></br>
					Mentari : 081585985191</br>
					XL : 08179123088</br>
					Three : 089699478878</br>
					Telkomsel : 08129001123</br></br>
					
					Mangga Dua Mall Lt.V Blok D23-24 / D26 Jakarta 10730
           	</div>  	 	
            
        </div>
                
        <div class="right_sidebar_section">
        
			    	<h2>How to Order</h2>
					<li> Setelah melakukan pemilihan barang, brang akan disimmpan dalam keranjang belanja
					<li> Jika sudah, silahkan checkout barang pembelian Anda
					<li> Kemudian lakukan pembayaran sesuai Total harga
					<li> Pembayaran dilakukan melalui transfer Bank</br>
							&nbsp&nbsp&nbsp&nbsp <strong> BANK MANDIRI a/n : United Gamers CV, </strong> </br>
							&nbsp&nbsp&nbsp&nbsp <strong> NoRek: 900.000.8643729 , Cabang Mangga Dua , Jakarta</strong> 
					<li> Jika sudah melakukan pembayaran, Harap segera langsung mencantmkan Data Diri yang sudah disediakan dan Upload bukti transaksi
					<li> Kemudaian, pengelola akan memeriksa pesanan dan pembayaran Anda
					<li> Jika data diri yang Anda berikan semua valid, Pengelola akan konfirmasi melalui Email dan SMS sesuai yang anda cantumkan
					<li> Setelah itu, pengelola akan mempersiapkan barang sesuai pesanan Anda dan dikirim melalui kurir JNE</br>
					<br>
					<strong>Apabila ada pertanyaan lebih lanjut silahkan menghubungi kami langsung, Terima Kasih.</strong> 
            <div class="cleaner"></div>
        </div>
    
    	<div class="cleaner"></div>
    </div>
    

</div> <!-- end of this_wrapper -->

<div id="this_footer_wrapper">

	<div id="this_footer">

        Copyright © 2015 United Gamers - No Game No Life | Owner : AndriOct12 | 
        Website UG - United Gamers by <a href="admin/index.php" target="_parent">Administator</a></div> 
	<!-- end of footer -->
</div> <!-- end of footer_wrapper -->
</html>