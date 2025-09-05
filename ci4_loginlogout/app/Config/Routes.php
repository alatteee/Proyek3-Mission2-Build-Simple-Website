<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */



// === routes publik (tanpa login) ===
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::doLogin');
$routes->get('logout', 'Auth::logout'); // boleh publik; di method kamu akan destroy session

// === routes yang WAJIB login ===
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Home::index');              // halaman utama (layout)
    $routes->get('/dosen/display', 'Dosen::display');

    // mahasiswa
    $routes->get('mahasiswa', 'Mahasiswa::display');               // list
    $routes->get('mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1'); // detail

    // tambah data
    $routes->get('mahasiswa/create', 'Mahasiswa::create');           // form tambah
    $routes->post('mahasiswa/store', 'Mahasiswa::store');            // proses simpan

    // edit data
    $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');     // form edit
    $routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');// proses update

    // delete data
    $routes->post('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');// hapus data
});

// contoh lain (punya kamu)



