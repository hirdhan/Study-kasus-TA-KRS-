<?php
if( !isset($_GET['id']) ){
    header('?hal=admin-master/matkul/list-matkul');
}
// buat query untuk ambil data dari database
$select_matkul	= mysqli_query($koneksi, "SELECT * FROM matkul WHERE id_matkul=".$_GET['id']);
$row_matkul 		= mysqli_fetch_array($select_matkul);

if(isset($_POST['simpan'])){

    $edit_matkul = mysqli_query($koneksi,"UPDATE matkul SET nama_matkul='".$_POST['nama_matkul']."', sks=".$_POST['sks'].", id_jadwal=".$_POST['id_jadwal'].", id_ruang=".$_POST['id_ruang']." WHERE id_matkul=".$_GET['id']);

    // apakah query update berhasil?
    if($edit_matkul){
        header('Location: index.php?hal=admin-master/matkul/list-matkul');
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
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

</style>

<div class="row list-jenis">
	<div class="col-sm-12">
	 <section class="panel panel-default">
	  <header class="panel-heading">EDIT MATA KULIAH</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="matkul">Mata Kuliah </label><br />
            <input type="text" id="matkul" name="nama_matkul" placeholder="Masukkan Mata Kuliah" value="<?php echo $row_matkul['nama_matkul']; ?>" required />
        </p>

        <p>
            <label for="sks">SKS </label><br />
            <input type="number" min="1" name="sks" placeholder="Masukkan SKS" value="<?php echo $row_matkul['sks']; ?>" required />
        </p>

        <p>
            <label>Ruang </label><br />
            <select name="id_ruang">
                <?php 
                    $select_ruang = mysqli_query($koneksi, "SELECT * FROM ruang");
                    while ($row_ruang = mysqli_fetch_array($select_ruang)) {
                        echo "<option value='".$row_ruang['id_ruang']."'>".$row_ruang['nama_ruang']."</option>";
                    }
                ?>
            </select>
        </p>

        <p>
            <label>Jadwal </label><br />
            <select name="id_jadwal">
                <?php 
                    $select_detail_ruang = mysqli_query($koneksi, "SELECT * FROM detail_ruang");
                    while ($row_detail_ruang = mysqli_fetch_array($select_detail_ruang)) {
                        echo "<option value='".$row_detail_ruang['id_jadwal']."'>".$row_detail_ruang['hari']." ".$row_detail_ruang['jam']."</option>";
                    }
                ?>
            </select>
        </p>
        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/matkul/list-matkul" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

