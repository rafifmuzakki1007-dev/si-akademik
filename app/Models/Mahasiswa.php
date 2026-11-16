<?php
namespace App\Models;

class Mahasiswa 
{
    private ?int $id;
    private string $nim;
    private string $nama;
    private string $email;
    private int $prodiId;
    private int $angkatan;
    private ?string $namaProdi;

    public function __construct(?int $id, string $nim, string $nama, string $email, int $prodiId, int $angkatan, ?string $namaProdi = null) 
    {
        $this->id = $id;
        $this->setNim($nim);
        $this->setNama($nama);
        $this->email = $email;
        $this->prodiId = $prodiId;
        $this->angkatan = $angkatan;
        $this->namaProdi = $namaProdi;
    }

    // Getter
    public function getId(): ?int { return $this->id; }
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getEmail(): string { return $this->email; }
    public function getProdiId(): int { return $this->prodiId; }
    public function getAngkatan(): int { return $this->angkatan; }
    public function getNamaProdi(): ?string { return $this->namaProdi; }

    // setter dengan validasi Sederhana (Sesuai Modul Acara 9)
    public function setNim(string $nim): void 
    {
        if (!is_numeric($nim)) {
            throw new \InvalidArgumentException("NIM harus berupa angka.");
        }
        $this->nim = $nim;
    }

    public function setNama(string $nama): void 
    {
        if (empty(trim($nama))) {
            throw new \InvalidArgumentException("Nama mahasiswa tidak boleh kosong.");
        }
        $this->nama = $nama;
    }
}