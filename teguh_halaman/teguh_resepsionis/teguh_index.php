<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h2 class="tm-blue-text tm-margin-b-p">Laporan Pesanan Tamu</h2></center>
<div class="table-responsive">
    <br><br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
    <th class="text-center">Nama Tamu</th>
      <th class="text-center">Check-in</th>
      <th class="text-center">Check-out</th>
      <th class="text-center">Status</th>
      <th class="text-center">Total</th>
      <th class="text-center">Opsi</th>
      <th class="text-center">Aksi</th>
  </tr>
</thead>
      <?php 
      $sub_total = 0;
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasii LEFT JOIN teguh_tipe_kamar USING(teguh_id_tipe)");
      $no=1;
 
      if(isset($_GET['teguh_chekin'])){
        $teguh_checkin = $_GET['teguh_chekin'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasii LEFT JOIN teguh_tipe_kamar USING(teguh_id_tipe) where teguh_chekin='$teguh_checkin'");
      }elseif(isset($_GET['teguh_nama_tamu'])){
        $teguh_tamu = $_GET['teguh_nama_tamu'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasii LEFT JOIN teguh_tipe_kamar USING(teguh_id_tipe) where teguh_nama_tamu='$teguh_tamu'");
      }else{
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasii LEFT JOIN teguh_tipe_kamar USING(teguh_id_tipe)");
      }
      if (mysqli_num_rows($teguh_data) > 0) {
      while($teguh_lt = mysqli_fetch_array($teguh_data)){
      ?>
            <tr align="center">
        <td><?php echo $teguh_lt['teguh_nama_tamu']; ?></td>      
        <td><?php echo $teguh_lt['teguh_chekin']; ?></td>
        <td><?php echo $teguh_lt['teguh_chekout'] ?></td>
        <td><?php echo $teguh_lt['teguh_status2'] ?></td>
        <td>Rp. <?php echo number_format($teguh_lt['teguh_total'], 0, ',','.') ?></td>
              <td>
              <?php if ($teguh_lt["teguh_status2"] === 'Belum Checkin') : ?>
            <a class="crud" style="text-decoration: none;" href="teguh_checkin.php?teguh_id_reservasi=<?php echo $teguh_lt['teguh_id_reservasi']; ?>">Check-in</a>
            <?php elseif ($teguh_lt["teguh_status2"] === 'Belum Checkout') : ?>
              <a class="checkout" style="text-decoration: none;" href="teguh_checkout.php?teguh_id_reservasi=<?php echo $teguh_lt['teguh_id_reservasi']; ?>" onClick="return confirm('Yakin akan checkout tamu?');">Check-out</a>
              <?php else : ?>
              <p>Selesai</p>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($teguh_lt["teguh_status2"] === 'Sudah Checkout') : ?>
              <a class="checkout" style="text-decoration: none;" href="teguh_cetak.php?teguh_kode_reservasi=<?php echo $teguh_lt['teguh_kode_reservasi']; ?>">Cetak</a>
              <?php else : ?>
              <p>Belum Selesai</p>
              <?php endif; ?>
            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="7" align="center">Tidak ada pesanan kamar</td>
        </tr>
        <?php } ?>
    </table>
<center><br>
<a class="cetak" style="text-decoration: none;" href="teguh_cetak_semua.php">Cetak Laporan</a>
</center>
<br> 
</div>
</div>

<?php 
include 'teguh_footer.php'; ?>

<style type="text/css">
.crud{
   padding: 6px 20px;
   margin: 10px ;
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
.filter{
   padding: 3px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
   border: none;
}
.filter:hover {
  color: white;
  background-color: #389fd7;
}
.checkout{
   padding: 6px 14px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: green;
   cursor: pointer;

}
.checkout:hover {
    color: white;
    background: #32cd32;
}
.cetak{
   padding: 7px 20px;
   margin: 5px ;
   text-align: center;
   font-size: 15pt;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
}
.cetak:hover {
  color: white;
  background-color: #389fd7;
}
</style>