<?php
// 1. panggil koneksi database
include 'koneksi.php';

// 2. cek apakah ID ada
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

// 3. amankan input
$id = intval($_GET['id']);

// 4. pakai query aman (prepared statement)
$stmt = $koneksi->prepare("DELETE FROM pesanan WHERE id = ?");
$stmt->bind_param("i", $id);

// 5. eksekusi
if ($stmt->execute()) {
    // sukses hapus
    header("Location: /daftar");
    exit;
} else {
    echo "Gagal menghapus data: " . $koneksi->error;
}
?>