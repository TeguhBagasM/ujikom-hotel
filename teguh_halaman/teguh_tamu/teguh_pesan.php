<?php include 'teguh_header.php';
 ?>

<?php
session_start();
error_reporting(0);

    $teguh_id_tipe= $_GET['teguh_id_tipe']; 
    $teguh_query = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_tamu WHERE teguh_username = '".$_SESSION['teguh_username']."'");
    $teguh_d = mysqli_fetch_object($teguh_query);
    $teguh_data = mysqli_query ($teguh_koneksi, "SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '".$_GET['teguh_id_tipe']."'"); 
    $teguh_p = mysqli_fetch_object($teguh_data);
    $teguh_o = mysqli_fetch_assoc($teguh_data);
    $teguh_nol = 0;
  $teguh_query = mysqli_query($teguh_koneksi, "SELECT max(teguh_kode_reservasi) as kodeTerbesar FROM teguh_reservasii");
    $teguh_data = mysqli_fetch_array($teguh_query);
    $teguh_koderes = $teguh_data['kodeTerbesar'];
 
    $teguh_urutan = (int) substr($teguh_koderes, 3, 3);
 
    $teguh_urutan++;
 
    $teguh_huruf = "RSV";
    $teguh_reservasi = $teguh_huruf . sprintf("%03s", $teguh_urutan);


    
 ?>

<div class="tm-main-content no-pad-b">
   
  <div>
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Checkin Kamar</h1></center>
    <form method="post" action="" autocomplete="off">
    <input type="hidden" name="teguh_id_tipe" value="<?php echo $teguh_id_tipe; ?>">
    <div class="form-group row">
        <h4 class="col-sm-10">Jumlah Tersedia : <?php echo $teguh_p->teguh_jumlah_bed; ?></h4>
    </div> 
        <div class="form-group row">
             <label class="col-sm-2">Kode Reservasi</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_kode_reservasi" value="<?php echo $teguh_reservasi ?>" type="text" readonly autocomplete="off" class="form-control form-control-warning">
              </div>
        </div>
        <input type="hidden" name="teguh_id_tipe" value="<?php echo $teguh_id_tipe; ?>">
        <input type="hidden" name="teguh_total">

        <div class="form-group row">
             <label class="col-sm-2">Nama Tamu</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_nama_tamu" value="<?php echo $teguh_d->teguh_nama_tamu ?>" type="text" readonly autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Email Tamu</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_email_tamu" value="<?php echo $teguh_d->teguh_email_tamu ?>" type="text" readonly autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Nomor Hp</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_telpon_tamu" type="text" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        
        <div class="form-group row">
             <label class="col-sm-2">Checkin</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_check_in" type="date" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        <div class="form-group row">
             <label class="col-sm-2">Checkout</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_check_out" type="date" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        <input type="hidden" name="teguh_sedia" value="<?php echo $teguh_p->teguh_jumlah_bed; ?>"> 
        <input type="hidden" value="<?php echo $teguh_p->teguh_harga ?>" name="teguh_harga">
            <div class="form-group row">
             <label class="col-sm-2">Jumlah Kamar</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_jumlah_kamar" type="number" value="1"  min="1" max="<?php echo $teguh_p->teguh_jumlah_bed; ?>" required autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Jumlah Tamu</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_jumlah_tamu" type="number" value="1" min="1" required autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        <div class="form-group row">
             <label style="color: red; margin-left: 12px;">*Ketik Tidak ada jika tidak perlu.</i></label>
        </div>
        <div class="form-group row">
             <label class="col-sm-2">Pesan Tambahan</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_pesan" type="text" required autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>
        <input name="teguh_status" type="hidden" value="Belum Checkin" autocomplete="off" class="form-control form-control-warning">
                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="Konfirmasi Pesanan" onClick="return confirm('Yakin akan konfirmasi pesanan anda?');">
                    </div>
                    </div>
                </div>
           <a class="kembali" href="teguh_index.php">KEMBALI</a>      
    </form>

    </div>
 </div>
 <br>
<?php 

   if(isset($_POST['submit'])){

$teguh_harga = $_POST['teguh_harga'];
$teguh_chekin = $_POST['teguh_check_in'];
$teguh_chekout = $_POST['teguh_check_out'];
$teguh_jumlah_kamar = $_POST['teguh_jumlah_kamar'];
$teguh_sedia = $_POST['teguh_sedia'];

$teguh_awal = date_create("$teguh_chekin");
$teguh_akhir = date_create("$teguh_chekout");
$teguh_diff = date_diff($teguh_awal, $teguh_akhir);

$teguh_jumlah_hari = $teguh_diff->format("%d");
$teguh_harga = $teguh_jumlah_hari * $teguh_harga * $teguh_jumlah_kamar;
$teguh_sediak = $teguh_sedia - $teguh_jumlah_kamar;

    $teguh_kode_reservasi = $_POST['teguh_kode_reservasi'];
    $teguh_nama_tamu = $_POST['teguh_nama_tamu'];
    $teguh_email_tamu = $_POST['teguh_email_tamu'];
    $teguh_telpon_tamu = $_POST['teguh_telpon_tamu'];
    $teguh_check_in = $_POST['teguh_check_in'];
    $teguh_check_out = $_POST['teguh_check_out'];
    $teguh_jumlah_kamar = $_POST['teguh_jumlah_kamar'];
    $teguh_jumlah_tamu = $_POST['teguh_jumlah_tamu'];
    $teguh_pesan = $_POST['teguh_pesan'];
    $teguh_total = $_POST['teguh_total'];
    $teguh_id_tipe = $_POST['teguh_id_tipe'];
    $teguh_status = "Belum Checkin";

    

     mysqli_query($teguh_koneksi, "INSERT INTO teguh_reservasii values (
        '',
        '$teguh_kode_reservasi',
        '$teguh_nama_tamu',
        '$teguh_email_tamu', 
        '$teguh_telpon_tamu',
        '$teguh_check_in',
        '$teguh_check_out',
        '',
        '$teguh_jumlah_kamar',
        '$teguh_jumlah_tamu',
        '$teguh_pesan',
        '$teguh_id_tipe',
        '$teguh_status',
        '$teguh_harga') ");
     mysqli_query($teguh_koneksi, "UPDATE teguh_tipe_kamar SET teguh_jumlah_bed = '".$teguh_sediak."'
                                                                    WHERE teguh_id_tipe = '".$teguh_p->teguh_id_tipe."' ");


      echo "<script>
    alert('Pemesanan Berhasil.');
    document.location.href = 'teguh_histori.php';
    </script>";
    
  }
   ?>
 <?php include 'teguh_footer.php';
  ?>
  <style type="text/css">
.crud{
   padding: 6px 20px;
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
   padding: 10px 20px;
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
