<?php
session_start();
require_once __DIR__ .'/koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");

if (mysqli_num_rows($q) == 1) {
    $data = mysqli_fetch_assoc($q);

    $_SESSION['login'] = true;
    $_SESSION['nama']  = $data['nama_lengkap'];
    $_SESSION['user']  = $data['username'];

    header("Location: index.php?msg=login_sukses");
} else {
    $_SESSION['login_error'] = "Login gagal! Username atau password salah.";
    header("Location: login.php");
}
exit;
?>
