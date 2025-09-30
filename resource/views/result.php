<?php 
  require_once('header.php');
  require_once('data.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi - SPK Program Studi</title>
    <style>
        /* Result Styles */
        .result-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        .result-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #2c3e50;
            position: relative;
            font-weight: 700;
        }
        
        .result-title::after {
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
        
        .student-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .student-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, #3498db, #1abc9c);
        }
        
        .student-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .info-item {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .info-label {
            font-weight: 600;
            color: #3498db;
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
        }
        
        .info-value {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 500;
        }
        
        .recommendation-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2.5rem;
            border-top: 4px solid #1abc9c;
        }
        
        .recommendation-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .recommendation-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1abc9c, #3498db);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.8rem;
            color: white;
            margin-right: 1.5rem;
            flex-shrink: 0;
        }
        
        .recommendation-title {
            font-size: 1.8rem;
            color: #2c3e50;
            font-weight: 700;
        }
        
        .recommendation-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
            margin-bottom: 1.5rem;
            padding: 0 1rem;
        }
        
        .highlight {
            background: linear-gradient(120deg, rgba(26, 188, 156, 0.2), rgba(52, 152, 219, 0.2));
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
            font-weight: 700;
        }
        
        .result-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
        }
        
        .result-table th {
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            padding: 1.2rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .result-table td {
            padding: 1rem;
            border-bottom: 1px solid #eef1f5;
        }
        
        .result-table tr:last-child td {
            border-bottom: none;
        }
        
        .result-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .result-table tr:hover {
            background-color: #f1f9ff;
        }
        
        .point-cell {
            font-weight: 700;
            text-align: center;
        }
        
        .cGreen {
            color: #27ae60;
        }
        
        .cYellow {
            color: #f39c12;
        }
        
        .cRed {
            color: #e74c3c;
        }
        
        .rank-badge {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #3498db;
            color: white;
            text-align: center;
            line-height: 30px;
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .rank-1 .rank-badge {
            background: linear-gradient(135deg, #f1c40f, #e67e22);
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 1.2rem;
        }
        
        .explanation {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.6;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        
        .btn-secondary {
            background: #f8f9fa;
            color: #3498db;
            border: 2px solid #3498db;
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.4);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .result-table {
                display: block;
                overflow-x: auto;
            }
            
            .recommendation-header {
                flex-direction: column;
                text-align: center;
            }
            
            .recommendation-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .action-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1 class="result-title">Hasil Rekomendasi Program Studi</h1>
        
        <div class="student-card">
            <h2 style="font-size: 1.4rem; color: #2c3e50; margin-bottom: 1.5rem; padding-bottom: 0.8rem; border-bottom: 2px solid #f1f5f9;">Data Siswa</h2>
            
            <div class="student-info">
                <div class="info-item">
                    <div class="info-label">Nama Lengkap</div>
                    <div class="info-value"><?= $siswa->nama ?></div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">Asal Jurusan</div>
                    <div class="info-value"><?= $dtJurusan[$siswa->jurusan] ?></div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">Minat</div>
                    <div class="info-value"><?= $dtMinat[$siswa->minat] ?></div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">Kondisi Ekonomi</div>
                    <div class="info-value"><?= $dtEkonomi[$siswa->ekonomi] ?></div>
                </div>
            </div>
        </div>
        
        <div class="recommendation-card">
            <div class="recommendation-header">
                <div class="recommendation-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h2 class="recommendation-title">Rekomendasi Utama</h2>
            </div>
            
            <p class="recommendation-text">
                Berdasarkan pertimbangan dari nilai, jurusan, minat, dan kondisi ekonomi siswa. 
                Maka, siswa yang bernama <span class="highlight"><?= $siswa->nama ?></span> direkomendasikan untuk
                memilih program studi <span class="highlight"><?= htmlspecialchars(key($datas)) ?></span> sebagai program studi yang diambil untuk 
                melanjutkan pendidikan ke perguruan tinggi.
            </p>
        </div>
        
        <h2 style="font-size: 1.6rem; color: #2c3e50; margin: 2rem 0 1.5rem; text-align: center;">
            <i class="fas fa-list-alt"></i> Rincian Rekomendasi Program Studi
        </h2>
        
        <p style="text-align: center; color: #7f8c8d; margin-bottom: 1.5rem; font-style: italic;">
            Berikut adalah daftar lengkap rekomendasi dan alternatif Program Studi berdasarkan analisis sistem
        </p>
        
        <table class="result-table">
            <thead>
                <tr>
                    <th width="10%">Rank</th>
                    <th width="30%">Program Studi</th>
                    <th width="15%">Skor</th>
                    <th>Penjelasan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($datas as $key => $value):

                    $score = round($value['score'] * 100, 2);
                    $reason = $value['reason'];
                    
                    $rowClass = ($i == 1) ? 'rank-1' : '';
                ?>
                <tr class="<?= $rowClass ?>">
                    <td>
                        <span class="rank-badge"><?= $i ?></span>
                    </td>
                    <td><?= htmlspecialchars($key) ?></td>
                    <td class="point-cell bold <?= ($score > 80 || $i == 1) ? 'cGreen' : ($score > 70 ? 'cYellow' : 'cRed') ?>">
                        <?= $score ?>%
                    </td>
                    <td class="explanation"><?= htmlspecialchars($reason) ?></td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
        
        <div class="action-buttons">
            <a href="<?= url('daftarSiswa') ?>" class="action-btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Siswa
            </a>
            <a href="<?= url('') ?>" class="action-btn btn-primary">
                <i class="fas fa-home"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.student-card, .recommendation-card');
            const tableRows = document.querySelectorAll('.result-table tbody tr');
            
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 300 + (index * 200));
            });
            
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateX(-20px)';
                row.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, 500 + (index * 100));
            });
        });
    </script>
</body>
</html>