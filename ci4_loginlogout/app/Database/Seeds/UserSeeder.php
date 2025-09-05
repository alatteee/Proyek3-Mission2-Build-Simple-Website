<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'superuser',
            'password_hash' => password_hash('super123', PASSWORD_DEFAULT),
            'name'          => 'Super User',
            'role'          => 'admin'
        ];

        // insert ke tabel users
        $this->db->table('users')->insert($data);
    }
}
