<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pelanggan'];
    $hp = $_POST['no_hp'];
    $pakaian = $_POST['jenis_pakaian'];
    $biaya = $_POST['biaya'];

    $sql = "INSERT INTO pesanan_jahit (nama_pelanggan, no_hp, jenis_pakaian, biaya) 
            VALUES ('$nama', '$hp', '$pakaian', '$biaya')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href='../index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>