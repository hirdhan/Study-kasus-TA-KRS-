<?php
$select_mahasiswa = mysqli_query($koneksi, "SELECT mahasiswa.*, matkul.*, detail_ruang.*, ruang.*, detail_mahasiswa.* 
                                            FROM detail_mahasiswa 
                                            INNER JOIN mahasiswa ON detail_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa
                                            INNER JOIN matkul ON detail_mahasiswa.matkul_id = matkul.id_matkul
                                            INNER JOIN detail_ruang ON matkul.id_jadwal = detail_ruang.id_jadwal
                                            INNER JOIN ruang ON matkul.id_ruang = ruang.id_ruang");
if(isset($_POST['konfirmasi'])){

    $update_status = mysqli_query($koneksi, "UPDATE detail_mahasiswa SET konfirmasi = 1 WHERE id_mahasiswa = ".$_POST['id_mahasiswa']." AND matkul_id = ".$_POST['matkul_id']);

    if ($update_status) {
        ?>
        <script type="text/javascript">
            alert("Update Status Berhasil!");location.href="?hal=dashboard";
        </script>
        <?php
    }
}else if(isset($_POST['batal'])) {
    $update_status = mysqli_query($koneksi, "UPDATE detail_mahasiswa SET konfirmasi = 0 WHERE id_mahasiswa = ".$_POST['id_mahasiswa']." AND matkul_id = ".$_POST['matkul_id']);

    if ($update_status) {
        ?>
        <script type="text/javascript">
            alert("Update Status Berhasil!");location.href="?hal=dashboard";
        </script>
        <?php
    }
}

?>

<div class="panel panel-default">
  <div class="panel-heading">LIST MAHASISWA</div>
  <div class="panel-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Mahasiswa </th>
                <th>Jurusan</th>
                <th>Jadwal</th>
                <th>Ruang</th>
                <th>Mata Kuliah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                while ($row_mhs = mysqli_fetch_array($select_mahasiswa)) {   
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$row_mhs['npm']."</td>";
                    echo "<td>".$row_mhs['nama']."</td>";
                    echo "<td>".$row_mhs['jurusan']."</td>";
                    echo "<td>".$row_mhs['hari']." ".$row_mhs['jam']."</td>";
                    echo "<td>".$row_mhs['nama_ruang']."</td>";
                    echo "<td>".$row_mhs['nama_matkul']."</td>";
                    if ($row_mhs['konfirmasi'] == 0) {
                        echo "<td style='color: red;'>Belum Konfirmasi</td>";
                    }else{
                        echo "<td style='color: green;'>Sudah Konfirmasi</td>";
                    }
                    echo    "<td>
                            <form action='' method='POST'>
                            <input type='hidden' name='id_mahasiswa' value='".$row_mhs['id_mahasiswa']."'>
                            <input type='hidden' name='matkul_id' value='".$row_mhs['matkul_id']."'>";
                            if ($row_mhs['konfirmasi'] == 0) {
                    echo    "<button type='submit' name='konfirmasi' class='btn btn-success btn-xs'>Konfirmasi</button>";
                            }else{
                    echo    "<button type='submit' name='batal' class='btn btn-danger btn-xs'>Batal</button>";
                            }
                    echo    "</form>
                            </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        <tfoot>
            <tr>

            </tr>
        </tfoot>
    </table>
  </div>
</div>