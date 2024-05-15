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
<center><h1 class="tm-blue-text tm-margin-b-p">Tipe Kamar</h1></center>
<a class="kembali" href="teguh_tipe.php">KEMBALI</a><br><br>
       <div class="container">
    <div class="container"> 
      <div class="col-lg-12"> 

  <?php 
  include 'teguh_koneksi.php';
  $teguh_id_tipe = $_GET['teguh_id_tipe'];
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '".$_GET['teguh_id_tipe']."'");

        while($teguh_d = mysqli_fetch_array($teguh_data)){
            ?>
           <div class="card item-rooms mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <img src="teguh_asset/teguh_image/<?php echo $teguh_d['teguh_foto'] ?>" style="width:300px;height:200px;" alt="">
        </div>
    <div class="col-md-5" height="70%">
    <h3><b><?php echo  $teguh_d['teguh_tipe_kamar']; ?></b><span></span></h3>
    <h4><b>
    <?php echo 'Rp. '.number_format($teguh_d['teguh_harga'], 0, ',','.'); ?>
    </b></h4>
     <h5><td>Deskripsi : <?php echo $teguh_d['teguh_deskripsi']; ?></td></h5>
            <h5><td>Fasilitas : <?php echo $teguh_d['teguh_fasilitas']; ?></td></h5>
            <h5><td>Jumlah tersedia : <?php echo $teguh_d['teguh_jumlah_bed']; ?></td></h5>
  <div class="align-self-end mt-5">
  </div>
    </div>
      </div>
    </div>
  </div>
  <?php } ?>
      </div>  
            

    </div>
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