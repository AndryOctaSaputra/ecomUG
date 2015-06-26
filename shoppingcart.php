<?php
	include("includes/db.php");
	include("includes/functions.php");
error_reporting(0);	
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
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
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
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
        
        <div id="this_content_column"   >
			<div id="this_content" style="width: 520px; padding-bottom: 40px;"> 
				<form name="form1" method="post">
				<input type="hidden" name="pid" />
				<input type="hidden" name="command" />
					<div style="margin:0px auto; width:600px;" >
						<div style="padding-bottom:10px">
							<h1 align="center" style="color:white;">Your Shopping Cart</h1>
						<input type="button" value="Continue Shopping" onclick="window.location='home.php'" />
						</div>
							<div style="color:#F00"><?php echo $msg?></div>
							<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
							<?php
								if(is_array($_SESSION['cart'])){
									echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Serial</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
									$max=count($_SESSION['cart']);
									for($i=0;$i<$max;$i++){
										$pid=$_SESSION['cart'][$i]['productid'];
										$q=$_SESSION['cart'][$i]['qty'];
										$pname=get_product_name($pid);
										if($q==0) continue;
								?>
										<tr bgcolor="#FFFFFF"><td><?php echo $i+1?></td><td><?php echo $pname?></td>
										<td>Rp <?php echo get_price($pid)?></td>
										<td><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>                    
										<td>Rp <?php echo get_price($pid)*$q?></td>
										<td><a href="javascript:del(<?php echo $pid?>)">Remove</a></td></tr>
								<?php					
									}
								?>
									<tr><td><b>Order Total: Rp<?php echo get_order_total()?></b></td><td colspan="5" align="right"><input type="button" value="Clear Cart" onclick="clear_cart()"><input type="button" value="Update Cart" onclick="update_cart()"><input type="button" value="Place Order" onclick="window.location='billing.php'"></td></tr>
								<?php
								}
								else{
									echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
								}
							?>
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

