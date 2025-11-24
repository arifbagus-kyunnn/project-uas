<?php
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Query Hapus
$query = "DELETE FROM berita WHERE id = '$id'";

// 3. Eksekusi
if(mysqli_query($koneksi, $query)) {
    header("Location: index.php"); // Balik ke halaman depan
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>