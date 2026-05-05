<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM pesanan_jahit WHERE id='$id'")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Edit Pesanan</h3>

<form action="/update" method="POST">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <input type="text" name="nama_pelanggan" class="form-control mb-2" value="<?= $data['nama_pelanggan']; ?>">
    <input type="text" name="jenis_pakaian" class="form-control mb-2" value="<?= $data['jenis_pakaian']; ?>">
    <input type="number" name="biaya" class="form-control mb-2" value="<?= $data['biaya']; ?>">

    <button class="btn btn-success">Update</button>
</form>

</body>
</html>