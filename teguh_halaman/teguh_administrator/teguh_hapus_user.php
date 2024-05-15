<?php 

include '../../teguh_koneksi.php';

$teguh_id_user = $_GET['teguh_id_user'];

mysqli_query($teguh_koneksi,"delete from teguh_user where teguh_id_user = '$teguh_id_user'");

echo "<script>
    alert('Data User berhasil dihapus.');
    document.location.href = 'teguh_user.php';
    </script>";

 ?>