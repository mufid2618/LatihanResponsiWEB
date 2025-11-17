<?php
require_once(__DIR__ . "/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id          = $_POST['id_film'];
    $judul       = $_POST['judul_film'];
    $sutradara   = $_POST['sutradara'];
    $harga       = $_POST['harga_tiket'];

    $sql = "UPDATE film SET judul_film = ?, sutradara = ?, harga_tiket = ? WHERE id_film = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssii", $judul, $sutradara, $harga, $id);

    if ($stmt->execute()) {
        header("Location: index.php?updated=1");
        exit;
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();

} else {
    echo "Permintaan tidak valid.";
}
?>
