<?php include 'teguh_header.php';
 ?>

<div class="tm-main-content no-pad-b">
   
  <div>
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Tambah Fasilitas Hotel</h1></center>
    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
        
        <div class="form-group row">
             <label class="col-sm-2">Nama Fasilitas</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_nama_fasilitas" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Keterangan</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_keterangan" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Lantai Fasilitas</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_lantai_fasilitas" type="number" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Foto</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_foto_fasilitas" type="file" required="required" autocomplete="off">
                    </div>
                </div>
        </div>
                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="TAMBAH" onClick="return confirm('Anda yakin akan menambah Fasilitas Hotel?');">
                    </div>
                </div>
                 
    </form>
    <a class="kembali" href="teguh_fasilitas_hotel.php">KEMBALI</a>
    <br>
    <br>
    </div>
 </div>
<?php 

   if(isset($_POST['submit'])){
      $teguh_nama_fasilitas = $_POST['teguh_nama_fasilitas'];
      $teguh_keterangan = $_POST['teguh_keterangan'];
      $teguh_lantai_fasilitas = $_POST['teguh_lantai_fasilitas'];
      $teguh_foto_fasilitas = upload();
  if (!$teguh_foto_fasilitas) {
    return false;
  }

      mysqli_query($teguh_koneksi,"insert into teguh_fasilitas_hotel values('','$teguh_nama_fasilitas','$teguh_keterangan','$teguh_lantai_fasilitas','$teguh_foto_fasilitas')");

     echo "<script>
        alert('Fasilitas Hotel berhasil ditambahkan.');
        window.location='teguh_fasilitas_hotel.php';
      </script>";
    }


function upload(){

  $teguh_namaFile = $_FILES['teguh_foto_fasilitas']['name'];
  $ukuranFile = $_FILES['teguh_foto_fasilitas']['size'];
  $teguh_eror = $_FILES['teguh_foto_fasilitas']['teguh_eror'];
  $tmpName = $_FILES['teguh_foto_fasilitas']['tmp_name'];

//cek apakah tidak ada gambar yang di upload
  if ($teguh_eror === 4) {
    echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
        window.location='teguh_tambah_fashotel.php';
      </script>";

      return false;
  }
//cek apakah yang di upload adalah gambar
  $ekstensiImageValid = ['jpg','jpeg','png'];
  $ekstensiImage = explode('.', $teguh_namaFile);
  $ekstensiImage = strtolower(end($ekstensiImage));
  if (!in_array($ekstensiImage, $ekstensiImageValid)) {
    echo "<script>
        alert('Yang Anda Upload Bukan Gambar!');
        window.location='teguh_tambahfashotel.php';
      </script>";

      return false;
  }
//cek jika ukurannya terlalu besar 
  if ($ukuranFile > 1000000) {
    echo "<script>
        alert('Ukuran Gambar Terlalu Besar!');
        window.location='teguh_tambahfashotel.php';
      </script>";

      return false;
  }
//lolos pengecekan gambar siap di upload
//generate nama gambar baru
  $teguh_namaFileBaru = uniqid();
  $teguh_namaFileBaru .= '.';
  $teguh_namaFileBaru .= $ekstensiImage;

  move_uploaded_file($tmpName, '../../teguh_asset/teguh_image/'. $teguh_namaFileBaru);

  return $teguh_namaFileBaru;
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
