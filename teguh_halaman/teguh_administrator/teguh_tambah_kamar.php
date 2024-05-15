<?php include 'teguh_header.php';
 ?>

<div class="tm-main-content no-pad-b">
   
  <div>
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Tambah Kamar</h1></center>
    <form method="post" action="" autocomplete="off">
        
        <div class="form-group row">
             <label class="col-sm-2">No Kamar</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_no_kamar" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
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
             <label class="col-sm-2">Lantai</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_lantai" type="number" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="TAMBAH" onClick="return confirm('Anda yakin akan menambah Data Kamar?');">
                    </div>
                    </div>
                </div>
           <a class="kembali" href="teguh_kamar.php">KEMBALI</a>      
    </form>

    </div>
 </div>
 <br>
<?php
if (isset($_POST['submit'])) {
  $teguh_no_kamar = $_POST['teguh_no_kamar'];
  $teguh_tipe = $_POST['teguh_id_tipe'];
  $teguh_status = "Tersedia";
  $teguh_lantai = $_POST['teguh_lantai'];
  $teguh_data = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '$teguh_tipe'");
  $teguh_tk = mysqli_fetch_array($teguh_data);
  $teguh_t = $teguh_tk['teguh_jumlah_bed'] + 1;




mysqli_query($teguh_koneksi,"INSERT INTO teguh_kamar VALUES('','$teguh_no_kamar','$teguh_tipe', '$teguh_status','$teguh_lantai')");
mysqli_query($teguh_koneksi, "UPDATE teguh_tipe_kamar SET teguh_jumlah_bed = '$teguh_t' WHERE teguh_id_tipe = '$teguh_tipe'");


      echo "<script>
        alert('Data Kamar berhasil ditambahkan.');
        window.location='teguh_kamar.php';
      </script>";



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
.hapus{
   padding: 5px 15px;
   margin: 5px ;
   background-color:  #ff5000;
   text-align: center;
   color: white;
}
.hapus:hover {
  color: white;
  background-color: #ff7514;
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
