<?php
$host ="localhost";
$port = "3306";
$username = "root";
$password ="";
$database ="bioskop";

$koneksi = null;

try {
    $koneksi = new mysqli($host, $username, $password, $database);
} catch (Exception $e) {
    echo "koneksi gagal";
}

?>