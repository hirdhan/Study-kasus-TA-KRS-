<?php 
$term = $_GET['term'];
// buat database dan table barang
$query = "SELECT * FROM hget_in WHERE No_ticket LIKE '%$term%' LIMIT 5";
$link = mysqli_connect('localhost', 'root', '', 'gate');
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result))
{
    $data[] = array('value'=>$row['No_ticket']);
}
echo json_encode($data);
?>