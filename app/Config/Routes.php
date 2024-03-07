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
$routes->get('/account', 'Account::index');
$routes->get('/resetPassword', 'ResetPassword::index');
$routes->get('/authcode', 'Authcode::index');
$routes->get('/about', 'About::index');
$routes->get('/IK', 'İK::index');
$routes->get('/KVKK', 'KVKKController::index');
$routes->get('/ticketInquiry', 'TicketInquiry::index');
$routes->get('/travelGuide', 'TravelGuide::index');
$routes->get('/services', 'Services::index');
$routes->get('/user', 'User::index');
$routes->post('/user', 'User::reserveTicket');
$routes->get('/logout', 'Logout::index');
$routes->get('/userInf', 'UserInf::index');
$routes->get('/points', 'Points::index');

$routes->get('obilet', 'Bilet::index');
$routes->post('obilet', 'Bilet::seferleriListele');

$routes->post('authcode/login', 'Authcode::login');


$routes->get('obilet2', 'Bilet2::index');
$routes->post('obilet2', 'Bilet2::buyTicket');
$routes->post('reserveTicket', 'Bilet2::reserveTicket');


$routes->get('payment', 'Payment::index');
$routes->post('payment/process_payment', 'Payment::process_payment');
$routes->get('success', 'Success::index');

