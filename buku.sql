CREATE DATABASE buku;
USE buku;

CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    author VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    tahun_terbit INT NOT NULL,
    status ENUM('tersedia','dipinjam') NOT NULL,
    cover VARCHAR(255)
);

ALTER TABLE buku ADD COLUMN author VARCHAR(100) AFTER judul;

