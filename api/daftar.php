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

        .card {
            border-radius: 15px;
            border: none;
        }

        .card-dashboard {
            color: white;
            border-radius: 15px;
        }

        .card-green { background: #198754; }
        .card-blue { background: #0d6efd; }
        .card-orange { background: #fd7e14; }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark">
    <div class="container">
        <span class="navbar-brand">🧵 Nurul Penjahit</span>
    </div>
</nav>

<div class="container mt-4">

    <h4 class="mb-4">Dashboard Kasir</h4>

    <?php
    // TOTAL
    $total = $conn->query("SELECT SUM(biaya) as total FROM pesanan_jahit")->fetch_assoc()['total'] ?? 0;

    // JUMLAH
    $jumlah = $conn->query("SELECT COUNT(*) as total FROM pesanan_jahit")->fetch_assoc()['total'];

    // SELESAI
    $selesai = $conn->query("SELECT COUNT(*) as total FROM pesanan_jahit WHERE status_kerja='Selesai'")->fetch_assoc()['total'];
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
                    $result = $conn->query("SELECT * FROM pesanan_jahit ORDER BY tgl_masuk DESC");

                    if ($result->num_rows > 0):
                        while($row = $result->fetch_assoc()):

                        $status = $row['status_kerja'];
                        $badge = 'bg-secondary';

                        if ($status == 'Proses') $badge = 'bg-warning text-dark';
                        if ($status == 'Selesai') $badge = 'bg-success';
                        if ($status == 'Diambil') $badge = 'bg-primary';
                    ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                            <td><?= htmlspecialchars($row['jenis_pakaian']); ?></td>
                            <td>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></td>

                            <!-- STATUS DROPDOWN -->
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
                                   onclick="return confirm('Yakin ingin hapus data ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>

                    <?php
                        endwhile;
                    else:
                    ?>

                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data pesanan
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>