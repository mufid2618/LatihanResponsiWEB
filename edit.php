<?php
require_once __DIR__. '/koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film=$id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .header-box {
            background-color: #1f3a5f;
            padding: 20px;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .content-box {
            background: white;
            padding: 30px;
            border: 1px solid #eaeaea;
            border-radius: 0 0 8px 8px;
        }
        .btn-kembali {
            background-color: #9aa4af;
            color: white;
        }
        .btn-kembali:hover {
            background-color: #7d858f;
            color: white;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">

<div class="container mt-4">

    <div class="header-box">
        <h2 class="m-0">Edit Film</h2>
        <p class="m-0">Perbarui informasi film</p>
    </div>

    <div class="content-box">

        <form action="update.php" method="POST">

            <label class="form-label">ID Film</label>
            <input type="text" class="form-control mb-3" value="<?= $data['id_film'] ?>" readonly>
            <input type="hidden" name="id_film" value="<?= $data['id_film'] ?>">

            <label class="form-label">Judul Film</label>
            <input type="text" class="form-control mb-3" name="judul_film" value="<?= $data['judul_film'] ?>" required>

            <label class="form-label">Sutradara</label>
            <input type="text" class="form-control mb-3" name="sutradara" value="<?= $data['sutradara'] ?>" required>

            <label class="form-label">Harga Tiket (Rp)</label>
            <input type="number" class="form-control mb-4" name="harga_tiket" value="<?= $data['harga_tiket'] ?>" required>

            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="index.php" class="btn btn-kembali">Kembali</a>
        </form>

    </div>
</div>

</body>
</html>
