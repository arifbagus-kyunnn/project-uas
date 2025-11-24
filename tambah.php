<?php
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Opsional: Membuat navbar sedikit lebih tebal agar gagah */
        .navbar-brand {
            font-weight: 700; 
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5" style="max-width: 800px;">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">✏️ Tulis Berita Baru</h4>
            </div>
            <div class="card-body">
                <form action="proses_simpan.php" method="POST" enctype="multipart/form-data">
    
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            // Ambil data kategori dari database
                            $query_kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                            while($k = mysqli_fetch_assoc($query_kat)){
                            ?>
                                <option value="<?php echo $k['id']; ?>">
                                    <?php echo $k['nama_kategori']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" id="editor" class="form-control" rows="8"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Berita</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                 </form>
            </div>
        </div>
    </div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>