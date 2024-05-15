<?php
include "teguh_header.php"; ?>


 <div class="tm-main-content no-pad-b">

<center><h2 class="tm-blue-text tm-margin-b-p">Detail Pesanan Tamu</h2></center>
<a class="kembali" href="teguh_index.php">KEMBALI</a>
<div class="table-responsive">
    <br>
      <table class="table table-bordered" border="3" align="center" width="90%" cellspacing="6">
  <tr>
       <th class="text-center">Kode Reservasi</th>
      <th class="text-center">Email Tamu</th>
      <th class="text-center">Jumlah Tamu</th>
      <th class="text-center">Check-in</th>
      <th class="text-center">Check-out</th>
      <th class="text-center">Pesanan Tambahan</th>
      <th class="text-center">Status</th>
      <th class="text-center" width="40">Jumlah Pesanan</th>
      <th class="text-center">Total</th>
  </tr>
      <?php 
      $teguh_kode_reservasi = $_GET['teguh_kode_reservasi'];
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasii WHERE teguh_kode_reservasi = '".$_GET['teguh_kode_reservasi']."'");
      $no=1;

      if (mysqli_num_rows($teguh_data) > 0) {
      while($teguh_dt = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $teguh_dt['teguh_kode_reservasi']; ?></td>
        <td><?php echo $teguh_dt['teguh_email_tamu']; ?></td>
        <td><?php echo $teguh_dt['teguh_jumlahtamu'] ?></td>
        <td><?php echo $teguh_dt['teguh_chekin'] ?></td>
        <td><?php echo $teguh_dt['teguh_chekout'] ?></td>
        <td><?php echo $teguh_dt['teguh_pesan'] ?></td>
        <td><?php echo $teguh_dt['teguh_status2'] ?></td>
        <td><?php echo $teguh_dt['teguh_jumlahkamar'] ?></td>
        <td>Rp. <?php echo number_format($teguh_dt['teguh_total'], 0, ',','.') ?></td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="10" align="center">Belum ada pesanan kamar</td>
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
   padding: 6px 20px;
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
    background: #32cd32;
}
.hapus{
   padding: 5px 15px;
   margin: 5px ;
   background-color:  #ff5000;
   text-align: center;
   color: white;
}
.hapus:hover {
  color: white;
  background-color: #ff7514;
}
</style>