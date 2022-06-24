<?php
if (isset($_POST['submit']) && isset($_POST['id_matkul'])) {
    if ($_POST['action'] == 'proses') {
        $id_matkul = $_POST['id_matkul'];

        $cartArray = array(
            $id_matkul => array(
                'id_mahasiswa' => $_SESSION['id_mahasiswa'],
                'id_matkul' => $_POST['id_matkul']
            )
        );

        if (empty($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart']= $cartArray;
            mysqli_query($koneksi, "INSERT INTO temp_mengambil VALUES('', ".$_SESSION['id_mahasiswa'].", ".$_POST['id_matkul'].")");
        }else{
            $array_keys = array_keys($_SESSION['shopping_cart']);
            if (in_array($id_matkul, $array_keys)) {
                $_SESSION['kode_matkul'] = $id_matkul;
            }else{
                $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cartArray);
                mysqli_query($koneksi, "INSERT INTO temp_mengambil VALUES('', ".$_SESSION['id_mahasiswa'].", ".$_POST['id_matkul'].")");
            }
        }
        header('Location: ?hal=dashboard');
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (!empty($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($_POST['id_matkul'] == $value['id_matkul']) {
                unset($_SESSION['shopping_cart'][$key]);
                mysqli_query($koneksi, "DELETE FROM temp_mengambil WHERE id_matkul=".$value['id_matkul']." AND id_mahasiswa=".$value['id_mahasiswa']);
            }
            if (empty($_SESSION['shopping_cart'])) {
                unset($_SESSION['shopping_cart']);
            }
        }
        header('Location: ?hal=dashboard');
    }
}

if (isset($_POST['save'])) {
    for ($a=0; $a < count($_POST['id_matkul']) ; $a++) { 
        mysqli_query($koneksi, "INSERT INTO detail_mahasiswa VALUES(".$_SESSION['id_mahasiswa'].", ".$_POST['id_matkul'][$a].", 0)");

        mysqli_query($koneksi, "DELETE FROM temp_mengambil WHERE id_matkul = ".$_POST['id_matkul'][$a]." AND id_mahasiswa = ".$_SESSION['id_mahasiswa']);
    }
    unset($_SESSION['shopping_cart']);
    header('Location: ?hal=dashboard');
}
?>
<div class="row" style="padding: 15px;padding-bottom: 0px;">
    <div class="col-md-12">
        <div class="panel panel-default" style="margin-bottom: 0px;">
            <div class="panel-body" style="padding: 10px;border-radius: 2px;">
            <form action="" method="POST">
                <input type="hidden" name="action" value="proses">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="nama_matkul">Mata Kuliah</label>
                <select name="id_matkul" id="nama_matkul" class="form-control">
                    <?php
                        $selectDataMatkul = mysqli_query($koneksi, "SELECT * FROM matkul");
                        while ($row_matkul = mysqli_fetch_array($selectDataMatkul)) {
                            echo "<option value='".$row_matkul['id_matkul']."'>".$row_matkul['nama_matkul']."</option>";
                        }
                    ?>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Pilih</button>
            </form>
            <hr>
            <h2>Pilihan Kartu Hasil Studi (KRS)</h2>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Mata Kuliah</th>
                    <th>Ruang</th>
                    <th>Jadwal</th>
                    <th>SKS</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_SESSION['shopping_cart'])){
                            $nomor = 1;
                            foreach ($_SESSION['shopping_cart'] as $cart) {
                            $row_matkul = mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul.*, ruang.*, detail_ruang.* FROM matkul INNER JOIN ruang ON matkul.id_ruang = ruang.id_ruang INNER JOIN detail_ruang ON matkul.id_jadwal = detail_ruang.id_jadwal WHERE matkul.id_matkul = ".$cart['id_matkul']));

                                echo "<tr>";
                                echo "<td>".$nomor++."</td>";
                                echo "<td>".$row_matkul['nama_matkul']."</td>";
                                echo "<td>".$row_matkul['nama_ruang']."</td>";
                                echo "<td>".$row_matkul['hari']." ".$row_matkul['jam']."</td>";
                                echo "<td>".$row_matkul['sks']."</td>";
                                echo "<td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='id_matkul' value='".$cart['id_matkul']."'>
                                        <input type='hidden' name='id_mahasiswa' value='".$cart['id_mahasiswa']."'>
                                        <input type='hidden' name='action' value='delete'>
                                        <button type='submit' class='btn btn-danger btn-xs'>
                                            <span class='glyphicon glyphicon-trash'> </span>
                                        </button>
                                    </form>
                                </td>";
                                echo "</tr>";
                            }
                                echo "<tr>";
                                echo "<td colspan='6'>
                                        <form action='' method='POST'";
                                        foreach ($_SESSION['shopping_cart'] as $matkul) {
                                            echo "<input type='hidden' name='id_mahasiswa[]' value='".$matkul['id_mahasiswa']."'>";
                                            echo "<input type='hidden' name='id_matkul[]' value='".$matkul['id_matkul']."'>";
                                        }
                                echo "<input type='hidden' name='action' value='save'>";
                                echo "<button type='submit' class='btn btn-primary btn-sm pull-right' name='save'>Simpan</button>";
                                echo "</form></td>";
                                echo "</tr>";
                        }
                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>