<?php
session_start();
include 'koneksi.php';

// 1. Tangkap ID
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    die("Error: No ID Selected!");
}

// 2. Ambil data berita + Kategori (JOIN)
$query = "SELECT berita.*, kategori.nama_kategori 
          FROM berita 
          LEFT JOIN kategori ON berita.kategori_id = kategori.id 
          WHERE berita.id = $id";
          
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if(!$data){ die("Berita tidak ditemukan!"); }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['judul']; ?> - Portal Berita</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Merriweather:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* NAVBAR GRADASI (Sama seperti index) */
        .navbar {
            background: linear-gradient(135deg, #0d6efd, #0099ff) !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* KARTU UTAMA BERITA */
        .card-detail {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            background: white;
            margin-top: -50px; /* Efek overlap sedikit ke atas */
            position: relative;
            z-index: 10;
        }

        /* GAMBAR COVER */
        .cover-img-container {
            height: 400px;
            width: 100%;
            position: relative;
            background-color: #ddd;
        }
        .cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Filter gelap sedikit agar teks putih terbaca jika ada overlay */
            filter: brightness(0.9); 
        }

        /* TYPOGRAPHY BERITA */
        .news-title {
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.3;
            margin-bottom: 15px;
        }
        
        .news-meta {
            font-size: 0.9rem;
            color: #6c757d;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .news-content {
            font-family: 'Merriweather', serif; /* Font serif enak untuk baca panjang */
            font-size: 1.15rem;
            line-height: 1.9; /* Jarak antar baris lega */
            color: #2c3e50;
            text-align: justify;
        }

        /* DROP CAP (Huruf Pertama Besar) */
        .news-content::first-letter {
            float: left;
            font-size: 4.5rem;
            line-height: 0.8;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color: #0d6efd;
            padding-right: 15px;
            padding-top: 5px;
        }

        /* KOMENTAR SECTION */
        .comment-section {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 30px;
            margin-top: 30px;
        }
        
        .comment-bubble {
            background: #f8f9fa;
            border-radius: 15px;
            border-top-left-radius: 0; /* Ujung lancip ala chat */
            padding: 15px;
            position: relative;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">📰 TRPL 2024 Warning</a>
            <div class="ms-auto">
                <a href="index.php" class="btn btn-light text-primary fw-bold btn-sm rounded-pill px-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </nav>

    <div class="cover-img-container">
        <?php if($data['gambar'] != "") { ?>
            <img src="gambar/<?php echo $data['gambar']; ?>" class="cover-img">
        <?php } else { ?>
            <img src="https://via.placeholder.com/1200x600" class="cover-img">
        <?php } ?>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="card card-detail p-4 p-md-5">
                    
                    <div class="mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                            <?php echo $data['nama_kategori'] ?? 'Umum'; ?>
                        </span>
                    </div>

                    <h1 class="news-title display-5"><?php echo $data['judul']; ?></h1>
                    
                    <div class="news-meta d-flex align-items-center gap-4">
                        <span><i class="bi bi-calendar3 text-primary me-2"></i> <?php echo date('d F Y', strtotime($data['tanggal'])); ?></span>
                        <span><i class="bi bi-person-circle text-primary me-2"></i> Admin</span>
                        <span><i class="bi bi-eye text-primary me-2"></i> Dilihat pembaca</span>
                    </div>
                    
                    <div class="news-content mt-3">
                        <?php echo $data['isi']; ?>
                    </div>

                   <div class="mt-5 pt-4 border-top text-center">
                        
                        <h6 class="fw-bold mb-3">Ikuti Update Terbaru:</h6>
                        <a href="https://www.instagram.com/softwarejourney._?igsh=MXBzbHIwNzZlZjM3bQ==" 
                           target="_blank" 
                           class="btn btn-gradient-ig rounded-pill px-4 py-2 mb-4 text-white shadow-sm"
                           style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); border: none;">
                            <i class="bi bi-instagram me-2"></i> @softwarejourney._
                        </a>

                        <?php 
                            $url_sekarang = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $judul_berita = urlencode($data['judul']);
                        ?>

                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <span class="text-muted small me-2">Bagikan berita ini:</span>
                            
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_sekarang; ?>" 
                               target="_blank" class="btn btn-outline-primary rounded-circle" title="Share ke Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="https://api.whatsapp.com/send?text=<?php echo $judul_berita; ?>%0A<?php echo $url_sekarang; ?>" 
                               target="_blank" class="btn btn-outline-success rounded-circle" title="Share ke WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <a href="https://twitter.com/intent/tweet?text=<?php echo $judul_berita; ?>&url=<?php echo $url_sekarang; ?>" 
                               target="_blank" class="btn btn-outline-dark rounded-circle" title="Share ke X">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="comment-section">
                    <h4 class="fw-bold mb-4"><i class="bi bi-chat-dots-fill text-warning me-2"></i> Diskusi Pembaca</h4>
                    
                    <form action="proses_komentar.php" method="POST" class="mb-5">
                        <input type="hidden" name="berita_id" value="<?php echo $data['id']; ?>">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" name="nama" class="form-control bg-light border-0 py-3 px-4 rounded-pill" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" name="isi" class="form-control bg-light border-0 py-3 px-4 rounded-pill" placeholder="Tulis pendapatmu..." required>
                                    <button class="btn btn-primary rounded-pill px-4 ms-2" type="submit"><i class="bi bi-send-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    $id_berita = $data['id'];
                    $query_komen = "SELECT * FROM komentar WHERE berita_id = $id_berita ORDER BY id DESC";
                    $result_komen = mysqli_query($koneksi, $query_komen);
                    
                    if(mysqli_num_rows($result_komen) > 0){
                        while($komen = mysqli_fetch_assoc($result_komen)){
                    ?>
                        <div class="d-flex mb-4 animation-fade">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($komen['nama_pengirim']); ?>&background=random&rounded=true" 
                                 class="flex-shrink-0 me-3" width="50">
                            <div>
                                <div class="mb-1">
                                    <span class="fw-bold text-dark"><?php echo $komen['nama_pengirim']; ?></span>
                                    <span class="text-muted small ms-2">• <?php echo date('d M H:i', strtotime($komen['tanggal'])); ?></span>
                                </div>
                                <div class="comment-bubble">
                                    <?php echo nl2br(htmlspecialchars($komen['isi_komentar'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        } 
                    } else {
                        echo "<div class='text-center py-5 opacity-50'><i class='bi bi-chat-square-text display-1'></i><p class='mt-3'>Belum ada komentar.</p></div>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        &copy; TRPL 2024 Warning.
    </footer>

</body>
</html>