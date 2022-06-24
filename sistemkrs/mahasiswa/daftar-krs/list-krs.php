<?php
$select_sistemkrs	= mysqli_query($koneksi, "SELECT detail_mahasiswa.*, matkul.*, detail_ruang.*, ruang.* FROM detail_mahasiswa 
                                      INNER JOIN matkul ON detail_mahasiswa.matkul_id = matkul.id_matkul 
                                      INNER JOIN detail_ruang ON matkul.id_jadwal = detail_ruang.id_jadwal
                                      INNER JOIN ruang ON matkul.id_ruang = ruang.id_ruang
                                      WHERE detail_mahasiswa.id_mahasiswa = ".$_SESSION['id_mahasiswa']);
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
<div class="panel panel-heading">KARTU HASIL STUDI (KRS)</div>
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
    <th>
     STATUS
    </th>
   </tr>
 </thead>
 <tbody>
  <?php
  $i = 1;
  while($row_krs	= mysqli_fetch_array($select_sistemkrs)){
    echo "<tr>";
    echo "<td>".$i++."</td>";
    echo "<td>".$row_krs['nama_matkul']."</td>";
    echo "<td>".$row_krs['hari']." ".$row_krs['jam']."</td>";
    echo "<td>".$row_krs['nama_ruang']."</td>";
    echo "<td>".$row_krs['sks']."</td>";
    if ($row_krs['konfirmasi'] == 0) {
      echo "<td style='color: red'>Belum Dikonfirmasi</td>";
    }else{
      echo "<td style='color: green'>Sudah Dikonfirmasi</td>";
    }
    echo "</tr>";
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