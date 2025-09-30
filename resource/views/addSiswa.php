<?php 
    require_once('header.php');
    require_once('data.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Siswa - SPK Program Studi</title>
    <style>
        /* Form Styles */
        .form-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        .form-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #2c3e50;
            position: relative;
            font-weight: 700;
        }
        
        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #1abc9c);
            border-radius: 2px;
        }
        
        .form-card {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, #3498db, #1abc9c);
        }
        
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.1rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2);
        }
        
        .form-note {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-style: italic;
            margin-top: 0.5rem;
            display: block;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .form-section-title {
            font-size: 1.4rem;
            color: #3498db;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e0e6ed;
        }
        
        .form-select {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            background-color: white;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%233498db' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2);
        }
        
        .btn-submit {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 2rem auto 0;
            padding: 1.1rem;
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.4);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #3498db;
            font-size: 1.2rem;
        }
        
        .input-icon input {
            padding-left: 3.5rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .form-card {
                padding: 1.8rem;
            }
            
            .form-title {
                font-size: 1.7rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .form-card {
                padding: 1.5rem 1.2rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
            
            .form-group label {
                font-size: 1rem;
            }
            
            .btn-submit {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Form Pengisian Data Siswa</h1>
        
        <form method="POST" action="insertSiswa">
            <div class="form-card">
                <div class="form-group input-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-input" placeholder="Nama Lengkap Siswa" name="nama" required>
                </div>
            </div>
            
            <div class="form-card">
                <h2 class="form-section-title">Nilai Akademik</h2>
                <div class="form-note">*Kosongkan nilai bila mata pelajaran tidak terkait</div>
                
                <div class="form-grid">
                    <?php foreach ($dtNilai as $val): ?>
                    <div class="form-group">
                        <label for="<?= strtolower($val) ?>"><?= $val ?></label>
                        <input type="number" step="any" class="form-input" placeholder="Masukkan nilai <?= $val ?>" 
                               name="<?= strtolower($val) ?>" id="<?= strtolower($val) ?>">
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            
            <div class="form-card">
                <h2 class="form-section-title">Informasi Tambahan</h2>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="jurusan">Asal Jurusan</label>
                        <select class="form-select" name="jurusan" id="jurusan">
                            <?php $i = 0; foreach ($dtJurusan as $value): ?>
                                <option value="<?= $i ?>"><?= $value ?></option>
                            <?php $i++; endforeach ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="minat">Minat</label>
                        <select class="form-select" name="minat" id="minat">
                            <?php $i = 0; foreach ($dtMinat as $value): ?>
                                <option value="<?= $i ?>"><?= $value ?></option>
                            <?php $i++; endforeach ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ekonomi">Kondisi Ekonomi</label>
                        <select class="form-select" name="ekonomi" id="ekonomi">
                            <?php $i = 0; foreach ($dtEkonomi as $value): ?>
                                <option value="<?= $i ?>"><?= $value ?></option>
                            <?php $i++; endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Kirim Data Siswa
            </button>
        </form>
    </div>

    <script>
        // Animasi untuk form saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const formCards = document.querySelectorAll('.form-card');
            
            formCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 300 + (index * 200));
            });
        });
    </script>
</body>
</html>