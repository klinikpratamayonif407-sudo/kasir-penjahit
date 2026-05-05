<?php include 'api/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Penjahit - Input Pesanan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
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
                        <h5 class="card-title mb-4"><i class="fas fa-plus-circle me-2"></i>Tambah Pesanan Baru</h5>
                        
                        <form action="api/simpan_pesanan.php" method="POST">
                            <!-- Nama Pelanggan -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pelanggan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan nama lengkap" required>
                                </div>
                            </div>

                            <!-- Nomor HP -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor HP / WhatsApp</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                    <input type="tel" name="no_hp" class="form-control" placeholder="08123456xxx" required>
                                </div>
                                <div class="form-text">Pastikan nomor aktif untuk konfirmasi.</div>
                            </div>

                            <!-- Jenis Pakaian -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Pakaian / Jasa</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-cut"></i></span>
                                    <input type="text" name="jenis_pakaian" class="form-control" placeholder="Contoh: Kebaya, Permak Jas, dll" required>
                                </div>
                            </div>

                            <!-- Biaya -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Total Biaya (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="biaya" class="form-control" placeholder="0" required>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary shadow-sm">
                                    <i class="fas fa-save me-2"></i>Simpan Pesanan
                                </button>
                                <a href="daftar.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-list me-2"></i>Lihat Semua Daftar Pesanan
                                </a>
                            </div>
                        </form>
                        
                    </div>
                </div>

                <p class="text-center text-muted mt-4 small">© 2026 Aplikasi Management Penjahit</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>