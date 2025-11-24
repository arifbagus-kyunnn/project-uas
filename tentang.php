<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - Portal Berita</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff; /* Background Putih Bersih */
            color: #333;
            overflow-x: hidden; /* Hilangkan scroll samping karena awan bergerak */
            min-height: 100vh;
            position: relative;
        }

        /* NAVBAR (Konsisten) */
        .navbar {
            background: linear-gradient(135deg, #0d6efd, #0099ff) !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 100; /* Navbar harus paling atas */
        }

        /* --- ANIMASI AWAN ABU-ABU --- */
        #background-wrap {
            bottom: 0;
            left: 0;
            padding-top: 50px;
            position: fixed;
            right: 0;
            top: 0;
            z-index: -1; /* Di belakang konten */
        }

        /* Keyframes untuk gerakan awan */
        @keyframes animateCloud {
            0% { margin-left: -1000px; }
            100% { margin-left: 100%; }
        }

        /* Bentuk Dasar Awan */
        .cloud {
            background: #f0f0f0; /* ABU-ABU MUDA (Soft) */
            border-radius: 100px;
            box-shadow: 0 8px 5px rgba(0, 0, 0, 0.05); /* Bayangan halus */
            height: 120px;
            position: relative;
            width: 350px;
        }

        /* Membuat tonjolan awan menggunakan pseudo-elements */
        .cloud:after, .cloud:before {
            background: #f0f0f0; /* Warna harus sama dengan .cloud */
            content: '';
            position: absolute;
            z-index: -1;
        }
        .cloud:after {
            border-radius: 100px;
            height: 100px;
            left: 50px;
            top: -50px;
            width: 100px;
        }
        .cloud:before {
            border-radius: 200px;
            height: 180px;
            left: 110px;
            right: auto;
            top: -90px;
            width: 180px;
        }

        /* Variasi Kecepatan & Ukuran Awan */
        .x1 {
            animation: animateCloud 35s linear infinite;
            transform: scale(0.65);
        }
        .x2 {
            animation: animateCloud 20s linear infinite;
            transform: scale(0.3);
            opacity: 0.6; /* Lebih transparan */
        }
        .x3 {
            animation: animateCloud 30s linear infinite;
            transform: scale(0.5);
        }
        .x4 {
            animation: animateCloud 18s linear infinite;
            transform: scale(0.4);
            opacity: 0.7;
        }
        .x5 {
            animation: animateCloud 25s linear infinite;
            transform: scale(0.55);
        }

        /* Konten Utama */
        .container-content {
            position: relative;
            z-index: 10; /* Di depan awan */
        }

        /* KARTU ANGGOTA (Tetap Putih tapi dengan Shadow) */
        .card-team {
            border: none;
            border-radius: 15px;
            background: white;
            /* Shadow lebih tebal agar kontras dengan awan */
            box-shadow: 0 10px 25px rgba(0,0,0,0.08); 
            transition: all 0.3s ease;
        }
        .card-team:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .avatar-img {
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div id="background-wrap">
        <div class="x1">
            <div class="cloud"></div>
        </div>
        <div class="x2">
            <div class="cloud"></div>
        </div>
        <div class="x3">
            <div class="cloud"></div>
        </div>
        <div class="x4">
            <div class="cloud"></div>
        </div>
        <div class="x5">
            <div class="cloud"></div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">📰 TRPL2024Warning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="tentang.php">Tentang</a></li>
                    
                    <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){ ?>
                        <li class="nav-item"><a class="nav-link text-warning" href="tambah.php">Tulis Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-content">
        
        <div class="text-center py-5">
            <h1 class="fw-bold display-5 text-primary mb-3">Tentang Project</h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Website Portal Berita ini dikembangkan sebagai pemenuhan Tugas Akhir (UAS) mata kuliah 
                <strong>Pemrograman Web</strong>.
            </p>
        </div>

        <div class="container pb-5">
            <h3 class="text-center mb-5 fw-bold text-dark">
                🚀 Warning (Kelompok 2)
            </h3>

            <div class="row justify-content-center">
                
                <?php
                $anggota = [
                    ["nama" => "Bagus Arif Setiawan", "role" => "Fullstack Developer", "foto" => "bagus.jpeg"],
                    ["nama" => "Sofyan M. La'ana", "role" => "Database Administrator", "foto" => "sofyan.jpg"],
                    ["nama" => "Nurul Pratiwi", "role" => "UI/UX Designer", "foto" => "nurul.jpeg"],
                    ["nama" => "Irma Hangio", "role" => "Content Writer", "foto" => "irma.jpeg"],
                    ["nama" => "Alya Cahyani Bolindatu", "role" => "Content Writer", "foto" => "alya.jpg"]
                ];

                foreach($anggota as $orang) {
                    $path_foto = "gambar/" . $orang['foto'];
                    if(file_exists($path_foto) && $orang['foto'] != "") {
                        $src_gambar = $path_foto;
                    } else {
                        $src_gambar = "https://ui-avatars.com/api/?name=" . urlencode($orang['nama']) . "&background=random&size=128&color=fff";
                    }
                ?>
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card card-team h-100 text-center py-4">
                            <div class="card-body">
                                
                                <img src="<?php echo $src_gambar; ?>" 
                                     class="rounded-circle mb-4 avatar-img" 
                                     style="object-fit: cover;" 
                                     width="120" height="120">
                                
                                <h5 class="card-title fw-bold mb-2 text-dark"><?php echo $orang['nama']; ?></h5>
                                
                                <div class="mb-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Mahasiswa</span>
                                </div>

                                <span class="small text-muted fw-bold d-inline-block">
                                    <?php echo $orang['role']; ?>
                                </span>

                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            
            <div class="text-center mt-5">
                <a href="index.php" class="btn btn-outline-primary rounded-pill px-4 fw-bold">&larr; Kembali ke Home</a>
            </div>

        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-auto position-relative" style="z-index: 10;">
        &copy; TRPL 2024 Warning.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>