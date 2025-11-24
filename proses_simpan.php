<?php
session_start();
if($_SESSION['status'] != "login"){ header("Location: login.php"); exit; }
include 'koneksi.php';

$judul       = $_POST['judul'];
$isi         = $_POST['isi'];
$kategori_id = $_POST['kategori_id']; // <--- TANGKAP DATA KATEGORI

// (Kode Upload Gambar Tetap Sama, saya persingkat disini)
$rand = rand();
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext, array('png','jpg','jpeg','gif'))) {
    header("Location: tambah.php?alert=gagal_ekstensi");
} else {
    $xx = $rand.'_'.$filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$xx);
    
    // UPDATE QUERY: Tambahkan kategori_id ke dalam INSERT
    $query = "INSERT INTO berita (judul, isi, gambar, kategori_id) VALUES ('$judul', '$isi', '$xx', '$kategori_id')";
    
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>