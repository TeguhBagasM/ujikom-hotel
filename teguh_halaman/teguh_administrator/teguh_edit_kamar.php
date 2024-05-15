<?php include 'teguh_header.php';
 ?>

 <?php 

  $teguh_id_kamar = $_GET['teguh_id_kamar'];
  $teguh_edit = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_kamar WHERE teguh_id_kamar = '".$_GET['teguh_id_kamar']."'");
  $teguh_ek = mysqli_fetch_array($teguh_edit);
  
 ?>

<div class="tm-main-content no-pad-b">
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Ubah Kamar</h1></center>
<input type="hidden" name="teguh_id_kamar" value="<?php echo $teguh_ek['teguh_id_kamar'] ?>">
    <form method="post" action="" autocomplete="off">
        <div class="form-group row">
             <label class="col-sm-2">No Kamar</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_no_kamar" value="<?php echo $teguh_ek['teguh_no_kamar'] ?>" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2">Tipe Kamar</label>
                <div class="col-sm-10 ">
                <?php

              $teguh_tk = mysqli_query($teguh_koneksi, "select * from teguh_tipe_kamar");
               ?>
                   <select name="teguh_id_tipe" required class="form-control">
                        <option disabled selected>Pilih Tipe</option>
                         <?php foreach ($teguh_tk as $key => $teguh_tipe) : ?>
                         <option value="<?php echo $teguh_tipe["teguh_id_tipe"]; ?>"><?php echo $teguh_tipe["teguh_tipe_kamar"] ?></option>
                        <?php endforeach; ?>
                   </select>           
                </div>
        </div>

<div class="form-group row">
            <label class="col-sm-2">Status</label>
                <div class="col-sm-10 ">
                   <select name="teguh_status" required class="form-control">
                         <option value="Tersedia">Tersedia</option>
                         <option value="Terisi">Terisi</option>
                   </select>           
                </div>
        </div>



        <div class="form-group row">
             <label class="col-sm-2">Lantai</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_lantai" type="number" value="<?php echo $teguh_ek['teguh_lantai'] ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        </div>
        <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="SIMPAN" onClick="return confirm('Anda yakin akan mengubah kamar ini?');">
                </div>

        </div>
                 <a class="kembali" href="teguh_kamar.php">KEMBALI</a>
    </form>
    <br><br>
 </div>
<?php
if (isset($_POST["submit"])) {

    $teguh_no_kamar = $_POST['teguh_no_kamar'];
    $teguh_id_tipe = $_POST['teguh_id_tipe'];
    $teguh_status = $_POST['teguh_status'];
    $teguh_lantai = $_POST['teguh_lantai'];

    $teguh_edit = mysqli_query($teguh_koneksi, "UPDATE teguh_kamar SET teguh_no_kamar='$teguh_no_kamar',
                      teguh_id_tipe='$teguh_id_tipe',
                      teguh_status='$teguh_status',
                      teguh_lantai='$teguh_lantai'
                    WHERE teguh_id_kamar='$teguh_id_kamar'");

    if(!$teguh_edit){
    echo "<script>
    alert('Data Kamar gagal diubah');
    document.location.href = 'teguh_edit_kamar.php';
    </script>";
    }else{
      echo "<script>
    alert('Data Kamar berhasil diubah');
    document.location.href = 'teguh_kamar.php';
    </script>";
    }
  }
?>

 <?php include 'teguh_footer.php';
  ?>
  <style type="text/css">
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