<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .main-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .btn-custom {
            background-color: #3a3669;
            color: white;
            padding: 5px 20px;
            font-size: 14px;
        }

        .btn-kembali {
            background-color: #9aa4af;
            padding: 5px 20px;
            font-size: 14px;
            color: white;
        }

        .btn-custom:hover {
            background-color: #9a94a5;
        }

        .btn-kembali:hover {
            background-color: #7d858f;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center" style="min-height: 100vh;">
        <div class="row main-card w-100">


            <div class="col-md-6 d-flex justify-content-center ">
                <img src="film.jpg" alt="gambar film" class="img-fluid" style="max-height: 500px;">
            </div>


            <div class="col-md-6">
                <h2 class="mb-0">Register</h2>
                <p>Isi semua data dengan benar</p>
                <?php

                session_start();
                if (isset($_SESSION['register_error'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['register_error'] . "</div>";
                    unset($_SESSION['register_error']);
                }

                if (isset($_SESSION['register_success'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['register_success'] . "</div>";
                    unset($_SESSION['register_success']);
                }
                ?>

                <form action="proses_register.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-custom">Register</button>
                        <button type="button" class="btn btn-kembali" onclick="window.location.href='login.php'">
                            Kembali
                        </button>
                </form>

                <p class="mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>