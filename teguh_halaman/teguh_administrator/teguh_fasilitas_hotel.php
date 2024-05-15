<?php
include "teguh_header.php"; ?>


 <div class="tm-main-content no-pad-b">
<center><h1 class="tm-blue-text tm-margin-b-p">Fasilitas Hotel</h1></center>

<div class="table-responsive"><br>
<a class="tambah" href="teguh_tambah_fashotel.php">TAMBAH</a>
<br><br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>      
      <th class="text-center">No</th>
      <th class="text-center">Foto Fasilitas</th>
			<th class="text-center">Nama fasilitas</th>
			<th class="text-center">Opsi</th>
  </tr>
</thead>
<tbody>
  <?php 
        $no = 1;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_fasilitas_hotel");

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_fh = mysqli_fetch_array($teguh_data)){
            ?>
        <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><img src="../../teguh_asset/teguh_image/<?php echo $teguh_fh['teguh_foto_fasilitas'] ?>" width="150px" height="100px"></td>
        <td><?php echo $teguh_fh['teguh_nama_fasilitas']; ?></td>
              <td>
            <a class="crud" style="text-decoration: none;" href="teguh_edit_fashotel.php?teguh_id_fasilitas=<?php echo $teguh_fh['teguh_id_fasilitas']; ?>">UBAH</a>
            <a class="lihat" style="text-decoration: none;" href="teguh_lihat_fashotel.php?teguh_id_fasilitas=<?php echo $teguh_fh['teguh_id_fasilitas']; ?>">LIHAT</a>
            <a class="hapus" style="text-decoration: none;" onClick="return confirm('Yakin akan menghapus Fasilitas hotel ini?');" href="teguh_hapus_fashotel.php?teguh_id_fasilitas=<?php echo $teguh_fh['teguh_id_fasilitas']; ?>">HAPUS</a>

            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="5" align="center">Fasilitas hotel tidak ada</td>
        </tr>
        <?php } ?>
    </table>
</div>
</div><br>
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
.crud{
   padding: 5px 8px;
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
.lihat{
   padding: 5px 8px;
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
.hapus{
   padding: 5px 8px;
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