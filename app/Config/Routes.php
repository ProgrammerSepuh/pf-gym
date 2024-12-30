<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Halaman utama dan autentikasi
$routes->get('/', 'Home');
$routes->get('/auth', 'Home::login');
$routes->post('/auth', 'Home::loginProses');

// Halaman dashboard admin
$routes->get('/admin', 'Dashboard');
$routes->get('/admin', 'Dashboard::index');

// Halaman profil admin
$routes->get('/profile', 'Dashboard::profile');

// Halaman data member
$routes->get('/member', 'Dashboard::dataMember');

// Halaman manage membership
$routes->get('/manage-membership', 'Dashboard::manageMembership');

// Halaman attendance member
$routes->get('/attendance-member', 'Dashboard::attendanceMember');

// Halaman report member
$routes->get('/report-member', 'Dashboard::reportMember');

// Fungsi tambahan
$routes->post('dashboard/hadir/(:num)', 'Dashboard::hadir/$1');
$routes->post('memberDashboard/updateProfile', 'memberDashboard::updateProfile');
$routes->get('dashboard/report-member', 'Dashboard::reportMember');
$routes->get('report-member', 'Dashboard::reportMember');

// Fungsi untuk logout
$routes->get('/logout', 'memberDashboard::logout');

// dasjboard_member
$routes->get('/member', 'memberDashboard::member');


// $routes->get('/member', 'Dashboard::dataMember');
// $routes->get('/manage-membership', 'Dashboard::manageMembership');
// $routes->get('/attendance-member', 'Dashboard::attendanceMember');
// $routes->get('/report-member', 'Dashboard::reportMember');


//////////////////////////////////////////////

// $routes->post('member/updateProfile', 'memberDashboard::updateProfile');
// $routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
//     // Route ke dashboard member
//     $routes->get('member', 'memberDashboard::member');
//     $routes->post('member/updateProfile', 'memberDashboard::updateProfile');
// });

// Fungsi untuk logout

// app/Config/Routes.php







