<?php
if( !isset($_GET['id_ruang']) ){
    header('?hal=admin-master/ruang/list-ruang');
}

$select_ruang	= mysqli_query($koneksi, "SELECT * FROM ruang WHERE id_ruang=".$_GET['id_ruang']);
$row_ruang 		= mysqli_fetch_array($select_ruang);

if(isset($_POST['simpan'])){

	$selectDataRuang = mysqli_query($koneksi, "SELECT * FROM ruang WHERE nama_ruang='".$_POST['nama_ruang']."'");
	$num_ruang = mysqli_num_rows($selectDataRuang);

	if($num_ruang == 0){
		$edit_ruang = mysqli_query($koneksi,"UPDATE ruang SET nama_ruang='".$_POST['nama_ruang']."' WHERE id_ruang=".$_GET['id_ruang']);

	    // apakah query update berhasil?
	    if($edit_ruang){
	        header('Location: index.php?hal=admin-master/ruang/list-ruang');
	    }else{
	        header('Location: index.php?hal=dashboard');
	    }
	}else{
		?>
        <script type="text/javascript">
            alert("Ruang Tidak Boleh Sama!");location.href="index.php?hal=admin-master/ruang/list-ruang";
        </script>
        <?php
	}
}
?>

<style>

select {
  width: 30%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}


input[type=number]{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

</style>

<div class="row list-jenis">
	<div class="col-sm-12">
	 <section class="panel panel-default">
	  <header class="panel-heading">EDIT RUANG</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="ruang">Ruang </label><br />
            <input type="text" id="ruang" name="nama_ruang" placeholder="Masukkan Ruang" value="<?php echo $row_ruang['nama_ruang']; ?>" required />
        </p>
        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/ruang/list-ruang" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

