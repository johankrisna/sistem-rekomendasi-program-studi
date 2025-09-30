<?php 
    require_once('header.php'); 
    require_once('data.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - SPK Program Studi</title>
    <style>
        /* Student List Styles */
        .student-list-container {
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
        
        .student-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
            background: white;
        }
        
        .student-table th {
            background: linear-gradient(135deg, #3498db, #1abc9c);
            color: white;
            padding: 1.2rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .student-table td {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid #eef1f5;
            color: #555;
        }
        
        .student-table tr:last-child td {
            border-bottom: none;
        }
        
        .student-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .student-table tr:hover {
            background-color: #f1f9ff;
        }
        
        .center {
            text-align: center;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            width: 35px;
            height: 35px;
        }
        
        .view-btn {
            background: #3498db;
            color: white;
        }
        
        .edit-btn {
            background: #2ecc71;
            color: white;
        }
        
        .delete-btn {
            background: #e74c3c;
            color: white;
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .no-data {
            text-align: center;
            padding: 3rem;
            color: #7f8c8d;
            font-style: italic;
        }
        
        .no-data i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }
        
        .student-count {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            color: #3498db;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            margin-top: 1.5rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .student-table {
                display: block;
                overflow-x: auto;
            }
            
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
            
            .action-buttons {
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .student-table th, 
            .student-table td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
            
            .action-btn {
                width: 30px;
                height: 30px;
                padding: 0.5rem;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .student-table tr {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        
        .student-table tr:nth-child(1) { animation-delay: 0.1s; }
        .student-table tr:nth-child(2) { animation-delay: 0.2s; }
        .student-table tr:nth-child(3) { animation-delay: 0.3s; }
        .student-table tr:nth-child(4) { animation-delay: 0.4s; }
        .student-table tr:nth-child(5) { animation-delay: 0.5s; }
        .student-table tr:nth-child(6) { animation-delay: 0.6s; }
        .student-table tr:nth-child(7) { animation-delay: 0.7s; }
        .student-table tr:nth-child(8) { animation-delay: 0.8s; }
        .student-table tr:nth-child(9) { animation-delay: 0.9s; }
        .student-table tr:nth-child(10) { animation-delay: 1.0s; }
    </style>
</head>
<body>
    <div class="student-list-container">
        <h1 class="list-title">Daftar Siswa</h1>
        
        <div class="list-header">
            <a href="<?= url('') ?>" class="add-btn">
                <i class="fas fa-user-plus"></i> Tambah Siswa Baru
            </a>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari siswa...">
            </div>
        </div>
        
        <?php if(count($siswa) > 0): ?>
        <div class="table-responsive">
            <table class="student-table">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Siswa</th>
                        <th width="20%">Jurusan</th>
                        <th width="20%">Minat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($siswa as $key): ?>
                    <tr>
                        <td class="center"><?= $i ?></td>
                        <td><?= $key->nama ?></td>
                        <td><?= $dtJurusan[$key->jurusan] ?></td>
                        <td><?= $dtMinat[$key->minat] ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="countSAW/<?= $key->id ?>" class="action-btn view-btn" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="editSiswa/<?= $key->id ?>" class="action-btn edit-btn" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="deleteSiswa/<?= $key->id ?>" class="action-btn delete-btn" 
                                   title="Hapus Data" onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
        
        <div class="student-count">
            <i class="fas fa-users"></i> Total <?= count($siswa) ?> siswa terdaftar
        </div>
        <?php else: ?>
        <div class="no-data">
            <i class="fas fa-user-graduate"></i>
            <h3>Belum Ada Data Siswa</h3>
            <p>Silakan tambahkan siswa baru untuk memulai</p>
            <a href="<?= url('') ?>" class="add-btn" style="margin-top: 1rem;">
                <i class="fas fa-user-plus"></i> Tambah Siswa
            </a>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Efek pencarian
            const searchInput = document.querySelector('.search-box input');
            const tableRows = document.querySelectorAll('.student-table tbody tr');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const name = row.children[1].textContent.toLowerCase();
                    const major = row.children[2].textContent.toLowerCase();
                    const interest = row.children[3].textContent.toLowerCase();
                    
                    if (name.includes(searchTerm) {
                        row.style.display = '';
                    } else if (major.includes(searchTerm)) {
                        row.style.display = '';
                    } else if (interest.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
            
            // Konfirmasi hapus
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus siswa ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>