<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    
    public function display()
    {
        // echo "Hello, World!";
        $model = new \App\Models\MahasiswaModel();

        //ambil data lewat query raw sql
        $data['mahasiswa'] = $model->getMahasiswa();

        return view('/mahasiswa/display_mahasiswa', $data);
    }

    public function detail($id)
    {
        $model = new \App\Models\MahasiswaModel();
        $data['mhs'] = $model->find($id);

        if (!$data['mhs']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa dengan ID $id tidak ditemukan");
        }

        return view('mahasiswa/detail_mahasiswa', $data);
    }

}


