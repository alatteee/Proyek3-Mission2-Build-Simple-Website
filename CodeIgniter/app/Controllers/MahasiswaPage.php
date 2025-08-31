<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class MahasiswaPage extends BaseController
{
    // tampilkan semua + search
    public function index()
    {
        $db = Database::connect();
        $q = $this->request->getGet('q');

        if ($q) {
            $rows = $db->query(
                "SELECT * FROM mahasiswa WHERE nim LIKE ? OR nama LIKE ? OR umur LIKE ?",
                ["%$q%", "%$q%", "%$q%"]
            )->getResultArray();
        } else {
            $rows = $db->query("SELECT * FROM mahasiswa ORDER BY nim")->getResultArray();
        }

        return view('mahasiswa_index', [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $rows,
            'q' => $q
        ]);
    }

    // detail
    public function detail($id)
    {
        $db = Database::connect();
        $row = $db->query("SELECT * FROM mahasiswa WHERE id = ?", [$id])->getRowArray();

        return view('mahasiswa_detail', [
            'title' => 'Detail Mahasiswa',
            'mhs' => $row
        ]);
    }

    // form tambah
    public function create()
    {
        return view('mahasiswa_form', [
            'title' => 'Tambah Mahasiswa',
            'mhs' => null
        ]);
    }

    // simpan data baru
    public function store()
    {
        $db = Database::connect();
        $db->query("INSERT INTO mahasiswa(nim,nama,umur) VALUES(?,?,?)", [
            $this->request->getPost('nim'),
            $this->request->getPost('nama'),
            (int)$this->request->getPost('umur')
        ]);

        return redirect()->to(site_url('mahasiswa'));
    }

    // form edit
    public function edit($id)
    {
        $db = Database::connect();
        $row = $db->query("SELECT * FROM mahasiswa WHERE id = ?", [$id])->getRowArray();

        return view('mahasiswa_form', [
            'title' => 'Edit Mahasiswa',
            'mhs' => $row
        ]);
    }

    // update data
    public function update($id)
    {
        $db = Database::connect();
        $db->query("UPDATE mahasiswa SET nim=?, nama=?, umur=? WHERE id=?", [
            $this->request->getPost('nim'),
            $this->request->getPost('nama'),
            (int)$this->request->getPost('umur'),
            $id
        ]);

        return redirect()->to(site_url('mahasiswa'));
    }

    // hapus
    public function delete($id)
    {
        $db = Database::connect();
        $db->query("DELETE FROM mahasiswa WHERE id=?", [$id]);

        return redirect()->to(site_url('mahasiswa'));
    }
}
