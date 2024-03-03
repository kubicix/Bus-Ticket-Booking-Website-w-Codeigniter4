<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/anasayfa', 'Home::index');

$routes->get('/contact1', 'Contact1::index');
$routes->get('/contact2', 'Contact2::index');

$routes->get('/register', 'Register::index');

$routes->get('obilet', 'Bilet::index');
$routes->post('obilet', 'Bilet::seferleriListele');

$routes->get('obilet2', 'Bilet2::index');



