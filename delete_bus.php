<?php
include 'konekke_local.php';

$id = $_POST['id'];

$query = "DELETE FROM buses WHERE id = ?";
$stmt = $koneklocalhost->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

$stmt->close();
$koneklocalhost->close();
?>
