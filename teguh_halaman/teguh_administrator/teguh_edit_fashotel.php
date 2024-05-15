<?php include 'teguh_header.php';
 ?>

 <?php 

  $teguh_id_fasilitas = $_GET['teguh_id_fasilitas'];
  $teguh_edit = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_fasilitas_hotel WHERE teguh_id_fasilitas = '".$_GET['teguh_id_fasilitas']."'");
  $teguh_efh = mysqli_fetch_array($teguh_edit);
  
 ?>

<div class="tm-main-content no-pad-b">
   
  <div>
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Ubah Fasilitas Hotel</h1></center>

    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="teguh_foto_fasilitas_lama" value="<?php echo $teguh_efh['teguh_foto_fasilitas'] ?>">
        <div class="form-group row">
             <label class="col-sm-2">Nama Fasilitas</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_nama_fasilitas" value="<?php echo $teguh_efh['teguh_nama_fasilitas'] ?>" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Keterangan</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_keterangan" type="text" value="<?php echo $teguh_efh['teguh_keterangan'] ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Lantai fasilitas</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_lantai_fasilitas" type="number" value="<?php echo $teguh_efh['teguh_lantai_fasilitas'] ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        </div>

        <div class="form-group row">
             <label class="col-sm-2">Foto</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_foto_fasilitas" type="file" value="<?php echo $teguh_efh['teguh_foto_fasilitas'] ?>" required="required" autocomplete="off">
                    </div>
                </div>
        </div>
                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="SIMPAN" onClick="return confirm('Anda yakin akan mengubah fasilitas ini?');">
                    </div>
                </div>
                 <a class="kembali" href="teguh_fasilitas_hotel.php">KEMBALI</a>
    </form>
    <br>
    <br>
 </div>
<?php 

   if(isset($_POST['submit'])){
      $teguh_nama_fasilitas = $_POST['teguh_nama_fasilitas'];
      $teguh_keterangan = $_POST['teguh_keterangan'];
      $teguh_lantai_fasilitas = $_POST['teguh_lantai_fasilitas'];
      $teguh_foto_fasilitas_lama = $_POST['teguh_foto_fasilitas_lama'];

  //cek apakah user pilih gambar baru atau tidak
  if ($_FILES['teguh_foto_fasilitas']['teguh_eror'] === 4 ) {
    $teguh_foto_fasilitas = $teguh_foto_fasilitas_lama;
  }else{
    $teguh_foto_fasilitas = upload();

  }


  $teguh_sql = mysqli_query($teguh_koneksi,"UPDATE teguh_fasilitas_hotel SET teguh_nama_fasilitas='$teguh_nama_fasilitas', teguh_keterangan='$teguh_keterangan', teguh_lantai_fasilitas='$teguh_lantai_fasilitas', teguh_foto_fasilitas='$teguh_foto_fasilitas' WHERE teguh_id_fasilitas ='$teguh_id_fasilitas'");
  if (!$teguh_sql) {
    echo "<script>alert('Fasilitas Hotel Gagal Diubah');
    document.location.href = 'teguh_edit_fashotel.php';
    </script>";
  }else{
  echo "<script>alert('Fasilitas Hotel Berhasil Diubah');
    document.location.href = 'teguh_fasilitas_hotel.php';
    </script>";
  }
} 

function upload(){

  $namaFile = $_FILES['teguh_foto_fasilitas']['name'];
  $ukuranFile = $_FILES['teguh_foto_fasilitas']['size'];
  $teguh_eror = $_FILES['teguh_foto_fasilitas']['teguh_eror'];
  $tmpName = $_FILES['teguh_foto_fasilitas']['tmp_name'];

//cek apakah tidak ada gambar yang di upload
  if ($teguh_eror === 4) {
    echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
        window.location='teguh_edit_fashotel.php';
      </script>";

      return false;
  }
//cek apakah yang di upload adalah gambar
  $ekstensiImageValid = ['jpg','jpeg','png'];
  $ekstensiImage = explode('.', $namaFile);
  $ekstensiImage = strtolower(end($ekstensiImage));
  if (!in_array($ekstensiImage, $ekstensiImageValid)) {
    echo "<script>
        alert('Yang Anda Upload Bukan Gambar!');
        window.location='teguh_edit_fashotel.php';
      </script>";

      return false;
  }
//cek jika ukurannya terlalu besar 
  if ($ukuranFile > 2000000) {
    echo "<script>
        alert('Ukuran Gambar Terlalu Besar!');
        window.location='teguh_edit_fashotel.php';
      </script>";

      return false;
  }
//lolos pengecekan gambar siap di upload
//generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiImage;

  move_uploaded_file($tmpName, '../../teguh_asset/teguh_image/'. $namaFileBaru);

  return $namaFileBaru;
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
