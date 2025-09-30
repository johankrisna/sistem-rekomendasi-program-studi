<?php 
    require_once('header.php'); 
    require_once('data.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Studi - SPK Program Studi</title>
    <style>
        /* Program Study List Styles */
        .program-list-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        .list-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #2c3e50;
            position: relative;
            font-weight: 700;
        }
        
        .list-title::after {
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
        
        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #1abc9c, #3498db);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.3);
        }
        
        .add-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(26, 188, 156, 0.4);
        }
        
        .search-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 300px;
        }
        
        .search-box i {
            color: #3498db;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }
        
        .search-box input {
            border: none;
            outline: none;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            padding: 0.5rem 0;
        }
        
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .program-card {
            background: white;
            border-radius: 16px;
            padding: 1.8rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-top: 4px solid #3498db;
        }
        
        .program-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        
        .program-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #1abc9c);
        }
        
        .program-number {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #3498db;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .program-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-right: 40px;
        }
        
        .program-criteria {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .program-criteria i {
            width: 24px;
            color: #3498db;
            font-size: 1.1rem;
        }
        
        .program-criteria span {
            font-size: 0.95rem;
            color: #555;
        }
        
        .program-actions {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.5rem;
            border-top: 1px solid #eee;
            padding-top: 1.2rem;
        }
        
        .program-action {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.7rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .edit-action {
            background: rgba(46, 204, 113, 0.1);
            color: #27ae60;
            border: 1px solid rgba(46, 204, 113, 0.3);
        }
        
        .delete-action {
            background: rgba(231, 76, 60, 0.1);
            color: #c0392b;
            border: 1px solid rgba(231, 76, 60, 0.3);
        }
        
        .program-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .no-data {
            text-align: center;
            padding: 3rem;
            color: #7f8c8d;
            font-style: italic;
            grid-column: 1 / -1;
        }
        
        .no-data i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }
        
        .program-count {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            color: #3498db;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            margin-top: 1.5rem;
            grid-column: 1 / -1;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .program-card {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }
        
        .program-card:nth-child(1) { animation-delay: 0.1s; }
        .program-card:nth-child(2) { animation-delay: 0.2s; }
        .program-card:nth-child(3) { animation-delay: 0.3s; }
        .program-card:nth-child(4) { animation-delay: 0.4s; }
        .program-card:nth-child(5) { animation-delay: 0.5s; }
        .program-card:nth-child(6) { animation-delay: 0.6s; }
        .program-card:nth-child(7) { animation-delay: 0.7s; }
        .program-card:nth-child(8) { animation-delay: 0.8s; }
        .program-card:nth-child(9) { animation-delay: 0.9s; }
        .program-card:nth-child(10) { animation-delay: 1.0s; }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .list-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .add-btn {
                width: 100%;
                justify-content: center;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .program-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 480px) {
            .program-grid {
                grid-template-columns: 1fr;
            }
            
            .program-name {
                font-size: 1.3rem;
            }
            
            .program-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="program-list-container">
        <h1 class="list-title">Daftar Program Studi</h1>
        
        <div class="list-header">
            <a href="<?= url('addProdi') ?>" class="add-btn">
                <i class="fas fa-plus-circle"></i> Tambah Program Studi
            </a>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari program studi...">
            </div>
        </div>
        
        <div class="program-grid">
            <?php if(count($prodi) > 0): ?>
                <?php $i = 1; foreach ($prodi as $key): ?>
                <div class="program-card">
                    <div class="program-number"><?= $i ?></div>
                    <h3 class="program-name"><?= $key->nama ?></h3>
                    
                    <div class="program-criteria">
                        <i class="fas fa-book"></i>
                        <span><?= count($dtNilai) ?> kriteria nilai</span>
                    </div>
                    
                    <div class="program-criteria">
                        <i class="fas fa-building"></i>
                        <span><?= count($dtJurusan) ?> kriteria jurusan</span>
                    </div>
                    
                    <div class="program-criteria">
                        <i class="fas fa-heart"></i>
                        <span><?= count($dtMinat) ?> kriteria minat</span>
                    </div>
                    
                    <div class="program-criteria">
                        <i class="fas fa-money-bill-wave"></i>
                        <span><?= count($dtEkonomi) ?> kriteria ekonomi</span>
                    </div>
                    
                    <div class="program-actions">
                        <a href="editProdi/<?= $key->id ?>" class="program-action edit-action">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="deleteProdi/<?= $key->id ?>" class="program-action delete-action" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus program studi ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </div>
                </div>
                <?php $i++; endforeach ?>
            <?php else: ?>
                <div class="no-data">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Belum Ada Program Studi</h3>
                    <p>Silakan tambahkan program studi baru</p>
                    <a href="<?= url('addProdi') ?>" class="add-btn" style="margin-top: 1rem;">
                        <i class="fas fa-plus-circle"></i> Tambah Program Studi
                    </a>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if(count($prodi) > 0): ?>
        <div class="program-count">
            <i class="fas fa-graduation-cap"></i> Total <?= count($prodi) ?> program studi terdaftar
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Efek pencarian
            const searchInput = document.querySelector('.search-box input');
            const programCards = document.querySelectorAll('.program-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                programCards.forEach(card => {
                    const name = card.querySelector('.program-name').textContent.toLowerCase();
                    
                    if (name.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            
            // Konfirmasi hapus
            const deleteButtons = document.querySelectorAll('.delete-action');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus program studi ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>