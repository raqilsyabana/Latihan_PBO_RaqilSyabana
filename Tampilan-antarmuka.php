<?php
// index.php
require_once 'database.php';
require_once 'Tiket-Reguler.php';
require_once 'Tiket-IMAX.php';
require_once 'Tiket-Velvet.php';

// Ambil data dari database secara terkelompok menggunakan method statis di kelas anak
$daftarRegular = TiketRegular::getWhereRegular($pdo, '1', '1'); // Trik '1' LIKE '1' untuk mengambil semua data khusus Regular
$daftarIMAX    = TiketIMAX::getWhereIMAX($pdo, '1', '1');       // Trik mengambil semua data khusus IMAX
$daftarVelvet  = TiketVelvet::getWhereVelvet($pdo, '1', '1');     // Trik mengambil semua data khusus Velvet
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket Bioskop - Polimorfisme View</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
        }
        .studio-section {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .studio-title {
            font-size: 24px;
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 3px solid;
        }
        /* Pembeda warna visual tiap kategori studio */
        .regular-title { color: #2980b9; border-color: #2980b9; }
        .imax-title { color: #e67e22; border-color: #e67e22; }
        .velvet-title { color: #9b59b6; border-color: #9b59b6; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            color: #555;
            font-weight: 600;
        }
        tr:hover {
            background-color: #fcfcfc;
        }
        .text-right {
            text-align: right;
        }
        .badge-harga {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
        }
        .empty-message {
            color: #7f8c8d;
            font-style: italic;
            padding: 15px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistem Informasi Pemesanan Tiket Bioskop</h1>

    <div class="studio-section">
        <h2 class="studio-title regular-title">Studio Regular</h2>
        <?php if (empty($daftarRegular)): ?>
            <p class="empty-message">Tidak ada data tiket untuk Studio Regular.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Film</th>
                        <th>Jadwal Tayang</th>
                        <th>Jumlah Kursi</th>
                        <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                        <th class="text-right">Total Harga (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarRegular as $tiket): ?>
                        <tr>
                            <td><?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= $tiket->getJadwalTayang(); ?></td>
                            <td><?= $tiket->getJumlahKursi(); ?> pcs</td>
                            <td><em><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></em></td>
                            <td class="text-right"><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="studio-section">
        <h2 class="studio-title imax-title">Studio IMAX</h2>
        <?php if (empty($daftarIMAX)): ?>
            <p class="empty-message">Tidak ada data tiket untuk Studio IMAX.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Film</th>
                        <th>Jadwal Tayang</th>
                        <th>Jumlah Kursi</th>
                        <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                        <th class="text-right">Total Harga (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarIMAX as $tiket): ?>
                        <tr>
                            <td><?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= $tiket->getJadwalTayang(); ?></td>
                            <td><?= $tiket->getJumlahKursi(); ?> pcs</td>
                            <td><em><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></em></td>
                            <td class="text-right"><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="studio-section">
        <h2 class="studio-title velvet-title">Studio Velvet</h2>
        <?php if (empty($daftarVelvet)): ?>
            <p class="empty-message">Tidak ada data tiket untuk Studio Velvet.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Film</th>
                        <th>Jadwal Tayang</th>
                        <th>Jumlah Kursi</th>
                        <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                        <th class="text-right">Total Harga (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarVelvet as $tiket): ?>
                        <tr>
                            <td><?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= $tiket->getJadwalTayang(); ?></td>
                            <td><?= $tiket->getJumlahKursi(); ?> pcs</td>
                            <td><em><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></em></td>
                            <td class="text-right"><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

</body>
</html>