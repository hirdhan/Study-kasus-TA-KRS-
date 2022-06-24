<?php
include('koneksi.php');

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
body{
	width: 30mm;
	height: 58mm;
	margin: 0 auto;
}

.hilang{
	font-size: 10px;
	font-weight: bold;
}
</style>
</head>
<body>
<div class="row">
<center style="font-size:11px;">
<h5>PT. PRIMAMAS SEGARA UNGGUL</h5>
</center>
------------------------------
</div>
<div class="row">
<?php 
date_default_timezone_set('Asia/Bangkok');
$sql1="SELECT No_ticket FROM dget_in_tamu WHERE No_ticket = $id";
$kueri1=mysqli_query($koneksi, $sql1);
if(mysqli_num_rows($kueri1) == 0){

$sql = "SELECT hget_in.No_ticket, dget_in_trailer.Nopol, dget_in_trailer.Tanggal_in FROM hget_in INNER JOIN dget_in_trailer ON hget_in.No_ticket=dget_in_trailer.No_ticket WHERE hget_in.No_ticket=$id GROUP BY hget_in.No_ticket";
$kueri = mysqli_query($koneksi, $sql);

}else{
	
$sql = "SELECT hget_in.No_ticket, dget_in_tamu.Nopol, dget_in_tamu.Tanggal_in FROM hget_in INNER JOIN dget_in_tamu ON hget_in.No_ticket=dget_in_tamu.No_ticket WHERE hget_in.No_ticket=$id GROUP BY hget_in.No_ticket";
$kueri = mysqli_query($koneksi, $sql);
	
}
while($tiket = mysqli_fetch_array($kueri)){

echo "<div class='pull-left'>".date('Y-m-d')."</div>";
echo "<div class='pull-right'>".date('H:i:s')."</div>";
echo "</div>";
echo "<br>";
echo "<div class='row'>";
echo "<center>";
echo "<p><b>No. Tiket</b><p>"; 
echo "<h1>".$tiket['No_ticket']."</h1>";
echo $tiket['Nopol'];
echo "</center>";
?>
<br>
<span class="hilang"><center>MOHON UNTUK MENJAGA TIKET SUPAYA TIDAK HILANG ATAU DIKENAKAN DENDA SEBESAR Rp. 10.000.00</center></span>
------------------------------
<center>
TERIMA KASIH
</center>
<?php
}
?>
</div>
<script>
window.print();
window.close();
</script>
</body>
</html>