 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>THIEV HOTEL</title>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  
    <link rel="stylesheet" href="teguh_asset/font-awesome-4.7.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="teguh_asset/teguh_css/bootstrap.min.css"> 
    <link rel="stylesheet" href="teguh_asset/teguh_css/teguh_style.css">
    <link rel="stylesheet" href="teguh_asset/teguh_css/teguh_slide.css">      
    <link rel="stylesheet" href="teguh_asset/teguh_css/teguh_index_tamu.css">                             

    
</head>

    <body>
        
        <div class="container">
            <font face="algerian">
            <header class="tm-site-header">
            <br>
            <br>
            <h1><br></h1>
                <h4><br></h4>

                </font>
                 <nav class="navbar navbar-expand-md tm-main-nav-container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tmMainNav" aria-controls="tmMainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse tm-main-nav" id="tmMainNav">
                        <ul class="nav nav-fill tm-main-nav-ul">
                        <li class="nav-item"><a class="nav-link" href="index.php">Tentang</a></li>
                            <li class="nav-item"><a class="nav-link" href="teguh_infokamar.php">Info Kamar</a></li>
                            <li class="nav-item"><a class="nav-link" href="teguh_tipe.php">Tipe Kamar</a></li>
                            <li class="nav-item"><a class="nav-link" href="teguh_fashotel.php">Fasilitas Hotel</a></li>
                            <li class="nav-item"><a class="nav-link" href="teguh_login_tamu.php">Pesan Kamar</a></li>
                        </ul>

                    </div>    
                </nav>
            </header>

<div class="tm-main-content no-pad-b">

<center><h1 class="tm-blue-text tm-margin-b-p">Detail Fasilitas</h1></center>
<a class="kembali" href="teguh_fashotel.php">KEMBALI</a>
<div class="table-responsive">
<br>
      <table class="table table-bordered" border="3" align="center" width="90%" cellspacing="6">
  <tr>
      <th class="text-center">No</th>
      <th class="text-center">Foto Fasilitas</th>
      <th class="text-center">Nama Fasilitas</th>
      <th class="text-center">Lantai Fasilitas</th>
      <th class="text-center">Keterangan</th>
  </tr>
 <?php 
include 'teguh_koneksi.php';
  $no = 1;
  $teguh_id_fasilitas = $_GET['teguh_id_fasilitas'];
  $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_fasilitas_hotel WHERE teguh_id_fasilitas = '".$_GET['teguh_id_fasilitas']."'");
  $teguh_lfh = mysqli_fetch_array($teguh_data);
 ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><img src="teguh_asset/teguh_image/<?php echo $teguh_lfh['teguh_foto_fasilitas'] ?>" width="150px" height="100px"></td>
                <td><?php echo $teguh_lfh['teguh_nama_fasilitas']; ?></td>
                <td>Lantai <?php echo $teguh_lfh['teguh_lantai_fasilitas'] ?></td>
                <td><?php echo $teguh_lfh['teguh_keterangan'] ?></td>
           </tr>
    </table>
    <br>
</div>
</div>
<br>
 <footer> 
                Thiev Hotel Bandung 2022
            </footer>    
        </div>
        
        
        <script src="teguh_asset/teguh_js/jquery-1.11.3.min.js"></script>         
        <script src="teguh_asset/teguh_js/popper.min.js"></script>                
        <script src="teguh_asset/teguh_js/bootstrap.min.js"></script>            
        <script>    
       
            $(document).ready(function(){
                

                $('.tm-current-year').text(new Date().getFullYear());

            });

        </script>
        <style type="text/css">
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
