<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Login::index');       // Show login form
$routes->post('/login', 'Login::login'); // Process login
$routes->get('/logout', 'Login::logout'); // Logout

// User 
$routes->get('/user', 'User::index');
$routes->get('/user/create', 'User::create');
$routes->post('/user/store', 'User::store');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');
$routes->post('/user/delete/(:num)', 'User::delete/$1');

// social
$routes->get('/social', 'Social::index');
$routes->get('/social/create', 'Social::create');
$routes->post('/social/store', 'Social::store');
$routes->get('/social/edit/(:num)', 'Social::edit/$1');
$routes->post('/social/update/(:num)', 'Social::update/$1');
$routes->post('/social/delete/(:num)', 'Social::delete/$1');

// about
$routes->get('/about', 'About::index');

