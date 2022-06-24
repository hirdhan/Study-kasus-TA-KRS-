<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
<?php
date_default_timezone_set("Asia/Jakarta");
include('../koneksi.php');
include("admin-sidebar.php");
include("admin-navbar.php");
?>
<section id="content-wrapper">
        <?php 
			if (isset($_GET['hal']) && strlen($_GET['hal']) > 0) {
                $hal = str_replace(".", "/", $_GET['hal']) . ".php";
            } else {
                $hal = "dashboard.php";
            }
            if (file_exists($hal)) {
                include($hal);
            } else {
                include("dashboard.php");
            }
        ?>
</section>
</div>

<script src="datatables/jquery.dataTables.js"></script>
<script src="datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
$(function(){
$("#sidebar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
});
</script>
<script>
$(document).ready(function() {
$("#example").dataTable({
	"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
});
 });
</script>
</body>
</html>