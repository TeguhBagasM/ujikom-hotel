<?php
include "../../teguh_koneksi.php";
  $teguh_kode_reservasi = $_GET['teguh_kode_reservasi'];
  $teguh_cetak = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasii WHERE teguh_kode_reservasi = '".$_GET['teguh_kode_reservasi']."'");
  $teguh_cl = mysqli_fetch_array($teguh_cetak);
  
 ?> 

 <?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CETAK PESANAN TAMU</title>
</head>
<body>
<br>
<img style="float: left;" src="../../teguh_asset/teguh_image/logo.jpeg" alt="logo" width="90" height="90">
<h3 align="center" style="color: #000;">THIEV HOTEL<br>Jl. Pelajar Pejuang 21 No. 103<br>Kec. Lengkong, Kota Bandung, Jawa Barat</h3>
<br>
 <hr/>
<br>
<h3 align="center" style="color: #000;">LAPORAN PESANAN TAMU</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
		<tr align="center">
      <th>Kode Reservasi</th>
      <th>Email Tamu</th>
      <th>Jumlah Tamu</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Status</th>
      <th width="40">Jumlah Pesanan</th>
      <th>Total</th>
  </tr>
		<?php 

        $sub_total = 0;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasii WHERE teguh_kode_reservasi='$teguh_kode_reservasi'");

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_cl = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $teguh_cl['teguh_kode_reservasi']; ?></td>
        <td><?php echo $teguh_cl['teguh_email_tamu']; ?></td>
        <td><?php echo $teguh_cl['teguh_jumlahtamu'] ?></td>
        <td><?php echo $teguh_cl['teguh_chekin'] ?></td>
        <td><?php echo $teguh_cl['teguh_chekout'] ?></td>
        <td><?php echo $teguh_cl['teguh_status2'] ?></td>
        <td><?php echo $teguh_cl['teguh_jumlahkamar'] ?></td>
        <td>Rp. <?php echo number_format($teguh_cl['teguh_total'],0,',','.');?></td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="8" align="center">Anda Belum Memesan Kamar</td>
        </tr>
        <?php } ?>
    </table>

	<script>
		window.print();
	</script>
	<br>
	<br>
	<br>
	<h4 class="m-0 font-weight-bold text-primary" align="right">Bandung, <?php echo date('d - m - Y'); ?></h4> 
 <h4 class="m-0 font-weight-bold text-primary" align="right">Resepsionis,</h4>
 <br>
<?php
include "../../teguh_koneksi.php";
 $query = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_user WHERE teguh_username_user='$_SESSION[teguh_username_user]' ");
 $data = mysqli_fetch_array($query); ?>
 <h4 align="right"><?php echo $data['teguh_nama_user']; ?></h4>

<br>
<h3><a class="no-print" href="teguh_index.php" style="margin-right: 3%;">KEMBALI</a>
</body>
</html>
<style type="text/css">
@media print{
.no-print{
  display: none;
}
}
</style>