<?php
include 'koneksi.php';

$nama   = $_POST['nama_pelanggan'];
$hp     = $_POST['no_hp'];
$jenis  = $_POST['jenis_pakaian'];
$biaya  = $_POST['biaya'];

pg_query($conn, "
INSERT INTO pesanan_jahit 
(nama_pelanggan,no_hp,jenis_pakaian,biaya,status_kerja,tgl_masuk)
VALUES 
('$nama','$hp','$jenis','$biaya','Proses',NOW())
");

header("Location: /");