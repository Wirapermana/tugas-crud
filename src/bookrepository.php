<?php

// Mengambil koneksi database dari config.php
require_once __DIR__ . '/../config.php';

class BookRepository {

    private $pdo; // tempat menyimpan koneksi database

    // Constructor dipanggil saat objek dibuat
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Mengambil semua data buku
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM buku ORDER BY id_buku DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil data 1 buku berdasarkan ID
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengupdate data buku berdasarkan ID
public function update($id, $judul, $author, $kategori, $tahun, $status, $cover = null) {

    if ($cover) {
        // Jika cover baru diupload
        $stmt = $this->pdo->prepare("
            UPDATE buku SET judul=?, author=?, kategori=?, tahun_terbit=?, status=?, cover=? 
            WHERE id_buku=?
        ");
        return $stmt->execute([$judul, $author, $kategori, $tahun, $status, $cover, $id]);
    
    } else {
        // Jika tidak ada cover baru
        $stmt = $this->pdo->prepare("
            UPDATE buku SET judul=?, author=?, kategori=?, tahun_terbit=?, status=? 
            WHERE id_buku=?
        ");
        return $stmt->execute([$judul, $author, $kategori, $tahun, $status, $id]);
    }
}


    // Menyimpan buku baru ke database
    public function create($judul, $author, $kategori, $tahun, $status, $cover) {
        $stmt = $this->pdo->prepare("
            INSERT INTO buku (judul, author, kategori, tahun_terbit, status, cover)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([$judul, $author, $kategori, $tahun, $status, $cover]);
    }

    // Menghapus buku berdasarkan ID
    public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id]);
}

}
