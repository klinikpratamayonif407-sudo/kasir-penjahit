<?php include 'api/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Penjahit - Input Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-4">🧵 Input Pesanan Jahit</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="api/simpan_pesanan.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pakaian</label>
                        <input type="text" name="jenis_pakaian" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biaya (Rp)</label>
                        <input type="number" name="biaya" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan Pesanan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>