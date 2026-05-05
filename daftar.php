<?php include 'api/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Kasir Penjahit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-4">📋 Daftar Pesanan Jahit</h2>
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary btn-sm">+ Tambah Pesanan Baru</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Pakaian</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM pesanan_jahit ORDER BY tgl_masuk DESC";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama_pelanggan']}</td>
                                <td>{$row['jenis_pakaian']}</td>
                                <td>Rp " . number_format($row['biaya'], 0, ',', '.') . "</td>
                                <td><span class='badge bg-info text-dark'>{$row['status_kerja']}</span></td>
                                <td>" . date('d/m/Y', strtotime($row['tgl_masuk'])) . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>