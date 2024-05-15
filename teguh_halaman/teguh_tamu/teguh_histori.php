<?php
include 'teguh_header.php'; 
session_start();
    $teguh_query = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_tamu WHERE teguh_username = '".$_SESSION['teguh_username']."'");
    $teguh_cek = mysqli_fetch_assoc($teguh_query);
    $teguh_email = $teguh_cek['teguh_email_tamu'];

if($_SESSION['teguh_username'] != true) {
	echo '<script>window.location="../../teguh_login_tamu.php"</script>';
}

 ?>
 <div class="tm-main-content no-pad-b">

<center><h2 class="tm-blue-text tm-margin-b-p">History Pesanan Saya</h2></center>
<div class="table-responsive">
<br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
      <th class="text-center">Email Tamu</th>
      <th class="text-center">Check-in</th>
      <th class="text-center">Check-out</th>
      <th class="text-center">Pesanan</th>
      <th class="text-center">Total</th>
      <th class="text-center">Opsi</th>
  </tr>
  </thead>
  <?php 
    
    $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasii LEFT JOIN teguh_tipe_kamar USING(teguh_id_tipe) WHERE teguh_email_tamu = '$teguh_email'");

    if (mysqli_num_rows($teguh_data) > 0) {
    while($teguh_his = mysqli_fetch_array($teguh_data)){
?>

            <tr align="center">
        <td><?php echo $teguh_his['teguh_email_tamu']; ?></td>
        <td><?php echo $teguh_his['teguh_chekin'] ?></td>
        <td><?php echo $teguh_his['teguh_chekout'] ?></td>
        <td><?php echo $teguh_his['teguh_jumlahkamar'] ?></td>
        <td>Rp. <?php echo number_format($teguh_his['teguh_total'],0,',','.');?></td>
              <td>
              <?php if ($teguh_his["teguh_status2"] === 'Belum Checkin') : ?>
            <a class="crud" style="text-decoration: none;" href="teguh_cetak.php?teguh_kode_reservasi=<?php echo $teguh_his['teguh_kode_reservasi']; ?>">Cetak</a>
            <?php elseif ($teguh_his["teguh_status2"] === 'Belum Checkout') : ?>
              <p>Sudah Checkin</p>
              <?php else : ?>
              <p>Selesai</p>
              <?php endif; ?>
            </td>
            </tr>
 <?php 
        }}else{
        ?>
        <tr>
            <td colspan="6" align="center">Anda Belum Memesan Kamar</td>
        </tr>
        <?php } ?>
    </table>

</div>
</div>
<br>
<?php 
include 'teguh_footer.php'; ?>

<style type="text/css">
.crud{
   padding: 5px 15px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
}
.crud:hover {
  color: white;
  background-color: #389fd7;
}
.tambah{
   padding: 11px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
}
.tambah:hover {
  color: white;
  background-color: #389fd7;
}

.lihat{
   padding: 5px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: green;
   cursor: pointer;

}
.lihat:hover {
    color: white;
    background: #32cd32;
}
</style>