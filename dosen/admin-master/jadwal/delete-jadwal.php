<?php
if(isset($_GET['id_jadwal'])){

	$delete_jadwal = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal=".$_GET['id_jadwal']);

    // apakah query hapus berhasil?
    if( $delete_jadwal ){
        ?>
        <script type="text/javascript">
            alert("Delete Jadwal Berhasil!");location.href="index.php?hal=admin-master/jadwal/list-jadwal";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Delete Jadwal Gagal!");location.href="index.php?hal=admin-master/jadwal/list-jadwal";
        </script>
        <?php
    }

} else {
    die("akses dilarang...");
}
?>