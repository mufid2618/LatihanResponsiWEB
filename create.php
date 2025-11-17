<?php
require_once __DIR__. '/koneksi.php';

$judul = $_POST['judul_film'];
$sutradara = $_POST['sutradara'];
$harga = $_POST['harga_tiket'];

$sql = "INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ssi", $judul, $sutradara, $harga);

if ($stmt->execute()) {
    header("Location: index.php?created=1");
} else {
    echo "Gagal menambahkan data: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
