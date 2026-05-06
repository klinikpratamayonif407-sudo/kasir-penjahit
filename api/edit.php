<?php 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Nurul Penjahit</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f4f6f9; }

.navbar {
    background: linear-gradient(90deg,#198754,#157347);
}

.card { border-radius:15px; border:none; }

.card-green { background:#198754; color:white; }
.card-blue { background:#0d6efd; color:white; }
.card-orange { background:#fd7e14; color:white; }

.form-control, .form-select {
    border-radius:10px;
}

.btn { border-radius:10px; }
</style>
</head>

<body>

<nav class="navbar navbar-dark shadow">
<div class="container">
    <span class="navbar-brand fw-bold">🧵 Nurul Penjahit</span>
</div>
</nav>

<div class="container mt-4">

<h4 class="fw-bold mb-3">Dashboard Kasir</h4>

<?php
$total = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COALESCE(SUM(biaya),0) as t FROM pesanan_jahit"))['t'];
$jumlah = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) as t FROM pesanan_jahit"))['t'];
$selesai = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) as t FROM pesanan_jahit WHERE status_kerja='Selesai'"))['t'];
?>

<!-- DASHBOARD -->
<div class="row mb-3">
<div class="col-md-4 mb-2">
<div class="card card-green p-3">
<h6>Total Pendapatan</h6>
<h4>Rp <?= number_format($total,0,',','.'); ?></h4>
</div>
</div>

<div class="col-md-4 mb-2">
<div class="card card-blue p-3">
<h6>Total Pesanan</h6>
<h4><?= $jumlah ?></h4>
</div>
</div>

<div class="col-md-4 mb-2">
<div class="card card-orange p-3">
<h6>Selesai</h6>
<h4><?= $selesai ?></h4>
</div>
</div>
</div>

<!-- FORM INPUT -->
<div class="card shadow mb-4">
<div class="card-body">

<h5>➕ Tambah Pesanan</h5>

<form action="simpan.php" method="POST" class="row g-2">

<div class="col-md-3">
<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama" required>
</div>

<div class="col-md-2">
<input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
</div>

<div class="col-md-3">
<input type="text" name="jenis_pakaian" class="form-control" placeholder="Jenis" required>
</div>

<div class="col-md-2">
<input type="number" name="biaya" class="form-control" placeholder="Biaya" required>
</div>

<div class="col-md-2">
<button class="btn btn-success w-100">Simpan</button>
</div>

</form>

</div>
</div>

<!-- TABEL -->
<div class="card shadow">
<div class="card-body">

<h5>📋 Daftar Pesanan</h5>

<table class="table table-hover mt-3">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Nama</th>
<th>Jenis</th>
<th>Biaya</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;
$q = mysqli_query($koneksi,"SELECT * FROM pesanan_jahit ORDER BY id DESC");

if(mysqli_num_rows($q) > 0):
while($r = mysqli_fetch_assoc($q)):
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $r['nama_pelanggan'] ?></td>
<td><?= $r['jenis_pakaian'] ?></td>
<td>Rp <?= number_format($r['biaya'],0,',','.') ?></td>

<td>
<form action="update-status.php" method="POST">
<input type="hidden" name="id" value="<?= $r['id'] ?>">

<select name="status" onchange="this.form.submit()" class="form-select form-select-sm">

<option <?= $r['status_kerja']=='Proses'?'selected':'' ?>>Proses</option>
<option <?= $r['status_kerja']=='Selesai'?'selected':'' ?>>Selesai</option>
<option <?= $r['status_kerja']=='Diambil'?'selected':'' ?>>Diambil</option>

</select>
</form>
</td>

<td>
<a href="edit.php?id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">Hapus</a>
</td>

</tr>

<?php endwhile; else: ?>
<tr>
<td colspan="6" class="text-center">Belum ada data</td>
</tr>
<?php endif; ?>

</tbody>
</table>

</div>
</div>

</div>

</body>
</html>