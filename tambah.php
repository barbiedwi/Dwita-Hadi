<?php
include "koneksi.php";

$tanggal = $_POST['tanggal'];
$aktivitas = $_POST['aktivitas'];
$mood = $_POST['mood'];
$catatan = $_POST['catatan'];

mysqli_query($conn, "INSERT INTO jurnal VALUES('', '$tanggal', '$aktivitas', '$mood', '$catatan')");

header("Location: index.php");
?>