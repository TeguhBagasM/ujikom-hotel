<?php
session_start();
include "teguh_header.php"; ?>

 <?php
    if (isset($_SESSION['pesan'])) {
      echo '
              ' . $_SESSION['pesan'] . '
            ';

      unset($_SESSION['pesan']);
    }
    ?>
<div class="tm-main-content no-pad-b">
<h2 align="center" class="tm-blue-text tm-margin-b-p">Pemesanan Kamar</h2></center>
 <div class="table-responsive">
<br>
      <table id="dataTable" class="table table-bordered" align="center" width="100%" cellspacing="0">
        <thead>
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto</th>
      <th class="text-center">Tipe Kamar</th>
      <th class="text-center">Harga</th>
      <th class="text-center">Jumlah Tersedia</th>
      <th class="text-center">Opsi</th>
  </tr>
  </thead>
  <?php 

        $no = 1;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar");

        while($teguh_tk = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><img src="../../teguh_asset/teguh_image/<?php echo $teguh_tk['teguh_foto'] ?>" width="150px" height="100px"></td>
        <td><?php echo $teguh_tk['teguh_tipe_kamar']; ?></td>
        <td>Rp. <?php echo number_format($teguh_tk['teguh_harga'], 0, ',','.'); ?></td>
        <?php if ($teguh_tk["teguh_jumlah_bed"] > 0) : ?>
        <td><?php echo $teguh_tk['teguh_jumlah_bed']; ?>
          <?php elseif ($teguh_tk["teguh_jumlah_bed"] <= 0) : ?>
              <td><p>Tidak Tersedia</p></td>
              <?php endif; ?>
        </td>

              <td>
                <?php if ($teguh_tk["teguh_jumlah_bed"] > 0) : ?>
            <a class="crud" style="text-decoration: none;" href="teguh_pesan.php?teguh_id_tipe=<?php echo $teguh_tk['teguh_id_tipe']; ?>">PESAN</a>
             <?php elseif ($teguh_tk["teguh_jumlah_bed"] <= 0) : ?>
              <p>Kamar Habis</p>
              <?php endif; ?>
            </td>
            </tr>
        <?php } ?>
    </table>

</div>

</div><br>
<?php 
include 'teguh_footer.php'; ?>
<style type="text/css">
.input{
  width: 70px;
  padding: 1px 10px;
}

.crud{
   padding: 5px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
   border: none;
}
.crud:hover {
  color: white;
  background-color: #389fd7;
}
</style>