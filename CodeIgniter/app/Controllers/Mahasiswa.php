<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Mahasiswa extends BaseController
{
    public function index()
    {
        // Koneksi ke database
        $db = Database::connect();

        // Query SQL manual
        $query = $db->query("SELECT * FROM mahasiswa");

        // Ambil hasil query sebagai array
        $data['title'] = "Data Mahasiswa (SQL)";
        $data['mahasiswa'] = $query->getResultArray();

        // Kirim data ke view
        return view('mahasiswa_sql_view', $data);
    }
}
