<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Data User</h1></center>
<div class="table-responsive"><br>
<a class="tambah" href="teguh_tambah_user.php">TAMBAH</a>
    <br><br>
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nama User</th>
	  <th class="text-center">Nama Role</th>
      <th class="text-center">Email</th>
	  <th class="text-center">Opsi</th>
  </tr>
</thead>
<tbody>
<?php 

      $no = 1;
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_user INNER JOIN teguh_role ON teguh_role.teguh_id_role = teguh_user.teguh_id_role"); 

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_du = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><?php echo $teguh_du['teguh_nama_user']; ?></td>
        <td><?php echo $teguh_du['teguh_jenis_role']; ?></td>
        <td><?php echo $teguh_du['teguh_email_user'] ?></td>
              <td>
            <a class="crud" style="text-decoration: none;" href="teguh_edit_user.php?teguh_id_user=<?php echo $teguh_du['teguh_id_user']; ?>">UBAH</a>
            <a class="hapus" style="text-decoration: none;" onClick="return confirm('Yakin akan menghapus user ini?');" href="teguh_hapus_user.php?teguh_id_user=<?php echo $teguh_du['teguh_id_user']; ?>">HAPUS</a>
            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="5" align="center">Data user tidak ada</td>
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