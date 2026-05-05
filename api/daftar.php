<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Nurul Penjahit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f4f6f9; }

        .navbar {
            background: linear-gradient(90deg, #198754, #157347);
        }

        .card { border-radius: 15px; border: none; }

        .card-dashboard { color: white; }
        .card-green { background: #198754; }
        .card-blue { background: #0d6efd; }
        .card-orange { background: #fd7e14; }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-bold">🧵 Nurul Penjahit</span>
        <span class="text-white small">Dashboard Kasir</span>
    </div>
</nav>

<div class="container mt-4">

    <h4 class="mb-4 fw-bold">Dashboard</h4>

    <?php
    // TOTAL PENDAPATAN
    $q1 = pg_query($conn, "SELECT COALESCE(SUM(biaya),0) as total FROM pesanan_jahit");
    $total = pg_fetch_assoc($q1)['total'];

    // TOTAL DATA
    $q2 = pg_query($conn, "SELECT COUNT(*) as total FROM pesanan_jahit");
    $jumlah = pg_fetch_assoc($q2)['total'];

    // SELESAI
    $q3 = pg_query($conn, "SELECT COUNT(*) as total FROM pesanan_jahit WHERE status_kerja='Selesai'");
    $selesai = pg_fetch_assoc($q3)['total'];
    ?>

    <!-- DASHBOARD -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="card card-dashboard card-green shadow">
                <div class="card-body">
                    <h6>Total Pendapatan</h6>
                    <h3>Rp <?= number_format($total, 0, ',', '.'); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-dashboard card-blue shadow">
                <div class="card-body">
                    <h6>Total Pesanan</h6>
                    <h3><?= $jumlah; ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-dashboard card-orange shadow">
                <div class="card-body">
                    <h6>Pesanan Selesai</h6>
                    <h3><?= $selesai; ?></h3>
                </div>
            </div>
        </div>

    </div>

    <!-- BUTTON -->
    <div class="mb-3">
        <a href="/" class="btn btn-success btn-sm shadow-sm">+ Tambah Pesanan</a>
    </div>

    <!-- TABEL -->
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3">📋 Daftar Pesanan</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    $no = 1;
                    $result = pg_query($conn, "SELECT * FROM pesanan_jahit ORDER BY tgl_masuk DESC");

                    if (pg_num_rows($result) > 0):
                        while($row = pg_fetch_assoc($result)):

                        $status = $row['status_kerja'];
                    ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                            <td><?= htmlspecialchars($row['jenis_pakaian']); ?></td>
                            <td><strong>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></strong></td>

                            <!-- STATUS -->
                            <td>
                                <form action="/update-status" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option <?= $status=='Proses'?'selected':''; ?>>Proses</option>
                                        <option <?= $status=='Selesai'?'selected':''; ?>>Selesai</option>
                                        <option <?= $status=='Diambil'?'selected':''; ?>>Diambil</option>
                                    </select>
                                </form>
                            </td>

                            <td><?= date('d/m/Y', strtotime($row['tgl_masuk'])); ?></td>

                            <!-- AKSI -->
                            <td>
                                <a href="/edit?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/hapus?id=<?= $row['id']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>

                    <?php endwhile; else: ?>

                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada pesanan 😢
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="footer">
        © 2026 Nurul Penjahit • Sistem Kasir Modern
    </div>

</div>

</body>
</html>