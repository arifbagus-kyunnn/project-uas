<?php
include 'koneksi.php';

// 1. Cek apakah tombol diklik dan data ada?
if($_POST){
    
    // Tangkap data
    $berita_id = $_POST['berita_id'];
    $nama      = htmlspecialchars($_POST['nama']);
    $isi       = htmlspecialchars($_POST['isi']);

    // Cek apakah ID Berita kosong?
    if(empty($berita_id)){
        die("Error: ID Berita tidak ditemukan. Pastikan form di detail.php benar.");
    }

    // 2. Masukkan ke Database
    $query = "INSERT INTO komentar (berita_id, nama_pengirim, isi_komentar) VALUES ('$berita_id', '$nama', '$isi')";

    // 3. Eksekusi dan Cek Error
    if(mysqli_query($koneksi, $query)){
        // Berhasil -> Balik ke halaman detail
        header("Location: detail.php?id=$berita_id");
    } else {
        // Gagal -> Tampilkan error MySQL yang asli
        die("Gagal menyimpan komentar: " . mysqli_error($koneksi)); 
    }

} else {
    echo "Akses dilarang. Harus lewat form.";
}
?>