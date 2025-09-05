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
}


