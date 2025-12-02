<?php

// Memanggil koneksi dan repository
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/BookRepository.php';

$repo = new BookRepository($pdo);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>

<h2>📖 Tambah Buku</h2>

<form method="POST" enctype="multipart/form-data">

    Judul: <br>
    <input type="text" name="judul" required><br><br>

    Penulis: <br>
    <input type="text" name="author" required><br><br>

    Kategori: <br>
    <select name="kategori">
        <option>Novel</option>
        <option>Pelajaran</option>
        <option>Teknologi</option>
        <option>Sejarah</option>
    </select>
    <br><br>

    Tahun Terbit: <br>
    <input type="number" name="tahun_terbit" required><br><br>

    Status: <br>
    <select name="status">
        <option value="tersedia">Tersedia</option>
        <option value="dipinjam">Dipinjam</option>
    </select>
    <br><br>

    Cover Buku: <input type="file" name="cover"><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="index.php">⬅ Kembali</a>

</body>
</html>
