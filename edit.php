<?php
session_start();
if($_SESSION['status'] != "login"){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data berita berdasarkan ID
$query = "SELECT * FROM berita WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Cek jika data tidak ditemukan
if(mysqli_num_rows($result) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
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
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">✏️ Edit Berita</h4>
            </div>
            <div class="card-body">
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            // Ambil semua kategori
                            $query_kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                            while($k = mysqli_fetch_assoc($query_kat)){
                                
                                // LOGIKA PENTING: Cek jika ID kategori ini sama dengan ID kategori di berita
                                if($k['id'] == $data['kategori_id']){
                                    $select = "selected"; // Tambahkan atribut selected
                                } else {
                                    $select = "";
                                }
                            ?>
                                <option value="<?php echo $k['id']; ?>" <?php echo $select; ?>>
                                    <?php echo $k['nama_kategori']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        <?php if($data['gambar'] != "") { ?>
                            <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px; height: 80px; object-fit: cover; border-radius: 5px;" class="mb-2 border">
                        <?php } else { ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Gambar (Opsional)</label>
                        <input type="file" name="foto" class="form-control">
                        <div class="form-text text-danger">*Biarkan kosong jika tidak ingin mengganti gambar.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" id="editor" class="form-control" rows="8" required><?php echo $data['isi']; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Update Berita</button>
                    </div>

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