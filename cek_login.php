<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); // Enkripsi input user dengan md5 agar cocok dengan database

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if(mysqli_num_rows($result) > 0){
    // Jika cocok, buat session
    $_SESSION['status'] = "login";
    header("Location: index.php");
} else {
    header("Location: login.php?pesan=gagal");
}
?>