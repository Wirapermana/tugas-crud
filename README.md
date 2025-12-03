## 1 Deskripsi Aplikasi

Project ini adalah aplikasi sederhana untuk mengelola data buku menggunakan fitur CRUD (Create, Read, Update, Delete).  
Tujuannya supaya bisa belajar cara menghubungkan PHP dengan database menggunakan PDO, sekaligus latihan upload file (cover buku).


## Entitas yang saya gunakan

Entitas yang saya pilih adalah **Buku**, dengan atribut:

- ID Buku
- Judul
- Penulis
- Tahun Terbit
- Kategori
- Status (Tersedia / Dipinjam)
- Cover (file upload)


### Penjelasan Singkat Fungsi Aplikasi

- **Create** → Form tambah buku, data disimpan ke database menggunakan PDO  
- **Read** → Menampilkan daftar semua buku dalam bentuk tabel  
- **Update** → Edit form dengan data lama sudah terisi otomatis  
- **Delete** → Menghapus data berdasarkan ID  
- **Upload File** → Menyimpan cover ke folder `public/upload/` dan menampilkan di tabel  


## 2.Spesifikasi Teknis  

    Bahasa dan Tools
        - PHP: 8.4.13 
        - Database: MySQL / MariaDB
        - Web Server: PHP Built-in Server 


## Struktur Folder
```
buku-crud/
│
├─ config.php
├─ buku.sql
├─ README.md
├─ .gitignore
│
├─ public/
│  ├─ upload/        ← folder penyimpanan cover buku
│  ├─ create.php
│  ├─ delete.php
│  ├─ edit.php
│  └─ index.php
│
└─ src/
   ├─ book.php
   └─ bookrepository.php
   
```
                


### Penjelasan Class Utama

1. **Entity (Book.php)**  
   - Representasi dari objek buku  
   - Punya properti: judul, author, kategori, tahun terbit, status, cover  

2. **BookRepository.php**  
   - Menangani semua operasi CRUD ke database menggunakan PDO:  
     - `getAll()`  
     - `findById()`  
     - `create()`  
     - `update()`  
     - `delete()`

3. **config.php**  
   - Berisi konfigurasi koneksi PDO ke MySQL  


## 3. Instruksi Menjalankan Aplikasi

### Import Database

Gunakan file `buku.sql`.

```sql
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

Pengaturan Koneksi Database
    Edit file:
    config.php
    Sesuaikan:
    php
    private $host = "localhost";
    private $db   = "buku";
    private $user = "root";
    private $pass = "";   

Menjalankan Aplikasi
   php -S localhost:8000 -t public

Buka Browser :
    http://localhost:8000



```
## 4. Contoh Skenario Uji Singkat

    Tambah 1 Data
        - Buka halaman Tambah  
        - Isi form  
        - Klik Simpan  
        - Data tampil di tabel  

    Tampilkan Daftar Data
        - Akses halaman utama  
        - Semua data buku tampil di tabel

    Ubah Data Tertentu
        - Klik Edit  
        - Ubah salah satu field  
        - Klik Update  
        - Data berubah di tabel  

    Hapus Data
        - Klik Delete  
        - Konfirmasi OK  
        - Data hilang dari daftar