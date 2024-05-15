<?php 

include '../../teguh_koneksi.php';

$teguh_id_tipe = $_GET['teguh_id_tipe'];

mysqli_query($teguh_koneksi,"delete from teguh_tipe_kamar where teguh_id_tipe = '$teguh_id_tipe'");

echo "<script>
    alert('Tipe Kamar berhasil dihapus.');
    document.location.href = 'teguh_tipe_kamar.php';
    </script>";

 ?>