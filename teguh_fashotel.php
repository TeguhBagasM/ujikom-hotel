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
    <link rel="stylesheet" href="teguh_asset/teguh_css/datatables.css">
    <link rel="stylesheet" href="teguh_asset/teguh_css/datatables.min.css">
    <link href="teguh_asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="teguh_asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
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
<center><h1 class="tm-blue-text tm-margin-b-p">Fasilitas Hotel</h1></center>
<div class="table-responsive">
      <table id="dataTable" class="table table-bordered" border="3" align="center" width="100%" cellspacing="6">
        <thead>
  <tr>      
      <th class="text-center">No</th>
      <th class="text-center">Foto Fasilitas</th>
            <th class="text-center">Nama fasilitas</th>
            <th class="text-center">Opsi</th>
  </tr>
</thead>
  <?php 
  include 'teguh_koneksi.php';
        $no = 1;
        $teguh_data = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_fasilitas_hotel");

        if (mysqli_num_rows($teguh_data) > 0) {
        while($teguh_fh = mysqli_fetch_array($teguh_data)){
            ?>
        <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><img src="teguh_asset/teguh_image/<?php echo $teguh_fh['teguh_foto_fasilitas'] ?>" width="150px" height="100px"></td>
        <td><?php echo $teguh_fh['teguh_nama_fasilitas']; ?></td>
              <td>
            <a class="lihat" style="text-decoration: none;" href="teguh_lihat_fashotel.php?teguh_id_fasilitas=<?php echo $teguh_fh['teguh_id_fasilitas']; ?>">Detail</a>

            </td>
            </tr>
            <?php 
        }}else{
        ?>
        <tr>
            <td colspan="5" align="center">Fasilitas hotel tidak ada</td>
        </tr>
        <?php } ?>
    </table>
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
                <!-- Bootstrap core JavaScript-->
    <script src="teguh_asset/vendor/jquery/jquery.min.js"></script>
    <script src="teguh_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="teguh_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="teguh_asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="teguh_asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="teguh_asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="teguh_asset/js/demo/datatables-demo.js"></script>         
        <script>    
       
            $(document).ready(function(){
                

                $('.tm-current-year').text(new Date().getFullYear());

            });

        </script>

<style type="text/css">
.filter{
   padding: 3px 20px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: #186e9d;
   cursor: pointer;
   border: none;
}
.filter:hover {
  color: white;
  background-color: #389fd7;
}
.lihat{
   padding: 8px 16px;
   margin: 5px ;
   text-align: center;
   color: white;
   background-color: green;
   cursor: pointer;

}
.lihat:hover {
    color: white;
    background: #32cd32;
}
</style>