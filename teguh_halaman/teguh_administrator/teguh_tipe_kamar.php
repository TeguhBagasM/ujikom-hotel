<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Tipe Kamar</h1></center>

<div class="table-responsive">
<br>
<a class="tambah" href="teguh_tambah_tipekamar.php">TAMBAH</a>
<br><br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto Kamar</th>
      <th class="text-center">Tipe Kamar</th>
			<th class="text-center">Deskripsi</th>
			<th class="text-center">Harga</th>
      <th class="text-center">Jumlah</th>
			<th class="text-center">Opsi</th>
  </tr>
</thead>
<tbody>
  <?php 

        $no = 1;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar");

        if(isset($_GET['teguh_tipe_kamar'])){
        $teguh_tipe = $_GET['teguh_tipe_kamar'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_tipe_kamar where teguh_tipe_kamar='$teguh_tipe'");

      }else{
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar");
      }

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_tk = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><img src="../../teguh_asset/teguh_image/<?php echo $teguh_tk['teguh_foto'] ?>" width="150px" height="100px"></td>
        <td><?php echo $teguh_tk['teguh_tipe_kamar']; ?></td>
        <td><?php echo $teguh_tk['teguh_deskripsi']; ?></td>
        <td>Rp. <?php echo number_format($teguh_tk['teguh_harga'], 0, ',','.'); ?></td>
        <td><?php echo $teguh_tk['teguh_jumlah_bed'] ?></td>
              <td>
            <a class="crud" style="text-decoration: none;" href="teguh_edit_tipekamar.php?teguh_id_tipe=<?php echo $teguh_tk['teguh_id_tipe']; ?>">UBAH</a>
            <a class="hapus" style="text-decoration: none;" onClick="return confirm('Yakin akan menghapus tipe kamar ini?');" href="teguh_hapus_tipekamar.php?teguh_id_tipe=<?php echo $teguh_tk['teguh_id_tipe']; ?>">HAPUS</a>
            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="5" align="center">Data kamar tidak ada</td>
        </tr>
        <?php } ?>
    </table>
<br>
</div>
</div>
<?php 
include 'teguh_footer.php'; ?>

<style type="text/css">
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

.crud{
   padding: 5px 20px;
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
  
</style>