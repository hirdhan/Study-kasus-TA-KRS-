<?php
if(isset($_GET['id_ruang'])){

	$delete_ruang = mysqli_query($koneksi, "DELETE FROM ruang WHERE id_ruang=".$_GET['id_ruang']);

    // apakah query hapus berhasil?
    if( $delete_ruang ){
        ?>
        <script type="text/javascript">
            alert("Delete Ruang Berhasil!");location.href="index.php?hal=admin-master/ruang/list-ruang";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Delete Ruang Gagal!");location.href="index.php?hal=admin-master/ruang/list-ruang";
        </script>
        <?php
    }

} else {
    die("akses dilarang...");
}
?>