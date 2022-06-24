<?php
$select_mahasiswa	= mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$num_mahasiswa		= mysqli_num_rows($select_mahasiswa);
$i = 1;
?>
<style>

select{
	padding: 7px;
}

input[type=text] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}

table, th, td {
  border: 1px solid #ddd;
}

table{
	width: 100%;
}

th {
  font-weight: bold;
  border: none;
  
}

tr:nth-child(even) {
	background-color: #f2f2f2;
	}

th, td {
  padding: 10px;
  text-align: center;
}

.hidetext { -webkit-text-security: disc; /* Default */ }

</style>
<div class="list-jenis">
<div class="row">
<div class="col-sm-2">
<section class="panel panel-default">
<div class="panel panel-heading">Total Mahasiswa</div>
<div class="panel panel-body">
<i class="glyphicon glyphicon-user"></i> <b>:</b> <?=$num_mahasiswa;?>
</div>
</div>

<div class="col-sm-10">
<section class="panel panel-default">
<div class="panel panel-heading">LIST MAHASISWA</div>
<div class="panel panel-body">
<a href="index.php?hal=admin-master/mahasiswa/register" class="btn btn-primary btn-md">+ Tambah Mahasiswa</a>
<br /><br />

<table id="example" class="table table-hover">
 <thead>
  <tr>
   <th>No
   </th>
   <th>NPM
   </th>
   <th>Mahasiswa
   </th>
   <th>Jurusan
   </th>
   <th>Jenis kelamin
   </th>
   <th>Alamat
   </th>
   <th>No Telp
   </th>
    <th>email
    </th>
   </th>
    <th>Aksi
    </th>
  </tr>
 </thead>
 <tbody>
  <?php
      $no = 1;
      while($row_mahasiswa = mysqli_fetch_array($select_mahasiswa)){
        echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$row_mahasiswa['npm'].'</td>';
        echo '<td>'.$row_mahasiswa['nama'].'</td>';
        echo '<td>'.$row_mahasiswa['jurusan'].'</td>';
        echo '<td>'.$row_mahasiswa['jenis_kelamin'].'</td>';
        echo '<td>'.$row_mahasiswa['alamat'].'</td>';
        echo '<td>'.$row_mahasiswa['No_telp'].'</td>';
        echo '<td>'.$row_mahasiswa['email'].'</td>';
        echo "<td> <a href='#modal_delete' data-id='".$row_mahasiswa['id_mahasiswa']."' data-toggle='modal' class='btn btn-danger buang' role='button'><i class='glyphicon glyphicon-trash'></i></a>
          </td>";
        echo '</tr>';
       }
      ?>
 </tbody>
</table>
</div>
</section>
</section>
</div>
</div>
</div>
</div>

<div class="modal-footer">
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
    $('#delete_link').attr('href','?hal=admin-master/mahasiswa/delete-mahasiswa&id_mahasiswa='+id);
})
</script>




