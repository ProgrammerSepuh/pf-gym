<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home');
$routes->get('/auth', 'Home::login');
$routes->post('/auth', 'Home::loginProses');

// dashboard
$routes->get('/admin', 'dashboard');
