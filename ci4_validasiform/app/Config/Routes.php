<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// contoh lain (punya kamu)
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
