<?php
session_start();
require "fungsi.php";
    $id = $_SESSION['ids'];
    date_default_timezone_set("Asia/Jakarta");
    $w = date("Y-m-d")." ".date("H:i:sa");
    mysqli_query($my,"UPDATE petugas SET wkt_klr='$w' WHERE id_kar='$id'");

$_SESSION = [];
session_destroy();
session_unset();


header("location: ../index.php");
exit;

?>