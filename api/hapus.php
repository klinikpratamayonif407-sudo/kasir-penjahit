<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = intval($_GET['id']);

// QUERY POSTGRESQL (BENAR)
$query = "DELETE FROM pesanan_jahit WHERE id = $id";

$result = pg_query($conn, $query);

if ($result) {
    header("Location: /daftar");
    exit;
} else {
    echo "Gagal menghapus data";
}
?>