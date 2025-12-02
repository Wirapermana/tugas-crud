<?php

// Memanggil file koneksi dan repository
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/BookRepository.php';

// Membuat objek repository
$repo = new BookRepository($pdo);

// Mengambil semua data buku dari database
$books = $repo->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>

<h2>Daftar Buku</h2>

<!-- Tombol menuju halaman tambah (create) -->
<a href="create.php">+ Tambah Buku</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Tahun</th>
        <th>Status</th>
        <th>Aksi</th> <!-- Kolom baru -->
    </tr>

    <!-- Loop data buku dan tampilkan di tabel -->
    <?php foreach ($books as $buku): ?>
        <tr>
            <td><?= $buku['id_buku'] ?></td>
            <td><?= $buku['judul'] ?></td>
            <td><?= $buku['author'] ?></td>
            <td><?= $buku['kategori'] ?></td>
            <td><?= $buku['tahun_terbit'] ?></td>
            <td><?= $buku['status'] ?></td>
            <td>
    <a href="edit.php?id=<?= $buku['id_buku'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $buku['id_buku'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
</td>

        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
