<?php 
session_start();
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <title>Portal Berita Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

        /* 1. ANIMASI MASUK (FADE IN) */
        /* Membuat website muncul perlahan agar terasa smooth */
        body {
            animation: fadeIn 0.8s ease-in-out;
            background-color: #f4f6f9; /* Warna background sedikit abu-abu soft */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* 2. NAVBAR GRADASI KEREN */
        /* Mengganti warna biru standar dengan gradasi modern */
        .navbar {
            background: linear-gradient(135deg, #0d6efd, #0099ff) !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* 3. KARTU BERITA (CARD) */
        .card {
            transition: all 0.3s ease; /* Wajib ada agar animasi halus */
            border-radius: 12px; /* Sudut lebih tumpul */
            overflow: hidden; /* Agar gambar tidak keluar jalur */
            border: none; /* Hilangkan garis pinggir standar */
        }

        /* EFEK SAAT MOUSE DIARAHKAN KE KARTU (HOVER) */
        .card:hover {
            transform: translateY(-8px); /* Naik ke atas sedikit */
            box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important; /* Bayangan makin tebal */
        }

        /* 4. PERCANTIK GAMBAR */
        .img-fluid {
            transition: transform 0.5s ease;
        }
        /* Saat kartu di-hover, gambar akan zoom-in sedikit */
        .card:hover .img-fluid {
            transform: scale(1.05);
        }

        /* 5. KATEGORI & SIDEBAR */
        .list-group-item {
            transition: background 0.2s;
            border-left: 3px solid transparent;
        }
        .list-group-item:hover {
            background-color: #f8f9fa;
            border-left: 3px solid #0d6efd; /* Garis biru di kiri saat hover */
            padding-left: 25px; /* Geser teks ke kanan sedikit */
        }
        
        /* Badge Kategori jadi bulat lonjong */
        .badge {
            border-radius: 20px; 
            font-weight: normal;
            letter-spacing: 0.5px;
        }

        /* 6. TOMBOL (BUTTON) */
        .btn-primary {
            background: linear-gradient(to right, #0d6efd, #0056b3);
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #0056b3, #004494);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }

        /* Judul Section dengan garis bawah cantik */
        h4 span.text-primary {
            background: -webkit-linear-gradient(45deg, #0d6efd, #00d2ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">📰 TRPL 2024 Warning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
                    
                    <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){ ?>
                        <li class="nav-item"><a class="nav-link text-warning" href="tambah.php">Tulis Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
                <form class="d-flex ms-3" action="index.php" method="GET">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Cari berita..." aria-label="Search">
                    <button class="btn btn-light text-primary fw-bold" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            
            <div class="col-md-8">

                <?php
                // Logika Filter Kategori
                $where = "";
                $judul_halaman = "Update Terkini"; // Judul default

                if(isset($_GET['cari'])){
                    // 1. Jika user sedang mencari
                    $keyword = $_GET['cari'];
                    // Pakai LIKE %...% agar mencari teks yang 'mirip' atau 'mengandung' kata tersebut
                    $where = "WHERE berita.judul LIKE '%$keyword%' OR berita.isi LIKE '%$keyword%'";
                    $judul_halaman = "Hasil Pencarian: <em>'$keyword'</em>";
                
                } elseif(isset($_GET['kategori_id'])){
                    // 2. Jika user memilih kategori
                    $kat_id = $_GET['kategori_id'];
                    $where = "WHERE berita.kategori_id = $kat_id";
                }

                // Tampilkan Judul Halaman yang Dinamis
                echo '<h4 class="mb-3 border-bottom pb-2"><span class="text-primary">'. $judul_halaman .'</span></h4>';

                // Query Utama (Gabungan)
                $query = "SELECT berita.*, kategori.nama_kategori 
                          FROM berita 
                          JOIN kategori ON berita.kategori_id = kategori.id 
                          $where
                          ORDER BY berita.id DESC";
                          
                $result = mysqli_query($koneksi, $query);
                
                // Cek jika data ditemukan
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if($row['gambar'] != "") { ?>
                                    <img src="gambar/<?php echo $row['gambar']; ?>" class="img-fluid rounded-start h-100" style="object-fit: cover; min-height: 200px;">
                                <?php } else { ?>
                                    <img src="https://via.placeholder.com/300" class="img-fluid rounded-start h-100" style="object-fit: cover;">
                                <?php } ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-warning text-dark mb-2"><?php echo $row['nama_kategori']; ?></span>
                                    <h5 class="card-title"><a href="detail.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark"><?php echo $row['judul']; ?></a></h5>
                                    <p class="card-text text-muted small">
                                    <?php echo substr(strip_tags($row['isi']), 0, 100); ?>...</p>
                                    <p class="card-text"><small class="text-muted">📅 <?php echo $row['tanggal']; ?></small></p>
                                    
                                    <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){ ?>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?');">Hapus</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                    } 
                } else {
                    echo "<div class='alert alert-info'>Belum ada berita di kategori ini.</div>";
                }
                ?>
            </div>

            <div class="col-md-4">
                
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-white fw-bold">📂 Kategori</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="index.php" class="text-decoration-none text-dark">Semua Berita</a></li>
                        <?php
                        $q_kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while($k = mysqli_fetch_assoc($q_kat)){
                        ?>
                            <li class="list-group-item">
                                <a href="index.php?kategori_id=<?php echo $k['id']; ?>" class="text-decoration-none text-secondary">
                                    👉 <?php echo $k['nama_kategori']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

               <div class="card bg-primary text-white text-center p-4 mb-4">
                    <h5 class="mb-3">Hubungi Kami</h5>
                    <p class="small">Tertarik kerjasama? Kunjungi Instagram kami:</p>
                    
                    <a href="https://www.instagram.com/softwarejourney._?igsh=MXBzbHIwNzZlZjM3bQ==" 
                       target="_blank" 
                       class="btn btn-light text-primary w-100 fw-bold py-2">
                        
                        <i class="bi bi-instagram" style="font-size: 1.5rem; vertical-align: middle; margin-right: 8px;"></i> 
                        
                        <span style="vertical-align: middle;">@softwarejourney._</span>
                    </a>
                </div>

                <br>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-bold border-bottom">
                        💬 Komentar Netizen
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        
                        <?php
                        // Query JOIN: Ambil komentar + Judul Berita yang dikomentari
                        // Diurutkan dari yang paling baru (DESC), dibatasi 5 saja (LIMIT 5)
                        $query_widget = "SELECT komentar.*, berita.judul 
                                         FROM komentar 
                                         JOIN berita ON komentar.berita_id = berita.id 
                                         ORDER BY komentar.id DESC 
                                         LIMIT 5";
                                         
                        $result_widget = mysqli_query($koneksi, $query_widget);

                        if(mysqli_num_rows($result_widget) > 0){
                            while($komen = mysqli_fetch_assoc($result_widget)){
                        ?>
                            <li class="list-group-item py-3">
                                <div class="d-flex align-items-start">
                                    
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($komen['nama_pengirim']); ?>&background=random&size=64" 
                                         class="rounded-circle me-2" width="35" height="35">
                                    
                                    <div class="w-100">
                                        <span class="fw-bold text-dark small"><?php echo $komen['nama_pengirim']; ?></span>
                                        
                                        <span class="text-muted small" style="font-size: 0.75rem;">
                                            di <a href="detail.php?id=<?php echo $komen['berita_id']; ?>" class="text-decoration-none fw-bold">
                                                <?php echo substr($komen['judul'], 0, 15); ?>...
                                            </a>
                                        </span>

                                        <div class="bg-light p-2 mt-1 rounded small text-secondary fst-italic">
                                            "<?php echo substr(strip_tags($komen['isi_komentar']), 0, 45); ?>..."
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>
                        <?php 
                            }
                        } else {
                            echo "<li class='list-group-item text-center text-muted small py-4'>Belum ada komentar.</li>";
                        }
                        ?>

                    </ul>
                </div>

            </div>

        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        &copy; TRPL 2024 Warning.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>