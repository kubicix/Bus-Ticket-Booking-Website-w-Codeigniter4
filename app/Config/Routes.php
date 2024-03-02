<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/anasayfa', 'Home::index');
$routes->get('/contact2', 'Contact2::index');
$routes->get('/register', 'Register::index');
