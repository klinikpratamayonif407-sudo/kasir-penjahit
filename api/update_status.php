<?php
include 'koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

$conn->query("UPDATE pesanan_jahit SET status_kerja='$status' WHERE id='$id'");

header("Location: /daftar");