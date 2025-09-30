<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekomendasi Program Studi</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Global Style */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f2f6fc url('https://www.transparenttextures.com/patterns/diamond-weave-light.png');
            background-size: 30px;
            color: #333;
        }

        /* Header Styling with Gradient */
        .header {
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: #fff;
            text-align: center;
            padding: 2rem;
            font-family: 'Raleway', sans-serif;
            font-size: 2.7rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Navigation Menu */
        .nav {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 3rem auto;
            flex-wrap: wrap;
        }

        /* Parallelogram Button */
        .parallelogram {
            background: #2980b9;
            color: #fff;
            padding: 1.2rem 2.5rem;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            border: 2px solid transparent;
            border-radius: 10px;
            box-shadow: inset 0px 0px 4px rgba(255, 255, 255, 0.2), 0px 6px 10px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .parallelogram::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skew(45deg);
            transition: all 0.5s ease;
        }

        .parallelogram:hover::before {
            left: 100%;
        }

        .parallelogram:hover {
            background: #1abc9c;
            color: #fff;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        }

        /* Icon on Hover */
        .parallelogram i {
            margin-right: 8px;
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }

        .parallelogram:hover i {
            opacity: 1;
            margin-right: 12px;
        }

        /* Responsive Adjustment */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            .parallelogram {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
    <!-- FontAwesome CDN for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <div class="header">Sistem Rekomendasi Program Studi</div>

    <!-- Navigation -->
    <div class="nav">
        <a href="<?= url('') ?>" class="parallelogram"><i class="fas fa-home"></i>Home</a>
        <a href="<?= url('daftarSiswa') ?>" class="parallelogram"><i class="fas fa-user-graduate"></i>Daftar Siswa</a>
        <a href="<?= url('addProdi') ?>" class="parallelogram"><i class="fas fa-plus-circle"></i>Tambah Program Studi</a>
        <a href="<?= url('daftarProdi') ?>" class="parallelogram"><i class="fas fa-list"></i>Daftar Program Studi</a>
    </div>
</body>
</html>
