<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Data Kamar</h1></center>
<div class="table-responsive"><br>
<a class="tambah" href="teguh_tambah_kamar.php">TAMBAH</a>
    <br><br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">No Kamar</th>
	  <th class="text-center">Tipe Kamar</th>
      <th class="text-center">Status</th>
	  <th class="text-center">Opsi</th>
  </tr>
</thead>
<tbody>
<?php 

      $no = 1;
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar INNER JOIN teguh_tipe_kamar ON teguh_tipe_kamar.teguh_id_tipe = teguh_kamar.teguh_id_tipe"); 

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_dk = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><?php echo $teguh_dk['teguh_no_kamar']; ?></td>
        <td><?php echo $teguh_dk['teguh_tipe_kamar']; ?></td>
        <td><?php echo $teguh_dk['teguh_status'] ?></td>
              <td>
            <a class="crud" style="text-decoration: none;" href="teguh_edit_kamar.php?teguh_id_kamar=<?php echo $teguh_dk['teguh_id_kamar']; ?>">UBAH</a>
            <a class="lihat" style="text-decoration: none;" href="teguh_lihat_kamar.php?teguh_id_kamar=<?php echo $teguh_dk['teguh_id_kamar']; ?>">LIHAT</a>
            <a class="hapus" style="text-decoration: none;" onClick="return confirm('Yakin akan menghapus kamar ini?');" href="teguh_hapus_kamar.php?teguh_id_kamar=<?php echo $teguh_dk['teguh_id_kamar']; ?>">HAPUS</a>
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

</div>
</div>
<br>
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
   padding: 5px 15px;
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
   padding: 5px 10px;
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