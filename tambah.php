<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Film Baru</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .header-box {
        background-color: #1f3a5f; 
        padding: 20px 30px;
        color: white;
        border-radius: 8px 8px 0 0;
    }
    .content-box {
        background: white;
        padding: 30px;
        border-radius: 0 0 8px 8px;
        border: 1px solid #e0e0e0;
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
        <h2 class="m-0">Tambah Film Baru</h2>
        <p class="m-0">Isi form untuk menambahkan film</p>
    </div>

    <div class="content-box">

      <form action="create.php" method="POST">

        <div class="mb-3">
          <label class="form-label">Judul Film</label>
          <input type="text" class="form-control" name="judul_film" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Sutradara</label>
          <input type="text" class="form-control" name="sutradara" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Harga Tiket (Rp)</label>
          <input type="number" class="form-control" name="harga_tiket" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-kembali">Kembali</a>

      </form>

    </div>
  </div>

</body>
</html>
