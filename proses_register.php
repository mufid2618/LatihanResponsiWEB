<?php
session_start();
require_once __DIR__ .'/koneksi.php';

$nama   = $_POST['nama_lengkap'];
$user   = $_POST['username'];
$pass   = $_POST['password'];
$pass2  = $_POST['password2'];

if ($pass != $pass2) {
    $_SESSION['register_error'] = "Konfirmasi password tidak cocok!";
    header("Location: register.php");
    exit;
}


$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user'");
if (mysqli_num_rows($cek) > 0) {
    $_SESSION['register_error'] = "Username sudah digunakan!";
    header("Location: register.php");
    exit;
}

mysqli_query($koneksi, "INSERT INTO users (username, password, nama_lengkap) 
                        VALUES ('$user', '$pass', '$nama')");

$_SESSION['register_success'] = "Register berhasil! Silakan login.";
header("Location: login.php");
exit;
?>
