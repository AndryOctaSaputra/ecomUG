<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin United Gamers</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <a href="../home.php"><i class="fa fa-sign-out fa-fw"></i>Back</a>
						<h3 class="panel-title">Please Sign In</h3>
					</div>
					
					
                    <div class="panel-body">
                        <form  name="login" method="POST" action="cek_login.php" onSubmit="return validasi(this)">
							<table>
								<tr>
									<td>Username</td>
									<td>:</td>
									<td><input type="text" name="username" size="20"/></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>:</td>
									<td><input type="password" name="password" size="20"/></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><input type="submit" name="submit" value="Login"/>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td>
									
								</tr>
								
							</table>
						</form> 
                    </div>
                
				
				</div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
