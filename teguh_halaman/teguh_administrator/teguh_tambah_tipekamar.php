  <?php include 'teguh_header.php';
  ?>

  <div class="tm-main-content no-pad-b">
    
    <div>
      <div>
  <center><h1 class="tm-blue-text tm-margin-b-p">Tambah Tipe Kamar</h1></center>
      <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
          
          <div class="form-group row">
              <label class="col-sm-2">Tipe Kamar</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_tipe_kamar" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                  </div>
          </div>

              <div class="form-group row">
              <label class="col-sm-2">Deskripsi</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_deskripsi" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                  </div>
          </div>

          <div class="form-group row">
              <label class="col-sm-2">Fasilitas</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_fasilitas" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                  </div>
          </div>

          <div class="form-group row">
              <label class="col-sm-2">Harga</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_harga" type="number" required="required" autocomplete="off" class="form-control form-control-warning">
                  </div>
          </div>

          </div>
              <div class="form-group row">
              <label class="col-sm-2">Jumlah</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_jumlah_bed" type="number" required="required" autocomplete="off" class="form-control form-control-warning">
                  </div>
          </div>

          <div class="form-group row">
              <label class="col-sm-2">Foto</i></label>
                  <div class="col-sm-10">
                      <input name="teguh_foto" type="file" required="required" autocomplete="off">
                      </div>
                  </div>
          </div>
                  <div class="form-group row">
              <label class="col-sm-2"></i></label>
                  <div class="col-sm-10">
                      <input class="crud" name="submit" type="submit" value="TAMBAH" onClick="return confirm('Anda yakin akan menambah Tipe Kamar?');">
                      </div>
                  </div>
                  <a class="kembali" href="teguh_tipe_kamar.php">KEMBALI</a>
                  
      </form>
      <br>
      <br>
  </div>
  <?php 

    if(isset($_POST['submit'])){
        $teguh_tipe_kamar = $_POST['teguh_tipe_kamar'];
        $teguh_deskripsi = $_POST['teguh_deskripsi'];
        $teguh_fasilitas = $_POST['teguh_fasilitas'];
        $teguh_harga = $_POST['teguh_harga'];
        $teguh_jumlah_bed = $_POST['teguh_jumlah_bed'];
        $teguh_foto = upload();
    if (!$teguh_foto) {
      return false;
    }

        mysqli_query($teguh_koneksi,"insert into teguh_tipe_kamar values('','$teguh_tipe_kamar','$teguh_deskripsi','$teguh_fasilitas','$teguh_harga','$teguh_jumlah_bed','$teguh_foto')");

      echo "<script>
          alert('Tipe Kamar berhasil ditambahkan.');
          window.location='teguh_tipe_kamar.php';
        </script>";
      }


  function upload(){

    $teguh_namaFile = $_FILES['teguh_foto']['name'];
    $ukuranFile = $_FILES['teguh_foto']['size'];
    $teguh_eror = $_FILES['teguh_foto']['teguh_eror'];
    $tmpName = $_FILES['teguh_foto']['tmp_name'];

  //cek apakah tidak ada gambar yang di upload
    if ($teguh_eror === 4) {
      echo "<script>
          alert('Pilih Gambar Terlebih Dahulu!');
          window.location='teguh_tambah_tipekamar.php';
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
          window.location='teguh_tambah_tipekamar.php';
        </script>";

        return false;
    }
  //cek jika ukurannya terlalu besar 
    if ($ukuranFile > 1000000) {
      echo "<script>
          alert('Ukuran Gambar Terlalu Besar!');
          window.location='teguh_tambah_tipekamar.php';
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
