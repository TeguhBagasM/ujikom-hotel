<?php   
include '../../teguh_koneksi.php';


  $teguh_data = mysqli_query ($teguh_koneksi, "SELECT * FROM teguh_reservasii WHERE teguh_id_reservasi = '".$_GET['teguh_id_reservasi']."'"); 
  $teguh_po = mysqli_fetch_assoc($teguh_data);
  $teguh_kamar = $teguh_po['teguh_no_kamar'];
  $teguh_kode = $teguh_po['teguh_kode_reservasi'];
  $teguh_id_tipe = $teguh_po['teguh_id_tipe'];
  $teguh_jumlah = $teguh_po['teguh_jumlahkamar'];
  


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
</head>
<body>
  <?php 
  $teguh_jml = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '$teguh_id_tipe' ");
  $teguh_ckout = mysqli_fetch_assoc($teguh_jml);
  $teguh_jmll = $teguh_ckout['teguh_jumlah_bed'];

   ?>
<input type="hidden" name="teguh_no" value="<?php echo $teguh_kamar; ?>">



</body>
</html>

<?php  

$teguh_jmll = $teguh_ckout['teguh_jumlah_bed'];
$teguh_jumlah = $teguh_po['teguh_jumlahkamar'];
$teguh_jumlah2 = $teguh_jmll + $teguh_jumlah;
$teguh_kamar = $teguh_po['teguh_no_kamar'];
$teguh_kode = $teguh_po['teguh_kode_reservasi'];
$teguh_konfir = "Tersedia";
$data= explode(" ",$teguh_kamar);

foreach ($data as $a ) {
                mysqli_query($teguh_koneksi,"UPDATE teguh_kamar SET teguh_status = '$teguh_konfir'
                 WHERE teguh_no_kamar = '$a' ");


  }
mysqli_query($teguh_koneksi, "UPDATE teguh_tipe_kamar SET teguh_jumlah_bed = '$teguh_jumlah2' WHERE teguh_id_tipe = '$teguh_id_tipe' ");  
 mysqli_query($teguh_koneksi, "UPDATE teguh_reservasii SET teguh_status2 = 'Sudah Checkout' WHERE teguh_id_reservasi = '".$_GET['teguh_id_reservasi']."' ");


  echo "<script>alert('Checkout Tamu berhasil')</script>";
  echo "<script>location='teguh_index.php'</script>";


?>