 <?php 
include '../../teguh_koneksi.php';
	$teguh_aa = $_GET['teguh_id_kamar'];
	$teguh_data = mysqli_query ($teguh_koneksi, "SELECT * FROM teguh_kamar WHERE teguh_id_kamar = '".$_GET['teguh_id_kamar']."'"); 
	$teguh_p = mysqli_fetch_array($teguh_data);
	$teguh_d = $teguh_p['teguh_id_tipe'];

	$teguh_aja = mysqli_query($teguh_koneksi, "SELECT * FROM teguh_tipe_kamar WHERE teguh_id_tipe = '$teguh_d'");
	$teguh_j = mysqli_fetch_array($teguh_aja);
	$teguh_k = $teguh_j['teguh_jumlah_bed'] - 1;

	mysqli_query($teguh_koneksi, "DELETE FROM teguh_kamar WHERE teguh_id_kamar = '$teguh_aa' ");
	mysqli_query($teguh_koneksi, "UPDATE teguh_tipe_kamar SET teguh_jumlah_bed = '$teguh_k' WHERE teguh_id_tipe = '$teguh_d'");

	echo "<script>alert('Data Kamar berhasil dihapus')</script>";
	echo "<script>location='teguh_kamar.php'</script>";


 ?>