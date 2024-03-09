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

$routes->get('ticketDetail', 'TicketDetail::index');
$routes->post('ticketDetail/buyTicket', 'TicketDetail::BuyTicket');
$routes->post('ticketDetail/deniedTicket', 'TicketDetail::DeleteTicket');


$routes->get('payment', 'Payment::index');
$routes->post('payment/process_payment', 'Payment::process_payment');
$routes->get('success', 'Success::index');

$routes->get('adminIndex', 'AdminController::index');

$routes->get('adminBus', 'AdminController::adminBus');
$routes->get('adminBus/delete/(:num)', 'AdminController::deleteBus/$1');
$routes->post('adminBus/update/(:num)', 'AdminController::busUpdate/$1');
$routes->post('adminBus/add', 'AdminController::addBus');

$routes->get('adminSefer', 'AdminController::adminSefer');
$routes->post('adminSefer/add', 'AdminController::addSefer');
$routes->post('adminSefer/update/(:num)', 'AdminController::updateSefer/$1');
$routes->get('adminSefer/delete/(:num)', 'AdminController::deleteSefer/$1');

$routes->get('adminTicket', 'AdminController::adminTicket');
$routes->post('adminTicket/add', 'AdminController::addTicket');
$routes->get('adminTicket/delete/(:num)', 'AdminController::deleteTicket/$1');
$routes->post('adminTicket/update/(:num)', 'AdminController::updateTicket/$1');

$routes->get('adminSefer', 'AdminController::adminSefer');

$routes->get('adminBalance', 'AdminController::adminBalance');
$routes->post('adminBalance/add', 'AdminController::addBalance');
$routes->get('adminBalance/delete/(:num)', 'AdminController::deleteBalance/$1');
$routes->post('adminBalance/update/(:num)', 'AdminController::updateBalance/$1');


$routes->get('adminPayment', 'AdminController::adminPayment');


$routes->get('adminUser', 'AdminController::adminUser');
    // $routes->post('adminUser/add', 'AdminController::userAdd');
    $routes->get('adminUser/delete/(:num)', 'AdminController::userDelete/$1');
    $routes->post('adminUser/update/(:num)', 'AdminController::userUpdate/$1');

    


