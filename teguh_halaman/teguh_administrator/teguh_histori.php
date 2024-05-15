<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h2 class="tm-blue-text tm-margin-b-p">Laporan Pesanan Tamu</h2></center>
<div class="table-responsive">
  <form method="get" autocomplete="off">
      <label>Tanggal Checkin</label>
      <input type="date" name="teguh_check_in">
      <input type="submit" value="Cari" class="filter">
    </form>
    <form method="get" autocomplete="off" style="float: right; margin-top: -37px;">
      <label>Nama Tamu</label>
      <input type="text" name="teguh_nama_tamu">
      <input type="submit" value="Cari" class="filter">
    </form>
    <br>
      <table class="table table-bordered" border="3" align="center" width="90%" cellspacing="6">
  <tr>
      <th class="text-center">Nama Tamu</th>
      <th class="text-center">Check-in</th>
      <th class="text-center">Check-out</th>
      <th class="text-center">Status</th>
  </tr>
      <?php 
      $sub_total = 0;
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_reservasi");
      $no=1;
 
      if(isset($_GET['teguh_check_in'])){
        $teguh_checkin = $_GET['teguh_check_in'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasi where teguh_check_in='$teguh_checkin'");
      }elseif(isset($_GET['teguh_nama_tamu'])){
        $teguh_tamu = $_GET['teguh_nama_tamu'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasi where teguh_nama_tamu='$teguh_tamu'");
      }else{
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_reservasi");
      }
      if (mysqli_num_rows($teguh_data) > 0) {
      while($teguh_lt = mysqli_fetch_array($teguh_data)){
      ?>
            <tr align="center">
        <td><?php echo $teguh_lt['teguh_nama_tamu']; ?></td>
        <td><?php echo $teguh_lt['teguh_check_in']; ?></td>
        <td><?php echo $teguh_lt['teguh_check_out'] ?></td>
        <td><?php echo $teguh_lt['teguh_status'] ?></td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="6" align="center">Belum ada pesanan kamar</td>
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