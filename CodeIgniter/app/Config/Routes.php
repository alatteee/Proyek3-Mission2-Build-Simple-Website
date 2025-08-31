<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('halo', 'Halo::index');

// Home Mahasiswa
$routes->get('tabel', 'Tabel::index');
$routes->get('tabel-while', 'TabelWhile::index');
$routes->get('mahasiswa-sql', 'Mahasiswa::index');
// Mahasiswa CRUD
$routes->get('mahasiswa', 'MahasiswaPage::index');                    // list + search
$routes->get('mahasiswa/detail/(:num)', 'MahasiswaPage::detail/$1');  // detail
$routes->get('mahasiswa/tambah', 'MahasiswaPage::create');            // form tambah
$routes->post('mahasiswa/simpan', 'MahasiswaPage::store');            // simpan data baru
$routes->get('mahasiswa/edit/(:num)', 'MahasiswaPage::edit/$1');      // form edit
$routes->post('mahasiswa/update/(:num)', 'MahasiswaPage::update/$1'); // update data
$routes->get('mahasiswa/hapus/(:num)', 'MahasiswaPage::delete/$1');   // hapus data


