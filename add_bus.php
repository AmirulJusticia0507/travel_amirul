<?php
include 'konekke_local.php';

$nomor_polisi = $_POST['nomor_polisi'];
$merk = $_POST['merk'];
$model = $_POST['model'];
$tahun = $_POST['tahun'];
$kapasitas = $_POST['kapasitas'];
$status = $_POST['status'];

$query = "INSERT INTO buses (nomor_polisi, merk, model, tahun, kapasitas, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $koneklocalhost->prepare($query);
$stmt->bind_param('ssssis', $nomor_polisi, $merk, $model, $tahun, $kapasitas, $status);
$stmt->execute();

$stmt->close();
$koneklocalhost->close();
?>
