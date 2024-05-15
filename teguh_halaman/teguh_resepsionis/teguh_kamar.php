<?php
include "teguh_header.php"; ?>

 <div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Data Kamar</h1></center>
<div class="table-responsive">

      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">No Kamar</th>
	  <th class="text-center">Tipe Kamar</th>
      <th class="text-center">Status</th>
  </tr>
  </thead>
  <?php 

        $no = 1;
      $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar INNER JOIN teguh_tipe_kamar ON teguh_tipe_kamar.teguh_id_tipe = teguh_kamar.teguh_id_tipe"); 

      if(isset($_GET['teguh_no_kamar'])){
        $teguh_kamar = $_GET['teguh_no_kamar'];
        $teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_kamar INNER JOIN teguh_tipe_kamar ON teguh_tipe_kamar.teguh_id_tipe = teguh_kamar.teguh_id_tipe where teguh_no_kamar='$teguh_kamar'");

      }else{
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar INNER JOIN teguh_tipe_kamar ON teguh_tipe_kamar.teguh_id_tipe = teguh_kamar.teguh_id_tipe"); 
      }

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_dk = mysqli_fetch_array($teguh_data)){
            ?>
            <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><?php echo $teguh_dk['teguh_no_kamar']; ?></td>
        <td><?php echo $teguh_dk['teguh_tipe_kamar']; ?></td>
        <td><?php echo $teguh_dk['teguh_status'] ?></td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="5" align="center">Data kamar belum ada</td>
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

</style>