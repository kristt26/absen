<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter'=>'auth']);
$routes->add('auth', 'Login::index');
$routes->get('logout', 'Login::logout');
$routes->group('karyawan', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Karyawan::index');
    $routes->add('create', 'Karyawan::create');
    $routes->add('update/(:num)', 'Karyawan::update/$1');
    $routes->get('delete/(:any)', 'Karyawan::delete/$1');
});
$routes->group('absen', function($routes){
    $routes->get('/', 'Absen::index');
    $routes->get('read', 'Absen::read');
    $routes->post('post', 'Absen::post');
    $routes->add('create', 'Absen::create');
    $routes->add('update/(:num)', 'Absen::update/$1');
    $routes->get('delete/(:any)', 'Absen::delete/$1');
});
$routes->group('laporan', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Laporan::index');
    $routes->post('read', 'Laporan::read');
    $routes->get('detail/(:any)/(:any)/(:num)', 'Laporan::detail/$1/$2/$3');
    $routes->get('excel/(:any)/(:any)/(:num)', 'Laporan::excel/$1/$2/$3');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
