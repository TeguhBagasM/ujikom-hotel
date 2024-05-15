<?php include 'teguh_header.php';
 ?>

 <?php 

  $teguh_id_user = $_GET['teguh_id_user'];
  $teguh_edit = mysqli_query($teguh_koneksi,"SELECT * FROM teguh_user WHERE teguh_id_user = '".$_GET['teguh_id_user']."'");
  $teguh_eu = mysqli_fetch_array($teguh_edit);
  
 ?>

<div class="tm-main-content no-pad-b">
    <div>
<center><h1 class="tm-blue-text tm-margin-b-p">Ubah User</h1></center>
<input type="hidden" name="teguh_id_user" value="<?php echo $teguh_eu['teguh_id_user'] ?>">
    <form method="post" action="" autocomplete="off">

        <div class="form-group row">
            <label class="col-sm-2">Nama Role</label>
                <div class="col-sm-10 ">
                <?php

              $teguh_tu = mysqli_query($teguh_koneksi, "select * from teguh_role");
               ?>
                   <select name="teguh_id_role" required class="form-control">
                         <?php foreach ($teguh_tu as $key => $teguh_role) : ?>
                         <option value="<?php echo $teguh_role["teguh_id_role"]; ?>"><?php echo $teguh_role["teguh_jenis_role"] ?></option>
                        <?php endforeach; ?>
                   </select>           
              </div>
        </div>


        <div class="form-group row">
             <label class="col-sm-2">Nama User</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_nama_user" type="text" value="<?php echo $teguh_eu['teguh_nama_user']; ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Email User</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_email_user" type="text" value="<?php echo $teguh_eu['teguh_email_user'] ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Username</i></label>
                 <div class="col-sm-10">
                    <input name="teguh_username_user" type="text" value="<?php echo $teguh_eu['teguh_username_user'] ?>" required="required" autocomplete="off" class="form-control form-control-warning">
                </div>
        </div>

        <div class="form-group row">
             <label class="col-sm-2">Password Baru</i></label>
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
                    <input class="crud" name="submit" type="submit" value="SIMPAN" onClick="return confirm('Anda yakin akan mengubah User ini?');">
                </div>

        </div>
                 <a class="kembali" href="teguh_user.php">KEMBALI</a>
    </form>
    <br><br>
 </div>
 </div>
<?php
if (isset($_POST["submit"])) {

      $teguh_id_role = $_POST['teguh_id_role'];
      $teguh_nama_user = $_POST['teguh_nama_user'];
      $teguh_email_user = $_POST['teguh_email_user'];
      $teguh_username_user = $_POST['teguh_username_user'];
      $teguh_password_user = md5($_POST['teguh_password_user']);

    $teguh_edit = mysqli_query($teguh_koneksi, "UPDATE teguh_user SET teguh_id_role='$teguh_id_role',
                      teguh_nama_user='$teguh_nama_user',
                      teguh_email_user='$teguh_email_user',
                      teguh_username_user='$teguh_username_user',
                      teguh_password_user='$teguh_password_user'
                    WHERE teguh_id_user='$teguh_id_user'");

    if(!$teguh_edit){
    echo "<script>
    alert('Data User gagal diubah');
    document.location.href = 'teguh_edit_user.php';
    </script>";
    }else{
      echo "<script>
    alert('Data User berhasil diubah');
    document.location.href = 'teguh_user.php';
    </script>";
    }
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