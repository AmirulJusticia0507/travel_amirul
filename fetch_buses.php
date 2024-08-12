<?php
include 'konekke_local.php';

$query = "SELECT id, nomor_polisi, merk, model, tahun, kapasitas, status FROM buses";
$stmt = $koneklocalhost->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(["data" => $data]);

$stmt->close();
$koneklocalhost->close();
?>
