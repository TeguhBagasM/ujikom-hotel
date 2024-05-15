<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Detail Fasilitas</h1></center>
<a class="kembali" href="teguh_fasilitas_hotel.php">KEMBALI</a>
<div class="table-responsive">
<br>
      <table class="table table-bordered" border="3" align="center" width="90%" cellspacing="6">
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto Fasilitas</th>
      <th class="text-center">Nama Fasilitas</th>
      <th class="text-center">Lantai Fasilitas</th>
      <th class="text-center">Keterangan</th>
  </tr>
 <?php 

  $no = 1;
  $teguh_id_fasilitas = $_GET['teguh_id_fasilitas'];
  $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_fasilitas_hotel WHERE teguh_id_fasilitas = '".$_GET['teguh_id_fasilitas']."'");
  $teguh_lfh = mysqli_fetch_array($teguh_data);
 ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><img src="../../teguh_asset/teguh_image/<?php echo $teguh_lfh['teguh_foto_fasilitas'] ?>" width="150px" height="100px"></td>
                <td><?php echo $teguh_lfh['teguh_nama_fasilitas']; ?></td>
                <td>Lantai <?php echo $teguh_lfh['teguh_lantai_fasilitas'] ?></td>
                <td><?php echo $teguh_lfh['teguh_keterangan'] ?></td>
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
  background-color: #32cd32;
}
</style>