<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'teguh_koneksi.php';
 
// menangkap data yang dikirim dari form
$teguh_username = $_POST['teguh_username'];
$teguh_password = $_POST['teguh_password'];
$teguh_password= md5($teguh_password);
 
// menyeleksi data admin dengan teguh_username dan teguh_password yang sesuai
$teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_tamu where teguh_username='$teguh_username' and teguh_password='$teguh_password'");
 
// menghitung jumlah data yang ditemukan
$teguh_cek = mysqli_num_rows($teguh_data);
 
if($teguh_cek > 0){
 $_SESSION['teguh_username'] = $teguh_username;
 $_SESSION['status'] = "login";
 header("location:teguh_halaman/teguh_tamu/teguh_index.php?pesan=login-berhasil");
}else{
  echo "<script>
    alert('Login Gagal!  Masukkan username dan password Kembali');
    document.location.href = 'teguh_login_tamu.php';
    </script>";
} ?>