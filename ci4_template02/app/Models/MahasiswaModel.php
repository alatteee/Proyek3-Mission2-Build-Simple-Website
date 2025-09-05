<?php
namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';

    // LIST semua (tanpa filter)
    public function getMahasiswa(): array
    {
        $db = \Config\Database::connect();
        $sql = "SELECT id, nim, nama, umur FROM mahasiswa ORDER BY id DESC";
        return $db->query($sql)->getResultArray();
    }

    // LIST + SEARCH (cari di nim/nama)
    public function searchMahasiswa(string $q): array
    {
        $db   = \Config\Database::connect();
        $like = "%{$q}%";
        $sql  = "SELECT id, nim, nama, umur
                 FROM mahasiswa
                 WHERE nim LIKE ? OR nama LIKE ?
                 ORDER BY id DESC";
        return $db->query($sql, [$like, $like])->getResultArray();
    }

    // GET by ID (detail)
    public function getById(int $id): ?array
    {
        $db  = \Config\Database::connect();
        $sql = "SELECT id, nim, nama, umur FROM mahasiswa WHERE id = ?";
        $row = $db->query($sql, [$id])->getRowArray();
        return $row ?: null;
    }

    // Cek unik NIM (untuk tambah & edit)
    public function isNimUnique(string $nim, ?int $excludeId = null): bool
    {
        $db = \Config\Database::connect();
        if ($excludeId === null) {
            $sql = "SELECT COUNT(*) c FROM mahasiswa WHERE nim = ?";
            $c   = $db->query($sql, [$nim])->getRow()->c ?? 0;
        } else {
            $sql = "SELECT COUNT(*) c FROM mahasiswa WHERE nim = ? AND id <> ?";
            $c   = $db->query($sql, [$nim, $excludeId])->getRow()->c ?? 0;
        }
        return ((int)$c) === 0;
    }

    // INSERT (pakai transaksi opsional)
    public function insertData(string $nim, string $nama, int $umur): bool
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)";
        $db->query($sql, [$nim, $nama, $umur]);
        $db->transComplete();
        return $db->transStatus();
    }

    // UPDATE by ID
    public function updateData(int $id, string $nim, string $nama, int $umur): bool
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $sql = "UPDATE mahasiswa SET nim = ?, nama = ?, umur = ? WHERE id = ?";
        $db->query($sql, [$nim, $nama, $umur, $id]);
        $db->transComplete();
        return $db->transStatus();
    }

    // DELETE by ID
    public function deleteById(int $id): bool
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $sql = "DELETE FROM mahasiswa WHERE id = ?";
        $db->query($sql, [$id]);
        $db->transComplete();
        return $db->transStatus();
    }
}
