<?php
namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    
    //fungsi untuk ambil data dengan query mentah
    public function getMahasiswa()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM mahasiswa");
        return $query->getResultArray(); //kembalikan dalam bentuk array
    }
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['nim','nama','umur'];

    // public function getMahasiswa($id = false)
    // {
    //     return $id === false ? $this->findAll() : $this->where('id',$id)->first();
    // }
}
