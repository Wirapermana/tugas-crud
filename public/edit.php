<?php

// Memanggil koneksi dan repository
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/BookRepository.php';

$repo = new BookRepository($pdo);

// Pastikan ada parameter ID
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$book = $repo->findById($_GET['id']);

if (!$book) {
    echo "Data buku tidak ditemukan!";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>

<h2>✏ Edit Buku</h2>

<form method="POST" enctype="multipart/form-data">

    Judul: <br>
    <input type="text" name="judul" value="<?= $book['judul'] ?>" required><br><br>

    Penulis: <br>
    <input type="text" name="author" value="<?= $book['author'] ?>" required><br><br>

    Kategori: <br>
    <select name="kategori">
        <option <?= $book['kategori'] == 'Novel' ? 'selected' : '' ?>>Novel</option>
        <option <?= $book['kategori'] == 'Pelajaran' ? 'selected' : '' ?>>Pelajaran</option>
        <option <?= $book['kategori'] == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
        <option <?= $book['kategori'] == 'Sejarah' ? 'selected' : '' ?>>Sejarah</option>
    </select>
    <br><br>

    Tahun Terbit: <br>
    <input type="number" name="tahun_terbit" value="<?= $book['tahun_terbit'] ?>" required><br><br>

    Status: <br>
    <select name="status">
        <option value="tersedia" <?= $book['status'] == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
        <option value="dipinjam" <?= $book['status'] == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
    </select>
    <br><br>

    Cover saat ini:<br>
    <?php if ($book['cover']): ?>
        <img src="../upload/<?= $book['cover']; ?>" width="80"><br><br>
    <?php else: ?>
        Tidak ada cover<br><br>
    <?php endif; ?>

    Ganti cover : <input type="file" name="cover"><br><br>

    <button type="submit">Update</button>
</form>

<br><a href="index.php">⬅ Kembali</a>

</body>
</html>
