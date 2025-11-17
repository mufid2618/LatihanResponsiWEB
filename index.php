<?php
session_start();
require_once __DIR__ .'/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php?msg=belum_login");
    exit;
}



$query = "SELECT * FROM film";
$film = mysqli_query($koneksi, $query);


$total = 0;
while ($row = mysqli_fetch_assoc($film)) {
    $total += $row['harga_tiket'];
}

mysqli_data_seek($film, 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Film Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #1f3a5f;     
            padding: 10px;
        }
        .header-title {
            color: white;
            font-size: 28px;
            font-weight: bold;
        }
        .welcome-text {
            color: white;
        }
        
        .table-header th {
            background-color: #254674ff !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <div class="navbar-custom">
        <div class="container">
            <div class="header-title">Manajemen Film Bioskop</div>
            <div class="welcome-text">
                Selamat datang, <strong><?= $_SESSION['nama'] ?></strong> |
                <a href="logout.php" class="text-white">Logout</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">

        <a href="tambah.php" class="btn btn-success mb-3">Tambah Film</a>

        <table class="table table-bordered">
            <thead>
                <tr class="table-header">
                    <th>ID</th>
                    <th>Judul Film</th>
                    <th>Sutradara</th>
                    <th>Harga Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (mysqli_num_rows($film) > 0) {
                    while ($row = mysqli_fetch_assoc($film)) {
                        echo "
                        <tr>
                            <td>{$row['id_film']}</td>
                            <td>{$row['judul_film']}</td>
                            <td>{$row['sutradara']}</td>
                            <td>Rp " . number_format($row['harga_tiket'], 0, ',', '.') . "</td>
                            <td>
                                <a href='edit.php?id={$row['id_film']}'>Edit</a> |
                                <a href='delete.php?id={$row['id_film']}' class='text-danger'
                                onclick='return confirm(\"Yakin ingin menghapus film ini?\")'>
                                Hapus
                                </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data film</td></tr>";
                }
                ?>

                <tr class="fw-bold">
                    <td colspan="3">Total Harga Tiket</td>
                    <td colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></td>
                </tr>

            </tbody>
        </table>

    </div>

</body>
</html>
