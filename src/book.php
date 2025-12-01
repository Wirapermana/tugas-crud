<?php

// Class Book merepresentasikan 1 data buku
class Book {

    // Properti yang ada pada tabel database
    private $id;
    private $judul;
    private $author;
    private $kategori;
    private $tahunTerbit;
    private $status;
    private $cover;

    // Constructor untuk ngisi data saat objek dibuat
    public function __construct($id, $judul, $author, $kategori, $tahunTerbit, $status, $cover) {
        $this->id = $id;                       // id dari database
        $this->judul = $judul;                 // judul buku
        $this->author = $author;               // penulis
        $this->kategori = $kategori;           // kategori buku
        $this->tahunTerbit = $tahunTerbit;     // tahun terbit
        $this->status = $status;               // tersedia / dipinjam
        $this->cover = $cover;                 // nama file cover
    }

    // Getter untuk mengambil nilai property 
    public function getId() { return $this->id; }
    public function getJudul() { return $this->judul; }
    public function getAuthor() { return $this->author; }
    public function getKategori() { return $this->kategori; }
    public function getTahunTerbit() { return $this->tahunTerbit; }
    public function getStatus() { return $this->status; }
    public function getCover() { return $this->cover; }
}
