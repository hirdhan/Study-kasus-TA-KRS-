<?php
if( !isset($_GET['id_jadwal']) ){
    header('?hal=admin-master/jadwal/list-jadwal');
}

$select_detail_ruang	= mysqli_query($koneksi, "SELECT * FROM detail_ruang WHERE id_jadwal=".$_GET['id_jadwal']);
$row_detail_ruang 	= mysqli_fetch_array($select_detail_ruang);

if(isset($_POST['simpan'])){

	$edit_detail_ruang = mysqli_query($koneksi,"UPDATE detail_ruang SET hari='".$_POST['hari']."', jam='".$_POST['jam']."' WHERE id_jadwal=".$_GET['id_jadwal']);

    if($edit_detail_ruang){
        header('Location: index.php?hal=admin-master/jadwal/list-jadwal');
    }else{
        header('Location: index.php?hal=dashboard');
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
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=time]{
  width: 25%;
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
            <label for="hari">Hari </label><br />
            <input type="text" id="hari" name="hari" placeholder="Masukkan Hari" value="<?php echo $row_detail_ruang['hari']; ?>" required />
        </p>

        <p>
            <label for="jam">Jam</label><br />
            <input type="time" id="jam" name="jam" placeholder="Masukkan Jam" value="<?php echo $row_detail_ruang['jam']; ?>" required />
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

