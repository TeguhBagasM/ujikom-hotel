<?php 
session_start();
if (!empty($_SESSION['status']) and $_SESSION['status'] == "login") {
  header('location: teguh_halaman/teguh_administrator/teguh_user.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN THIEV HOTEL</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="teguh_asset/teguh_css/teguh_login.css">
</head>
<body id="bg-login">

  <div class="kotak_login">
    <h2 align="center">LOGIN USER</h2>
    <form action="teguh_cek_login.php" method="POST" autocomplete="off">
      <input type="text" class="form_login" name="teguh_username_user" placeholder="Masukkan Username" required>
      <input id="TeguhInput" type="password" class="form_login" name="teguh_password_user" placeholder="Masukkan Password" required><input type="checkbox" onclick="myFunction()">Lihat
      <input type="submit" class="tombol_login" name="submit" value="LOGIN">
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