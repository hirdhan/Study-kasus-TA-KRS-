<?php
if(isset($_GET['id_mahasiswa'])){
	$delete_matkul = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa=".$_GET['id_mahasiswa']);

    // apakah query hapus berhasil?
    if( $delete_mahasiswa ){
        ?>
        <script type="text/javascript">
            alert("Delete mahasiswa Berhasil!");location.href="index.php?hal=admin-master/mahasiswa/list-mahasiswa";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Delete Mahasiswa Gagal!");location.href="index.php?hal=admin-master/mahasiswa/list-mahasiswa";
        </script>
        <?php
    }

} else {
    die("akses dilarang...");
}
?>