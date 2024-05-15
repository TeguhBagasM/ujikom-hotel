<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Detail Fasilitas</h1></center>
<a class="kembali" href="teguh_fasilitas_kamar.php">KEMBALI</a>
<div class="table-responsive">
<br>
      <table class="table table-bordered" border="3" align="center" width="90%" cellspacing="6">
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto Kamar</th>
      <th class="text-center">Tipe Kamar</th>
      <th class="text-center">Deskripsi</th>
      <th class="text-center">Fasilitas</th>
      <th class="text-center">Harga</th>
      <th class="text-center">Jumlah</th>
  </tr>
 <?php 

  $no = 1;
  $teguh_tipe_kamar = $_GET['teguh_tipe_kamar'];
  $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar WHERE teguh_tipe_kamar = '".$_GET['teguh_tipe_kamar']."'");
  $teguh_lfk = mysqli_fetch_array($teguh_data);
 ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><img src="../../teguh_asset/teguh_image/<?php echo $teguh_lfk['teguh_foto'] ?>" width="150px" height="100px"></td>
                <td><?php echo $teguh_lfk['teguh_tipe_kamar']; ?></td>
                <td><?php echo $teguh_lfk['teguh_deskripsi']; ?></td>
                <td><?php echo $teguh_lfk['teguh_fasilitas'] ?></td>
                <td>Rp. <?php echo number_format($teguh_lfk['teguh_harga'],0, ',','.'); ?></td>
                <td><?php echo $teguh_lfk['teguh_jumlah_bed']; ?></td>
           </tr>
    </table>
    <br>
</div>
</div>
<br>
<?php 
include 'teguh_footer.php'; ?>

<style type="text/css">
.kembali{
   padding: 11px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: green;
   cursor: pointer;
}
.kembali:hover {
  color: white;
  background-color: darkgreen;
}
</style>