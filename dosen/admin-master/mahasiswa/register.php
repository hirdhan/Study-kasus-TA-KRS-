<div class="list-jenis">
<div class="row">
<div class="col-sm-12">
<section class="panel panel-default">
<div class="panel panel-heading">REGISTER MAHASISWA</div>
<div class="panel panel-body">
<?php
if(isset($_POST['reg'])){

 if($_POST['npm'] == '' || $_POST['nama'] == '' || $_POST['jurusan'] == '' || $_POST['jenis_kelamin'] == '' || $_POST['alamat'] == '' || $_POST['No_telp'] == '' || $_POST['email'] == '' || $_POST['password'] == ''){
	echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
 }else{
	$insert_mahasiswa = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('','".$_POST['npm']."', '".$_POST['nama']."', '".$_POST['jurusan']."', '".$_POST['jenis_kelamin']."', '".$_POST['alamat']."', '".$_POST['No_telp']."', '".$_POST['email']."', '".$_POST['password']."')");

	if ($insert_mahasiswa) {
		?>
        <script type="text/javascript">
            alert("Input Mahasiswa Berhasil!");location.href="index.php?hal=admin-master/mahasiswa/list-mahasiswa";
        </script>
        <?php
	}
 }
}
?>
	<form action="" method="POST" autocomplete="off">
	<p>
    <label for="npm"> NPM</label><br />
    <input class="form-control" name="npm" id="npm" type="text" required />
    </p>
	<p>
	<label for="nama"> Nama Lengkap</label><br />
    <input class="form-control" name="nama" id="nama" type="text" required />
    </p>
	<p>
	<label for="jurusan">Jurusan</label><br />
    <input class="form-control" name="jurusan" id="jurusan" type="text" required />
    </p>
    <p>
	<label for="jenis_kelamin"> Jenis kelamin</label><br />
    <input class="form-control" name="jenis_kelamin" id="jenis_kelamin" type="jenis_kelamin" required />
	</p>
	<p>
	<label for="alamat"> Alamat</label><br />
    <input class="form-control" name="alamat" id="alamat" type="alamat" required />
	</p>
	<p>
	<label for="No_telp"> No Telepon</label><br />
    <input class="form-control" name="No_telp" id="No_telp" type="No_telp" required />
	</p>
	<p>
	<label for="email"> email</label><br />
    <input class="form-control" name="email" id="email" type="email" required />
	</p>
	<p>
	<label for="password"> Password</label><br />
    <input class="form-control" name="password" id="password" type="password" required />
	</p>
	<br>  
	<p>
	<input type="submit" name="reg" class="btn btn-success" value="REGISTER" />
	<a href="index.php?hal=admin-master/mahasiswa/list-mahasiswa"><button type="button" class="btn btn-danger">CANCEL</button></a>
	</p>
</form>	
</div>
</section>
</div>
</div>
</div>