<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('halo', 'Halo::index');

// Home Mahasiswa
$routes->get('mahasiswa', 'Mahasiswa::index'); // url: /mahasiswa -> controller Mahasiswa, method index
$routes->get('tabel', 'Tabel::index');
$routes->get('tabel-while', 'TabelWhile::index');
$routes->get('mahasiswa-sql', 'Mahasiswa::index');

