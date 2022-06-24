<?php
if(isset($_GET['id_matkul'])){
	$delete_matkul = mysqli_query($koneksi, "DELETE FROM matkul WHERE id_matkul=".$_GET['id_matkul']);

    // apakah query hapus berhasil?
    if( $delete_matkul ){
        ?>
        <script type="text/javascript">
            alert("Delete Matkul Berhasil!");location.href="index.php?hal=admin-master/matkul/list-matkul";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Delete Matkul Gagal!");location.href="index.php?hal=admin-master/matkul/list-matkul";
        </script>
        <?php
    }

} else {
    die("akses dilarang...");
}
?>