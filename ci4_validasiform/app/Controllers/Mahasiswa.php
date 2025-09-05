<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $m;

    public function __construct()
    {
        $this->m = new MahasiswaModel();
        helper(['url','form']);
    }

    // LIST + SEARCH
    public function display()
    {
        $q = trim($this->request->getGet('q') ?? '');

        if ($q !== '') $data['mahasiswa'] = $this->m->searchMahasiswa($q);
        else           $data['mahasiswa'] = $this->m->getMahasiswa();

        $data['q'] = $q;
        return view('mahasiswa/display_mahasiswa', $data);
    }

    // DETAIL
    public function detail($id)
    {
        $data['mhs'] = $this->m->getById((int)$id);
        if (!$data['mhs']) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa ID $id tidak ditemukan");
        return view('mahasiswa/detail_mahasiswa', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        return view('mahasiswa/form_mahasiswa', [
            'title'  => 'Tambah Data Mahasiswa',
            'action' => site_url('mahasiswa/store'),
            'mhs'    => ['nim'=>'','nama'=>'','umur'=>''],
            'isEdit' => false,
            'errors' => session('errors') ?? [],
        ]);
    }

    // SIMPAN TAMBAH (validasi + cek unik NIM manual)
    public function store()
    {
        $rules = [
            'nim'  => 'required|numeric',
            'nama' => 'required|min_length[3]',
            'umur' => 'required|integer|greater_than_equal_to[15]|less_than_equal_to[100]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nim  = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $umur = (int)$this->request->getPost('umur');

        if (! $this->m->isNimUnique($nim)) {
            return redirect()->back()->withInput()->with('errors', ['nim' => 'NIM sudah terdaftar']);
        }

        if (!$this->m->insertData($nim, $nama, $umur)) {
            return redirect()->back()->withInput()->with('errors', ['general' => 'Gagal menyimpan data']);
        }

        return redirect()->to(site_url('mahasiswa'))->with('msg', 'Data berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $mhs = $this->m->getById((int)$id);
        if (!$mhs) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa ID $id tidak ditemukan");

        return view('mahasiswa/form_mahasiswa', [
            'title'  => 'Edit Data Mahasiswa',
            'action' => site_url('mahasiswa/update/'.$id),
            'mhs'    => $mhs,
            'isEdit' => true,
            'errors' => session('errors') ?? [],
        ]);
    }

    // SIMPAN UPDATE (validasi + unik NIM kecuali milik sendiri)
    public function update($id)
    {
        $mhs = $this->m->getById((int)$id);
        if (!$mhs) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa ID $id tidak ditemukan");

        $rules = [
            'nim'  => 'required|numeric',
            'nama' => 'required|min_length[3]',
            'umur' => 'required|integer|greater_than_equal_to[15]|less_than_equal_to[100]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nim  = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $umur = (int)$this->request->getPost('umur');

        if (! $this->m->isNimUnique($nim, (int)$id)) {
            return redirect()->back()->withInput()->with('errors', ['nim' => 'NIM sudah dipakai mahasiswa lain']);
        }

        if (! $this->m->updateData((int)$id, $nim, $nama, $umur)) {
            return redirect()->back()->withInput()->with('errors', ['general' => 'Gagal mengupdate data']);
        }

        return redirect()->to(site_url('mahasiswa'))->with('msg', 'Data berhasil diupdate');
    }

    // DELETE
    public function delete($id)
    {
        $this->m->deleteById((int)$id);
        return redirect()->to(site_url('mahasiswa'))->with('msg', 'Data dihapus');
    }
}
