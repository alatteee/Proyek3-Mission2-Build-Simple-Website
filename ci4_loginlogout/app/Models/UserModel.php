<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    // raw SQL aman dengan binding
    public function findByUsername(string $username): ?array
    {
        $db  = \Config\Database::connect();
        $sql = "SELECT id, username, password_hash, name, role FROM users WHERE username = ?";
        $row = $db->query($sql, [$username])->getRowArray();
        return $row ?: null;
    }
}
