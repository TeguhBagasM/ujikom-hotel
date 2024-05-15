<?php
include "teguh_header.php"; ?>


 <div class="tm-main-content no-pad-b">
<center><h1 class="tm-blue-text tm-margin-b-p">Fasilitas Kamar</h1></center>
<div class="table-responsive">
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>      
      <th class="text-center">No</th>
			<th class="text-center">Tipe Kamar</th>
      <th class="text-center">Fasilitas</th>
			<th class="text-center">Opsi</th>
  </tr>
</thead>
<tbody>
  <?php 

        $no = 1;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar");

        if(isset($_GET['teguh_fasilitas'])){
        $teguh_faskamar = $_GET['teguh_fasilitas'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_tipe_kamar where teguh_fasilitas='$teguh_faskamar'");

      }else{
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar");
      }

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_fk = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><?php echo $teguh_fk['teguh_tipe_kamar']; ?></td>
        <td><?php echo $teguh_fk['teguh_fasilitas'] ?></td>
              <td>
            <a class="crud" style="text-decoration: none;" href="teguh_tambah_faskamar.php?teguh_id_tipe=<?php echo $teguh_fk['teguh_id_tipe']; ?>">TAMBAH</a>
            <a class="lihat" style="text-decoration: none;" href="teguh_lihat_faskamar.php?teguh_tipe_kamar=<?php echo $teguh_fk['teguh_tipe_kamar']; ?>">LIHAT</a>
            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="4" align="center">Data kamar tidak ada</td>
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
    background: #32cd32;
}
</style>