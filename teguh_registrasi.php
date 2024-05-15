<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTRASI TAMU</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="teguh_asset/teguh_css/teguh_login.css">
</head>
<body id="bg-login">

  <div class="kotak_login">
    <h2 align="center">DAFTAR AKUN</h2>
    <form action="" method="POST">
      <input class="form_login" type="text" name="teguh_no_identitas" placeholder="Masukkan Nomor Identitas" autocomplete="off" required>
      <input class="form_login" type="text" name="teguh_nama_tamu" placeholder="Masukkan Nama Lengkap" autocomplete="off" required>
      <input class="form_login" type="email" name="teguh_email_tamu" placeholder="Masukkan Email" autocomplete="off" required>
      <input type="text" class="form_login" name="teguh_username" placeholder="Masukkan Username" required>
      <input id="TeguhInput" type="password" class="form_login" name="teguh_password" placeholder="Masukkan Password" required><input type="checkbox" onclick="myFunction()">Lihat
      <input type="number" class="form_login" name="teguh_telpon_tamu" placeholder="Masukkan Nomor Hp">
      <input type="submit" class="tombol_login" name="submit" value="DAFTAR">
      <center>
        <label>Sudah punya akun? </label><a href="teguh_login_tamu.php" class="link">Login</a>
      </center>
              <script>
function myFunction() {
  var x = document.getElementById("TeguhInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
        </script> 
    </form>

  </div>

</body>
</html>

<?php 

include 'teguh_koneksi.php';

   if(isset($_POST['submit'])){
      $teguh_no_identitas = $_POST['teguh_no_identitas'];
      $teguh_nama_tamu = $_POST['teguh_nama_tamu'];
      $teguh_email_tamu = $_POST['teguh_email_tamu'];
      $teguh_username = $_POST['teguh_username'];
      $teguh_password = md5($_POST['teguh_password']);
      $teguh_telpon_tamu = $_POST['teguh_telpon_tamu'];

      mysqli_query($teguh_koneksi,"insert into teguh_tamu values('$teguh_no_identitas','$teguh_nama_tamu','$teguh_email_tamu','$teguh_username','$teguh_password','$teguh_telpon_tamu')");

      echo "<script>
    alert('Registrasi Berhasil, Silahkan login.');
    document.location.href = 'teguh_login_tamu.php';
    </script>";
    }
   ?>

</body>
</html>