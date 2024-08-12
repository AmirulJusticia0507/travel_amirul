<?php
include 'konekke_local.php';

$id = $_POST['id'];
$nomor_polisi = $_POST['nomor_polisi'];
$merk = $_POST['merk'];
$model = $_POST['model'];
$tahun = $_POST['tahun'];
$kapasitas = $_POST['kapasitas'];
$status = $_POST['status'];

$query = "UPDATE buses SET nomor_polisi = ?, merk = ?, model = ?, tahun = ?, kapasitas = ?, status = ? WHERE id = ?";
$stmt = $koneklocalhost->prepare($query);
$stmt->bind_param('ssssisi', $nomor_polisi, $merk, $model, $tahun, $kapasitas, $status, $id);
$stmt->execute();

$stmt->close();
$koneklocalhost->close();
?>
