<?php
if(isset($_POST['tambah'])){
  if(!empty($_POST['nama_ruang'])){

  	$selectDataRuang = mysqli_query($koneksi, "SELECT * FROM ruang WHERE nama_ruang='".$_POST['nama_ruang']."'");
		$num_ruang = mysqli_num_rows($selectDataRuang);

		if($num_ruang == 0){
			$insert_ruang = mysqli_query($koneksi,"INSERT INTO ruang VALUES('','".$_POST['nama_ruang']."')");
	    if( $insert_ruang ) {
				header('Location: ?hal=admin-master/ruang/list-ruang');
	    }else{
	      header('Location: index.php');
	    }
		}else{
			?>
      <script type="text/javascript">
          alert("Ruang Tidak Boleh Sama!");location.href="index.php?hal=admin-master/ruang/list-ruang";
      </script>
      <?php
		}
  }else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	      	 <strong>Input gagal</strong></div>';  
  }
} 

$select_detail_ruang = mysqli_query($koneksi,"SELECT * FROM detail_ruang");
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
	   <div class="panel panel-heading">Total List Jadwal</div>
		<div class="panel panel-body">
			<p>Total List Jadwal<b>:</b>
			<?php 
				echo mysqli_num_rows($select_detail_ruang);
			?>
			</p>
		</div>
	 </div>
	 <div class="col-sm-10">
	  <section class="panel panel-default">
		<header class="panel-heading">LIST JADWAL</header>
		<div class="panel-body">	
		 <nav>
			<button type="button" data-target="#ModalAdd" data-toggle="modal" class="btn btn-warning">
			 <i class="fa fa-plus"></i> Tambah Jadwal
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
			   Hari
			  </th>
			  <th>
			   Jam
			  </th>
			  <th>
			   Aksi
			  </th>
			 </tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			while($row_detail_ruang = mysqli_fetch_array($select_detail_ruang)){
			  echo '<tr>';
			  echo '<td>'.$no++.'</td>';
			  echo '<td>'.$row_detail_ruang['hari'].'</td>';
			  echo '<td>'.$row_detail_ruang['jam'].'</td>';
			  echo "<td><a href='?hal=admin-master/jadwal/edit-jadwal&id_jadwal=".$row_detail_ruang['id_jadwal']."' class='btn btn-warning' role='button'><i class='glyphicon glyphicon-pencil'></i></a>
                        <a href='#modal_delete' data-id='".$row_detail_ruang['id_jadwal']."' data-toggle='modal' class='btn btn-danger buang' role='button'><i class='glyphicon glyphicon-trash'></i></a>
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
						<h4 class="modal-title">Tambah Ruang</h4>
					</div>
					<div class="modal-body">
						<form action="" name="modal_popup" method="post">
							<label for="ruang">Ruang</label>
							<input name="nama_ruang" type="text" id="ruang" class="form-control" placeholder="Masukkan Ruang" required />
							<br>
							<div class="modal-footer">
								<button class="btn btn-default" name="tambah" type="submit">
									Tambah
								</button>
								<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
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
    $('#delete_link').attr('href','?hal=admin-master/jadwal/delete-jadwal&id_jadwal='+id);
})
</script>

