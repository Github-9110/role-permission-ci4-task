<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/alldata', 'Home::index');
$routes->get('/','LoginController::loginform');



$routes->get('login','LoginController::loginform');
$routes->post('logindata','LoginController::logindata'); 
$routes->get('logout','LoginController::logout');


// Add users
$routes->get('/form', 'Home::form');
$routes->post('/savedata','Home::savedata');
$routes->get('edit/(:any)','Home::Edit/$1');
$routes->post('update/(:any)','Home::updatedata/$1');
$routes->get('remove/(:any)','Home::remove/$1'); 

// Roles
$routes->get('add-roles', 'Roles::addroles');
$routes->post('insert-role', 'Roles::insertroles');
$routes->get('role', 'Roles::role');

$routes->get('delete/roles/(:num)', 'Roles::deleteroles/$1');

