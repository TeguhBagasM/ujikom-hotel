<?php 

include '../../teguh_koneksi.php';

$teguh_id_fasilitas = $_GET['teguh_id_fasilitas'];

mysqli_query($teguh_koneksi,"delete from teguh_fasilitas_hotel where teguh_id_fasilitas = '$teguh_id_fasilitas'");

echo "<script>
    alert('Fasilitas hotel berhasil dihapus.');
    document.location.href = 'teguh_fasilitas_hotel.php';
    </script>";

 ?>