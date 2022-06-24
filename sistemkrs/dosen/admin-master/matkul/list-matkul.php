<?php
if(isset($_POST['daftar'])){
  if(!empty($_POST['nama_matkul']) && !empty($_POST['sks'])){

    $insert_matkul = mysqli_query($koneksi,	"INSERT INTO matkul VALUES('',".$_POST['id_jadwal'].", ".$_POST['id_ruang'].", '".$_POST['nama_matkul']."', ".$_POST['sks'].")");

    if( $insert_kategori ) {
		header('Location: ?hal=admin-master/matkul/list-matkul');
    }else{
        header('Location: index.php');
    }
  }else{
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	       <strong>Input gagal</strong></div>';  
  }
} 

?>

<style>

ul.ui-autocomplete {
width: auto;
border: none;
}

ul.ui-autocomplete li.ui-menu-item {
font-size: 15px;
padding: 3px;
border: none;
}

ul.ui-autocomplete li.ui-menu-item:hover {
border: none;
}

input[type=text] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}

input[type=number] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}


</style>
<div class="list-jenis">
	<div class="row">
	 <div class="col-sm-2">
	  <section class="panel panel-default">
	   <div class="panel panel-heading">Total Mata Kuliah</div>
		<div class="panel panel-body">
			Total Mata Kuliah <b>:</b>
			<?php 
				$select_matkul = mysqli_query($koneksi,"SELECT matkul.*, detail_ruang.*, ruang.* FROM matkul 
				INNER JOIN detail_ruang ON matkul.id_jadwal = detail_ruang.id_jadwal 
				INNER JOIN ruang ON matkul.id_ruang = ruang.id_ruang");
				echo mysqli_num_rows($select_matkul);
			?>
		</div>
	 </div>
	 <div class="col-sm-10">
	  <section class="panel panel-default">
		<header class="panel-heading">LIST MATA KULIAH</header>
		<div class="panel-body">	
		 <nav>
			<button type="button" data-target="#ModalAdd" data-toggle="modal" class="btn btn-success">
			 <i class="fa fa-plus"></i> Tambah Mata Kuliah Baru
			</button>
		 </nav>
		 <br>
		 <div class="table-responsive">
		  <table class="table table-bordered" id="example">
			<thead>
			 <tr>
			  <th>
			   Nomor
			  </th>
			  <th>
			   Mata Kuliah
			  </th>
			  <th>
			   Jadwal
			  </th>
			  <th>
			   Ruang
			  </th>
			  <th>
			   SKS
			  </th>
			  <th>
			   Aksi
			  </th>
			 </tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			while($row_matkul = mysqli_fetch_array($select_matkul)){
			  echo '<tr>';
			  echo '<td>'.$no++.'</td>';
			  echo '<td>'.$row_matkul['nama_matkul'].'</td>';
			  echo '<td>'.$row_matkul['hari'].' '.$row_matkul['jam'].'</td>';
			  echo '<td>'.$row_matkul['nama_ruang'].'</td>';
			  echo '<td>'.$row_matkul['sks'].'</td>';
			  echo "<td><a href='?hal=admin-master/matkul/edit-matkul&id=".$row_matkul['id_matkul']."' class='btn btn-warning' role='button'><i class='glyphicon glyphicon-pencil'></i></a>
                        <a href='#modal_delete' data-id='".$row_matkul['id_matkul']."' data-toggle='modal' class='btn btn-danger buang' role='button'><i class='glyphicon glyphicon-trash'></i></a>
					</td>";
			  echo '</tr>';
			 }
			?>
			</tbody>
			</table>
		 </div>
		</div>
	  </section>
	 </div>
	</div>
</div>
 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Kategori</h4>
					</div>
					<div class="modal-body">
						<form action="" name="modal_popup" method="post">
							<br>
							<input name="nama_matkul" type="text" class="form-control" placeholder="Masukkan nama mata kuliah" required />
							<br>
							<input name="sks" type="number" min="1" class="form-control" placeholder="Masukkan jumlah sks" required />
							<br>
							<select name="id_ruang" class="form-control">
                <?php 
                    $select_ruang = mysqli_query($koneksi, "SELECT * FROM ruang");
                    while ($row_ruang = mysqli_fetch_array($select_ruang)) {
                        echo "<option value='".$row_ruang['id_ruang']."'>".$row_ruang['nama_ruang']."</option>";
                    }
                ?>
            	</select>
							<br>
							<select name="id_jadwal" class="form-control">
                <?php 
                    $select_detail_ruang = mysqli_query($koneksi, "SELECT * FROM detail_ruang");
                    while ($row_detail_ruang = mysqli_fetch_array($select_detail_ruang)) {
                        echo "<option value='".$row_detail_ruang['id_jadwal']."'>".$row_detail_ruang['hari']." ".$row_detail_ruang['jam']."</option>";
                    }
                ?>
            	</select>
            	<br>
							<div class="modal-footer">
								<button class="btn btn-default" name="daftar" type="submit">
									Tambah
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Apa anda yakin ingin menghapus data ini?</h4>
					</div>
                    <div class="modal-body">
					  <div class="alert alert-warning">Data yang sudah dihapus
					  <br> tidak akan bisa dikembalikan lagi!</div>
					</div>					
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:right;">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a href="#" role="button" class="btn btn-danger" id="delete_link">Delete</a>
					</div>
				</div>
			</div>
		</div>
		


<script src="jquery/jquery.min.js"></script>		
<script src="js/bootstrap.min.js"></script>
<script>
$('.buang').click(function(){
    var id=$(this).data('id');
    $('#delete_link').attr('href','?hal=admin-master/matkul/delete-matkul&id_matkul='+id);
})
</script>

