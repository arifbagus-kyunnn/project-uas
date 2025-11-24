<?php
session_start();
if($_SESSION['status'] != "login"){ header("Location: login.php"); exit; }
include 'koneksi.php';

$id          = $_POST['id'];
$judul       = $_POST['judul'];
$isi         = $_POST['isi'];
$kategori_id = $_POST['kategori_id']; // Tangkap Kategori
$gambar_baru = $_FILES['foto']['name'];

// Cek apakah user ingin mengganti gambar?
if($gambar_baru != "") {
    // --- JIKA GAMBAR DIGANTI ---
    
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar_baru);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_baru;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        
        // PERBAIKAN 1: Masukkan kategori_id ke query ini juga
        $query = "UPDATE berita SET judul='$judul', isi='$isi', gambar='$nama_gambar_baru', kategori_id='$kategori_id' WHERE id='$id'";
        
        if(mysqli_query($koneksi, $query)){
            header("Location: index.php");
        } else {
            echo "Gagal update dengan gambar: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Ekstensi gambar tidak diperbolehkan!');window.location='edit.php?id=$id';</script>";
    }

} else {
    // --- JIKA GAMBAR TIDAK DIGANTI (Hanya update teks & kategori) ---
    
    // PERBAIKAN 2: Hapus 'gambar=...' karena kita pakai gambar lama, tapi UPDATE kategori_id
    $query = "UPDATE berita SET judul='$judul', isi='$isi', kategori_id='$kategori_id' WHERE id='$id'";

    if(mysqli_query($koneksi, $query)){
        header("Location: index.php");
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}
?>