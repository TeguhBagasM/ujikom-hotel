<?php include 'teguh_header.php';
 ?>

<div class="tm-main-content no-pad-b">
   
  <div>
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Tambah User</h1></center>
    <form method="post" action="" autocomplete="off">
        
        <div class="form-group row">
            <label class="col-sm-2">Nama Role</label>
                <div class="col-sm-10 ">
                <?php

              $teguh_tu = mysqli_query($teguh_koneksi, "select * from teguh_role");
               ?>
                   <select name="teguh_id_role" required class="form-control">
                        <option disabled selected>Pilih role</option>
                         <?php foreach ($teguh_tu as $key => $teguh_role) : ?>
                         <option value="<?php echo $teguh_role["teguh_id_role"]; ?>"><?php echo $teguh_role["teguh_jenis_role"] ?></option>
                        <?php endforeach; ?>
                   </select>           
              </div>
        </div>


        <div class="form-group row">
             <label class="col-sm-2">Nama User</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_nama_user" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Email User</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_email_user" type="text" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Username</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_username_user" type="email" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Password</i></label>
                 <div class="col-sm-10">
                    <input id="TeguhInput" name="teguh_password_user" type="password" required="required" autocomplete="off" class="form-control form-control-warning">
                    <input type="checkbox" onclick="myFunction()">Lihat
                </div>
        </div>
        <script>
function myFunction() {
  var x = document.getElementById("TeguhInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
        </script> 
                <div class="form-group row">
             <label class="col-sm-2"></i></label>
                 <div class="col-sm-10">
                    <input class="crud" name="submit" type="submit" value="TAMBAH" onClick="return confirm('Anda yakin akan menambah Data user?');">
                    </div>
                    </div>
                </div>
           <a class="kembali" href="teguh_user.php">KEMBALI</a>      
    </form>

    </div>
 </div>
 <br>
<?php 

   if(isset($_POST['submit'])){
      $teguh_id_role = $_POST['teguh_id_role'];
      $teguh_nama_user = $_POST['teguh_nama_user'];
      $teguh_email_user = $_POST['teguh_email_user'];
      $teguh_username_user = $_POST['teguh_username_user'];
      $teguh_password_user = $_POST['teguh_password_user'];
      $teguh_password_user = md5($teguh_password_user);

      mysqli_query($teguh_koneksi,"insert into teguh_user values('','$teguh_id_role','$teguh_nama_user','$teguh_email_user','$teguh_username_user','$teguh_password_user')");

      echo "<script>
    alert('Data user berhasil ditambahkan.');
    document.location.href = 'teguh_user.php';
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
