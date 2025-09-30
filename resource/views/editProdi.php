<?php 
    require_once('header.php');
    require_once('data.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Studi - SPK Program Studi</title>
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
        
        .criteria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }
        
        .criteria-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #eef1f5;
            transition: all 0.3s ease;
        }
        
        .criteria-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-color: #3498db;
        }
        
        .criteria-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .criteria-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(26, 188, 156, 0.1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            color: #3498db;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        .criteria-title {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.1rem;
        }
        
        .btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 1.1rem 2.5rem;
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
            margin-top: 1rem;
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
        
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 1.1rem 2.5rem;
            background: #f8f9fa;
            color: #3498db;
            border: 2px solid #3498db;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .cancel-btn:hover {
            background: #eef7ff;
            transform: translateY(-3px);
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
            
            .criteria-grid {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-submit, .cancel-btn {
                width: 100%;
                max-width: 300px;
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
            
            .criteria-card {
                padding: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Edit Program Studi</h1>
        
        <form method="POST" action="<?= url('updateProdi/'.$prodi->id) ?>">
            <div class="form-card">
                <div class="form-group input-icon">
                    <i class="fas fa-graduation-cap"></i>
                    <input type="text" class="form-input" placeholder="Nama Program Studi" 
                           name="nama" value="<?= $prodi->nama ?>" required>
                </div>
            </div>
            
            <div class="form-card">
                <h2 class="form-section-title">Beban Nilai Akademik</h2>
                <div class="form-note">*Masukkan bobot nilai untuk setiap mata pelajaran</div>
                
                <div class="criteria-grid">
                    <?php foreach ($dtNilai as $val): 
                        $fieldName = str_replace(' ', '_', strtolower($val));
                    ?>
                    <div class="criteria-card">
                        <div class="criteria-header">
                            <div class="criteria-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="criteria-title"><?= $val ?></div>
                        </div>
                        <input type="number" step="any" required class="form-input" 
                               placeholder="Bobot nilai <?= $val ?>" 
                               name="<?= strtolower($val) ?>" 
                               value="<?= $nilai[$fieldName] ?>">
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            
            <div class="form-card">
                <h2 class="form-section-title">Beban Kriteria Lainnya</h2>
                
                <div class="criteria-grid">
                    <!-- Jurusan -->
                    <div class="criteria-card">
                        <div class="criteria-header">
                            <div class="criteria-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="criteria-title">Jurusan</div>
                        </div>
                        <?php foreach ($dtJurusan as $val): 
                            $fieldName = str_replace(' ', '_', strtolower($val));
                        ?>
                        <div class="form-group">
                            <label><?= $val ?></label>
                            <input type="number" step="any" required class="form-input" 
                                   placeholder="Bobot <?= $val ?>" 
                                   name="<?= strtolower($val) ?>" 
                                   value="<?= $jurusan[$fieldName] ?>">
                        </div>
                        <?php endforeach ?>
                    </div>
                    
                    <!-- Minat -->
                    <div class="criteria-card">
                        <div class="criteria-header">
                            <div class="criteria-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="criteria-title">Minat</div>
                        </div>
                        <?php foreach ($dtMinat as $val): 
                            $fieldName = strtolower($val);
                        ?>
                        <div class="form-group">
                            <label><?= $val ?></label>
                            <input type="number" step="any" required class="form-input" 
                                   placeholder="Bobot <?= $val ?>" 
                                   name="<?= $fieldName ?>" 
                                   value="<?= $minat[$fieldName] ?>">
                        </div>
                        <?php endforeach ?>
                    </div>
                    
                    <!-- Ekonomi -->
                    <div class="criteria-card">
                        <div class="criteria-header">
                            <div class="criteria-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="criteria-title">Ekonomi</div>
                        </div>
                        <?php foreach ($dtEkonomi as $val): 
                            $fieldName = strtolower($val);
                        ?>
                        <div class="form-group">
                            <label><?= $val ?></label>
                            <input type="number" step="any" required class="form-input" 
                                   placeholder="Bobot <?= $val ?>" 
                                   name="<?= $fieldName ?>" 
                                   value="<?= $ekonomi[$fieldName] ?>">
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan perubahan?')">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="<?= url('daftarProdi') ?>" class="cancel-btn">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        // Animasi untuk form saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const formCards = document.querySelectorAll('.form-card');
            const criteriaCards = document.querySelectorAll('.criteria-card');
            
            formCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 300 + (index * 200));
            });
            
            criteriaCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(15px)';
                card.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 600 + (index * 100));
            });
            
            // Konfirmasi sebelum submit
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                if (!confirm('Apakah Anda yakin ingin menyimpan perubahan program studi?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>