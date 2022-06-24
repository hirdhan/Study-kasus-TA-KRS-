<?php
 session_start();
 include 'koneksi.php';

if(isset($_POST['login']) && !empty($_POST['login'])){
	 $username 	= mysqli_real_escape_string($koneksi, $_POST['username']);
	 $password	= mysqli_real_escape_string($koneksi, $_POST['password']);

	 $select_dosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nip='$username' AND password='$password'");
	 $row_dosen = mysqli_fetch_array($select_dosen);
	 $num_dosen = mysqli_num_rows($select_dosen);

	 $select_mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$username' AND password='$password'");
	 $row_mhs = mysqli_fetch_array($select_mhs);
	 $num_mhs = mysqli_num_rows($select_mhs);

	 if($num_dosen > 0) {
	 	$_SESSION['username'] = $row_dosen['nama_dosen'];
		$_SESSION['id_dosen'] = $row_dosen['id_dosen'];
		header('location: dosen/index.php');
		exit;
	 }else if($num_mhs > 0) {
	 	$_SESSION['username'] = $row_mhs['nama_mahasiswa'];
		$_SESSION['id_mahasiswa'] = $row_mhs['id_mahasiswa'];
		header('location: mahasiswa/index.php');
		exit;
	 }else{
?>
		<script type="text/javascript">
		 alert("Pengguna Tidak Ditemukan!");location.href="index.php";
		</script>
<?php
	 }
}
?>