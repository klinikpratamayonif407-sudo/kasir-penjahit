<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Penjahit - Input Pesanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; border: none; }
        .btn-primary { border-radius: 10px; padding: 12px; font-weight: bold; }
        .btn-outline-secondary { border-radius: 10px; padding: 10px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <h2 class="text-center mb-4">🧵 Sistem Kasir Penjahit</h2>
            
            <div class="card shadow">
                <div class="card-body p-4">
                    
                    <h5 class="mb-4">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Pesanan
                    </h5>

                    <!-- FORM -->
                    <form action="/simpan" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Pakaian</label>
                            <input type="text" name="jenis_pakaian" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Biaya</label>
                            <input type="number" name="biaya" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <a href="/daftar" class="btn btn-outline-secondary">
                                Lihat Daftar
                            </a>
                        </div>

                    </form>

                </div>
            </div>

            <p class="text-center mt-4 text-muted small">
                © 2026 Kasir Penjahit
            </p>

        </div>
    </div>
</div>

</body>
</html>