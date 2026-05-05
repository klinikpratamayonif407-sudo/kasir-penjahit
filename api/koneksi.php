<?php

$conn = pg_connect("
host=aws-1-ap-south-1.pooler.supabase.com
port=6543
dbname=postgres
user=postgres.asebapyvwgegwqzeukxm
password=Klinik407PK
");

if (!$conn) {
    die("Koneksi gagal");
}