<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/BookRepository.php';

$repo = new BookRepository($pdo);

// Pastikan ID ada
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// Eksekusi hapus data
$repo->delete($id);

// Kembali ke daftar buku
header("Location: index.php");
exit;
