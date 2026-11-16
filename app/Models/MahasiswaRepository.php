<?php
namespace App\Models;

use PDO;

class MahasiswaRepository 
{
    private PDO $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    public function all(?string $keyword = null): array 
    {
        if ($keyword) {
            $sql = "SELECT m.*, p.nama AS prodi_nama 
                    FROM mahasiswa m 
                    JOIN prodi p ON m.prodi_id = p.id 
                    WHERE m.nama LIKE :keyword1 OR m.nim LIKE :keyword2
                    ORDER BY m.id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['keyword1' => "%$keyword%", 'keyword2' => "%$keyword%"]);
        } else {
            $sql = "SELECT m.*, p.nama AS prodi_nama 
                    FROM mahasiswa m 
                    JOIN prodi p ON m.prodi_id = p.id 
                    ORDER BY m.id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        return $stmt->fetchAll();
    }

    public function getAllProdi(): array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM prodi");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM mahasiswa WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data): bool 
    {
        $sql = "INSERT INTO mahasiswa (nim, nama, email, prodi_id, angkatan) 
                VALUES (:nim, :nama, :email, :prodi_id, :angkatan)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nim'      => $data['nim'],
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan']
        ]);
    }

    public function update(int $id, array $data): bool 
    {
        $sql = "UPDATE mahasiswa SET nim = :nim, nama = :nama, email = :email, 
                prodi_id = :prodi_id, angkatan = :angkatan WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id'       => $id,
            'nim'      => $data['nim'],
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan']
        ]);
    }

    public function delete(int $id): bool 
    {
        $stmt = $this->pdo->prepare("DELETE FROM mahasiswa WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}