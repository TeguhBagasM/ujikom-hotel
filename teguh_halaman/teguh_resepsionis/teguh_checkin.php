<?php include 'teguh_header.php';
 ?>

 <?php 
  $teguh_data = mysqli_query ($teguh_koneksi, "SELECT * FROM teguh_reservasii WHERE teguh_id_reservasi = '".$_GET['teguh_id_reservasi']."'"); 
  $teguh_p = mysqli_fetch_object($teguh_data);
  $teguh_kamar=mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar where teguh_id_tipe='$teguh_p->teguB_id_tipe' and teguh_status='Tersedia'");
  $teguh_kamarA = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar  WHERE teguh_no_kamar LIKE '%A%' && teguh_id_tipe = '$teguh_p->teguh_id_tipe' and teguh_status = 'Tersedia' ");
  $teguh_kamarB = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar WHERE teguh_no_kamar LIKE '%B%' && teguh_id_tipe = '$teguh_p->teguh_id_tipe' and teguh_status = 'Tersedia' ");
  $teguh_kamarC = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar WHERE teguh_no_kamar LIKE '%C%' && teguh_id_tipe = '$teguh_p->teguh_id_tipe' and teguh_status = 'Tersedia' ");
 ?>


<div class="tm-main-content no-pad-b">
    <div>

    <form method="post" action="" autocomplete="off">
        <div class="form-group row">
             <label class="col-sm-2">Kode Reservasi</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_kode_reservasi" value="<?php echo $teguh_p->teguh_kode_reservasi ?>" type="text" readonly autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        <div class="form-group row">
             <label class="col-sm-2">Jumlah Pesanan</i></label>
                 <div class="col-sm-10">
                    <input value="<?php echo $teguh_p->teguh_jumlahkamar ?>" type="text" readonly autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Pilih Kamar</i></label>
                 <div class="col-sm-10">
                  <?php while ($teguh_A = mysqli_fetch_assoc($teguh_kamarA)) {?>
                    <label><?php echo $teguh_A['teguh_no_kamar'] ?></label>
                <td><input type="checkbox" class="jarak" name="teguh_no_kamar[]" <?= $teguh_A['teguh_status'] ?> value="<?=$teguh_A['teguh_no_kamar']?>"></td> 
                <?php } ?>
            </div>
                <div class="col-sm-10">
                   <?php while ($teguh_B = mysqli_fetch_assoc($teguh_kamarB)) {?>
                    <label><?php echo $teguh_B['teguh_no_kamar'] ?></label>
                <td><input type="checkbox" class="jarak" name="teguh_no_kamar[]" <?= $teguh_B['teguh_status'] ?> value="<?=$teguh_B['teguh_no_kamar']?>"></td> 
                 <?php } ?>

              </div>
             <div class="col-sm-10">
                   <?php while ($teguh_C = mysqli_fetch_assoc($teguh_kamarC)) {?>
                    <label><?php echo $teguh_C['teguh_no_kamar'] ?></label>
                <td><input type="checkbox" class="jarak" name="teguh_no_kamar[]" <?= $teguh_C['teguh_status'] ?> value="<?=$teguh_C['teguh_no_kamar']?>"></td> 
                 <?php } ?>

              </div>
              </div>
              <input type="hidden" name="teguh_id" value="<?php echo $teguh_p->teguh_id_tipe ?>">

                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="CHECKIN" onClick="return confirm('Apakah anda yakin?');">
                </div>
              </div>
        </div>
                 <a class="kembali" href="teguh_index.php">KEMBALI</a>
    </form>
    <br><br>
 </div>
<?php 

   if(isset($_POST['submit'])){
      
$teguh_kode_reservasi = $_POST['teguh_kode_reservasi']; 
$kode_kamar = $_POST['teguh_no_kamar'];
$teguh_tipe = $_POST['teguh_id'];
$teguh_cekin = '';
foreach($kode_kamar as $chk1)  
   {  
      $teguh_cekin .= $chk1." ";  
   } 

mysqli_query($teguh_koneksi,"UPDATE teguh_reservasii SET teguh_no_kamar = '$teguh_cekin' WHERE teguh_id_reservasi = '".$_GET['teguh_id_reservasi']."' ");
foreach ($kode_kamar as $a ) {
                mysqli_query($teguh_koneksi,"UPDATE teguh_kamar SET teguh_status = 'Terisi'
                 WHERE `teguh_kamar`.`teguh_no_kamar` = '$a' && `teguh_id_tipe` = '$teguh_tipe' ");


  }
mysqli_query($teguh_koneksi,"INSERT INTO teguh_reserved_room VALUES ('','$teguh_kode_reservasi','$teguh_cekin')");
mysqli_query($teguh_koneksi, "UPDATE teguh_reservasii SET teguh_status2 = 'Belum Checkout' WHERE teguh_id_reservasi = '".$_GET['teguh_id_reservasi']."'"); 

      echo "<script>
    alert('Check-in Tamu berhasil.');
    document.location.href = 'teguh_index.php';
    </script>";
    }
   ?>

 <?php include 'teguh_footer.php';
  ?>
  <style type="text/css">
  .jarak{
    margin-left: 10px;
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