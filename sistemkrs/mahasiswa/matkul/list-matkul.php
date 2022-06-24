<?php
$select_matkul	= mysqli_query($koneksi, "SELECT matkul.*, detail_ruang.*, ruang.* FROM matkul
                                        INNER JOIN detail_ruang ON matkul.id_jadwal = detail_ruang.id_jadwal
                                        INNER JOIN ruang ON matkul.id_ruang = ruang.id_ruang");
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

<div class="col-sm-12">
<section class="panel panel-default">
<div class="panel panel-heading">LIST MATKUL</div>
<div class="panel panel-body">

<table id="example" class="table table-hover">
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
   </tr>
 </thead>
 <tbody>
  <?php
  while($row_matkul	= mysqli_fetch_array($select_matkul)){
  ?>
  <tr>
   <td><?=$i++?></td>
   <td><?=$row_matkul['nama_matkul']?></td>
   <td><?=$row_matkul['hari']." ".$row_matkul['jam']?></td>
   <td><?=$row_matkul['nama_ruang']?></td>
   <td><?=$row_matkul['sks']?></td>
  </tr>
  <?php
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