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

// dashboard-profile
$routes->get('/profile', 'dashboard::profile');

// dasjboard_member
$routes->get('/member', 'memberDashboard::member');

// $routes->post('member/updateProfile', 'memberDashboard::updateProfile');
// $routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
//     // Route ke dashboard member
//     $routes->get('member', 'memberDashboard::member');
//     $routes->post('member/updateProfile', 'memberDashboard::updateProfile');
// });

// Fungsi untuk logout
$routes->get('/logout', 'memberDashboard::logout');
// app/Config/Routes.php
$routes->post('memberDashboard/updateProfile', 'memberDashboard::updateProfile');

$routes->post('dashboard/hadir/(:num)', 'Dashboard::hadir/$1');
$routes->get('dashboard/report-member', 'Dashboard::reportMember');
$routes->get('report-member', 'Dashboard::reportMember');


