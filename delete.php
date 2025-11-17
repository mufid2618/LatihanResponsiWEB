<?php 
require_once(__DIR__ ."/koneksi.php"); 

if (!$koneksi) { 
    die("Connection failed: " . mysqli_connect_error()); 
}

echo "<br>"; 

$id = $_GET['id'];

$sql = "DELETE FROM film WHERE id_film = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);

if($stmt->execute()) { 
    header("Location: index.php?created=1");; 
} else { 
    echo "Gagal menghapus data: " . $stmt->error; 
}

$stmt->close(); 
$koneksi->close(); 
?> 