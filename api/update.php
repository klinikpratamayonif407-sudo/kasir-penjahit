<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pelanggan'];
$jenis = $_POST['jenis_pakaian'];
$biaya = $_POST['biaya'];

$conn->query("UPDATE pesanan_jahit 
SET nama_pelanggan='$nama',
    jenis_pakaian='$jenis',
    biaya='$biaya'
WHERE id='$id'");

header("Location: /daftar");