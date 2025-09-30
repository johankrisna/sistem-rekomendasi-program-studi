<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Program Studi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset dan Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header Sederhana */
        .app-header {
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            padding: 1rem 2rem;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo-icon {
            font-size: 1.8rem;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        /* Navigasi Sederhana */
        .nav-menu {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }
        
        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .nav-menu {
                flex-direction: column;
                width: 100%;
                display: none;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .mobile-toggle {
                display: block;
                position: absolute;
                right: 1.5rem;
                top: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header class="app-header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="logo-text">SPK Program Studi</div>
            </div>
            
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav class="nav-menu" id="navMenu">
                <a href="<?= url('') ?>" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="<?= url('daftarSiswa') ?>" class="nav-link">
                    <i class="fas fa-user-graduate"></i> Daftar Siswa
                </a>
                <a href="<?= url('addProdi') ?>" class="nav-link">
                    <i class="fas fa-plus-circle"></i> Tambah Prodi
                </a>
                <a href="<?= url('daftarProdi') ?>" class="nav-link">
                    <i class="fas fa-list"></i> Daftar Prodi
                </a>
            </nav>
        </div>
    </header>

    <script>
        // Toggle menu mobile
        document.getElementById('mobileToggle').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
            
            // Ganti ikon
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Sembunyikan menu saat diklik di luar (opsional)
        document.addEventListener('click', function(e) {
            const navMenu = document.getElementById('navMenu');
            const mobileToggle = document.getElementById('mobileToggle');
            
            if (!navMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                navMenu.classList.remove('active');
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>
</html>