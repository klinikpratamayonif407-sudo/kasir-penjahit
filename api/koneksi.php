<?php
// Data koneksi dari Clever Cloud (db_penjahit)
$host = "bqecahcawlbufqrit348-mysql.services.clever-cloud.com";
$user = "upsg22q8q38gm7hg";
$pass = "MbLCNn8DzdXT575cbJ2j";
$db   = "bqecahcawlbufqrit348";
$port = 3306;

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Jika berhasil, halaman akan kosong (ini bagus)
?>