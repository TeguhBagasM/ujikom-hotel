<?php 

	session_start();

	include 'teguh_koneksi.php';

	$teguh_username_user = $_POST['teguh_username_user'];
	$teguh_password_user = $_POST['teguh_password_user'];
	$teguh_password_user= md5($teguh_password_user);
	$teguh_data = mysqli_query($teguh_koneksi,"select * from teguh_user where teguh_username_user='$teguh_username_user' and teguh_password_user='$teguh_password_user'");

	$teguh_cek = mysqli_num_rows($teguh_data);

	if($teguh_cek > 0){
		$login = mysqli_fetch_assoc($teguh_data);

		if ($login['teguh_id_role'] == 1) {
			$_SESSION['teguh_username_user'] = $teguh_username_user;
			$_SESSION['teguh_id_role'] = '1';
			$_SESSION['status'] = 'login';
			header("location:teguh_halaman/teguh_administrator/teguh_user.php?pesan=login-berhasil");
		}
		elseif ($login['teguh_id_role'] == 2) {
			$_SESSION['teguh_username_user'] = $teguh_username_user;
			$_SESSION['teguh_id_role'] = '1';
			$_SESSION['status'] = 'login';
			header("location:teguh_halaman/teguh_resepsionis/teguh_index.php?pesan=login-berhasil");
		}
	}else{
			echo "<script>
    		alert('Login gagal! Masukkan username dan password kembali.');
    		document.location.href = 'teguh_login.php';
    		</script>";
		}	
 ?>