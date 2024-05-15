<?php include 'teguh_header.php';
 ?>

 <?php 

  $teguh_id_tipe = $_GET['teguh_id_tipe'];
  $teguh_edit = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '".$_GET['teguh_id_tipe']."'");
  $teguh_tfk = mysqli_fetch_array($teguh_edit);
  
 ?>

<div class="tm-main-content no-pad-b">
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Tambah Fasilitas Kamar</h1></center>
    <form method="post" action="" autocomplete="off">
        <div class="form-group row">
             <label class="col-sm-2">Nama Fasilitas</i></label>
                 <div class="col-sm-10">
                <textarea name="teguh_fasilitas" type="text" required="required" autocomplete="off" class="form-control form-control-warning"><?php echo $teguh_tfk['teguh_fasilitas'] ?></textarea>
                </div>
        </div>
        </div>
        <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="SIMPAN" onClick="return confirm('Anda yakin akan menambahkan fasilitas kamar ini?');">
                </div>

        </div>
                 <a class="kembali" href="teguh_fasilitas_kamar.php">KEMBALI</a>
    </form>
    <br><br>
 </div>
<?php
if (isset($_POST["submit"])) {

    $teguh_fasilitas = $_POST['teguh_fasilitas'];

    $teguh_edit = mysqli_query($teguh_koneksi, "UPDATE teguh_tipe_kamar SET teguh_fasilitas='$teguh_fasilitas' WHERE teguh_id_tipe='$teguh_id_tipe'");

    if(!$teguh_edit){
    echo "<script>
    alert('Fasilitas Kamar gagal ditambahkan');
    document.location.href = 'teguh_tambah_faskamar.php';
    </script>";
    }else{
      echo "<script>
    alert('Fasilitas Kamar berhasil disimpan');
    document.location.href = 'teguh_fasilitas_kamar.php';
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