<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #4e54c8;  
            /* Gradasi Biru Ceria */
            background: linear-gradient(to left, #8f94fb, #4e54c8);  
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* --- ANIMASI BUBBLES / KOTAK MELAYANG --- */
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            z-index: 0; /* Di belakang kartu */
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        /* Mengatur posisi dan ukuran bubbles yang berbeda-beda */
        .circles li:nth-child(1){ left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .circles li:nth-child(2){ left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .circles li:nth-child(3){ left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .circles li:nth-child(4){ left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .circles li:nth-child(5){ left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .circles li:nth-child(6){ left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .circles li:nth-child(7){ left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .circles li:nth-child(8){ left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .circles li:nth-child(9){ left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .circles li:nth-child(10){ left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animate {
            0%{
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100%{
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* --- KARTU LOGIN (CLEAN WHITE) --- */
        .card-login {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 400px;
            z-index: 10; /* Di depan animasi */
            border: none;
            padding: 20px;
        }

        .header-login {
            color: #4e54c8;
            font-weight: 700;
        }

        .form-control {
            background: #f0f2f5;
            border: none;
            padding: 12px 15px;
            padding-left: 45px; /* Ruang ikon */
            border-radius: 10px;
        }
        .form-control:focus {
            background: #e8f0fe;
            box-shadow: none;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #4e54c8;
            font-size: 1.1rem;
        }
        .input-wrapper { position: relative; }

        .btn-login {
            background: #4e54c8;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(78, 84, 200, 0.3);
            background: linear-gradient(to right, #8f94fb, #4e54c8);
        }
    </style>
</head>
<body>

    <ul class="circles">
        <li></li><li></li><li></li><li></li><li></li>
        <li></li><li></li><li></li><li></li><li></li>
    </ul>

    <div class="card card-login">
        <div class="card-body p-4">
            
            <div class="text-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                    <i class="bi bi-shield-lock-fill text-primary fs-1"></i>
                </div>
                <h3 class="header-login">Welcome Back!</h3>
                <p class="text-muted small">Masukkan akun admin Anda</p>
            </div>

            <?php if(isset($_GET['pesan'])){ ?>
                <div class="alert alert-danger py-2 small text-center border-0 rounded-3">
                    <i class="bi bi-exclamation-circle me-1"></i> Login Gagal! Cek data Anda.
                </div>
            <?php } ?>

            <form action="cek_login.php" method="POST">
                
                <div class="mb-3 input-wrapper">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                </div>

                <div class="mb-4 input-wrapper">
                    <i class="bi bi-key input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-login py-2 text-white">LOGIN SEKARANG</button>
                    <a href="index.php" class="btn btn-link text-decoration-none text-muted small mt-2">
                        <i class="bi bi-arrow-left"></i> Kembali ke Website
                    </a>
                </div>

            </form>

        </div>
    </div>

</body>
</html>