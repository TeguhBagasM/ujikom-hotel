<?php 

include '../../teguh_koneksi.php';

$teguh_kode_reservasi = $_GET['teguh_kode_reservasi'];

mysqli_query($teguh_koneksi,"delete from teguh_reservasi where teguh_kode_reservasi = '$teguh_kode_reservasi'");

mysqli_query($teguh_koneksi,"delete from teguh_reserved_room where teguh_kode_reservasi = '$teguh_kode_reservasi'");

echo "<script>
    alert('Pesanan tamu berhasil dihapus.');
    document.location.href = 'teguh_index.php';
    </script>";

 ?>