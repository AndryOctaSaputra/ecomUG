<link rel="stylesheet" href="style-login.css">

<?php
$konek = mysqli_connect ("localhost","root","","db_shopping") or die ("You must connect to internet");

// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection($_POST['password']); //gunakan md5 apabila ingin di enkripsi(admin tidak mengetahui paswordnya)

// menghindari sql injection
$injeksi_username = mysqli_real_escape_string($konek, $username);
$injeksi_password = mysqli_real_escape_string($konek, $password);

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
	echo "<div id='footer'><center><h3>Gunakan huruf dan angka</h3>";
	echo "<a href=\"index.php\"><input type=\"submit\" name=\"submit\" value=\"login\"/></center></div>";  
  
}
else{
  $query  = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $login  = mysqli_query($konek, $query);
  $ketemu = mysqli_num_rows($login);
  $r      = mysqli_fetch_array($login);

  // Apabila username dan password ditemukan (benar)
  if ($ketemu > 0){
    session_start();

    // bikin variabel session
    $_SESSION['namauser']    = $r['username'];
    $_SESSION['passuser']    = $r['password'];
    $_SESSION['akses']   = $r['akses'];
      
    // bikin id_session yang unik dan mengupdatenya agar slalu berubah 
    // agar user biasa sulit untuk mengganti password Administrator 
    //bila menggunakan md5 gunakan ini
	/*$sid_lama = session_id();
	  session_regenerate_id();
    $sid_baru = session_id();
    mysqli_query($konek, "UPDATE users SET id_session='$sid_baru' WHERE username='$username'");*/

    header("location:index.php");
  }
  else{
    echo "<div id='footer'>Login Gagal! <br>Username & Password salah.";
    echo "<a href=\"login.php\"><input type=\"submit\" name=\"submit\" value=\"login kembali\"/></div>";  
  }
}
?>
