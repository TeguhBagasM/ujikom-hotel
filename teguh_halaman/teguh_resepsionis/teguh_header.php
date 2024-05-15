<?php 
error_reporting(0);
include '../../teguh_koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
  echo "<script>
    alert('Anda harus login untuk mengakses halaman.');
    document.location.href = '../../teguh_login.php';
    </script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RESEPSIONIS THIEV HOTEL</title>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  
    <link rel="stylesheet" href="../../teguh_asset/font-awesome-4.7.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="../../teguh_asset/teguh_css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../../teguh_asset/teguh_css/teguh_style.css">                                                                          
    <link rel="stylesheet" href="../../teguh_asset/teguh_css/teguh_index_admin.css">
    <link rel="stylesheet" href="../../teguh_asset/teguh_css/datatables.css">
    <link rel="stylesheet" href="../../teguh_asset/teguh_css/datatables.min.css">
    <link href="../../teguh_asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../../teguh_asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">                             

    
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
                            <li class="nav-item"><a class="nav-link" href="teguh_index.php">Laporan Pesanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="teguh_kamar.php">Data Kamar</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../teguh_logout.php" onClick="return confirm('Apakah anda yakin akan logout?');">Logout</a></li>
                        </ul>

                    </div>    
                </nav>
                
            </header>