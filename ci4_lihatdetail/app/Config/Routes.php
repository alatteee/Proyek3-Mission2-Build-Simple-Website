<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/', 'Dosen::display');
$routes->get('/dosen/display', 'Dosen::display');
$routes->get('/mahasiswa', 'Mahasiswa::display');
$routes->get('mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1');

