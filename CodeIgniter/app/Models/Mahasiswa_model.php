<?php
namespace App\Models;
use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim','nama','umur'];

    public function getMahasiswa($id = false)
    {
        return $id === false ? $this->findAll() : $this->where('id',$id)->first();
    }
}
