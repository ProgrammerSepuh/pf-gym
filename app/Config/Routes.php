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

// Fungsi untuk logout
$routes->get('/logout', 'memberDashboard::logout');
// app/Config/Routes.php
$routes->post('memberDashboard/updateProfile', 'memberDashboard::updateProfile');

$routes->post('dashboard/hadir/(:num)', 'Dashboard::hadir/$1');
$routes->get('dashboard/report-member', 'Dashboard::reportMember');
$routes->get('report-member', 'Dashboard::reportMember');

// proses membership
$routes->get('/dashboard/membership/formAdd', 'dashboard::formAdd');
$routes->post('/dashboard/membership/formAdd', 'dashboard::save');
$routes->get('/dashboard/delete/(:num)', 'dashboard::delete/$1');

// Halaman manage membership
$routes->get('/manage-membership', 'dashboard::membership');
$routes->get('/dashboard/membership', 'dashboard::membership');

// Halaman data member
$routes->get('/data-member', 'Dashboard::dataMember');
$routes->get('/dashboard/membership/memberAdd', 'dashboard::formMember');
$routes->post('/dashboard/membership/saveMember', 'dashboard::saveMember');
$routes->post('/dashboard/membership/membershipAdd', 'dashboard::saveMember');

$routes->get('/dashboard/membership/membershipForm/(:num)', 'dashboard::member_membership/$1');
$routes->post('/dashboard/membership/save_tambah_membership', 'dashboard::tambah_membership');

$routes->post('dashboard/exportCsv', 'Dashboard::exportCsv');
$routes->post('dashboard/exportCsv', 'Dashboard::exportCsv');

$routes->get('/dashboard/membership/hapusMember/(:num)', 'Dashboard::hapusMember/$1');
