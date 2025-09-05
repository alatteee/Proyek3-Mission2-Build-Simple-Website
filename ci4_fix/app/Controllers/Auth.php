<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $users;

    public function __construct()
    {
        helper(['url','form']);
        $this->users = new UserModel();
    }

    public function login()
    {
        // kalau sudah login, lempar ke beranda
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('/'));
        }

        return view('auth/login', [
            'errors' => session('errors') ?? [],
            'msg'    => session()->getFlashdata('msg') ?? null,
        ]);
    }

    public function doLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->users->findByUsername($username);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('errors', ['login' => 'Username atau password salah']);
        }

        // set session
        session()->set([
            'uid'        => $user['id'],
            'username'   => $user['username'],
            'name'       => $user['name'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to(site_url('/'))->with('msg', 'Login berhasil');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('msg', 'Anda telah logout');
    }
}
