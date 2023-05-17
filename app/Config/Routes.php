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
$routes->get('/', 'Auth::index');
$routes->post('/', 'Auth::login');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::signup');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forgotpassword', 'Auth::forgotpassword');
$routes->post('/forgotpassword', 'Auth::resetpassword');
$routes->get('/changepassword', 'Auth::changepassword');
$routes->post('/changepassword', 'Auth::verify');
$routes->get('/reset', 'Auth::reset');
$routes->get('/verify', 'Auth::verif');
$routes->get('/cek', 'Auth::contoh');

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile', 'Admin\Profile::update');
    $routes->post('profile/changepassword', 'Admin\Profile::changepassword');

    $routes->get('setting', 'Admin\Setting::index');
    $routes->post('setting', 'Admin\Setting::update');

    $routes->get('email', 'Admin\Email::index');
    $routes->post('email', 'Admin\Email::update');

    $routes->get('method', 'Admin\Method::index');
    $routes->get('method/create', 'Admin\Method::create');
    $routes->post('method/create', 'Admin\Method::save');
    $routes->get('method/edit/(:num)', 'Admin\Method::edit/$1');
    $routes->post('method/edit/(:num)', 'Admin\Method::update/$1');
    $routes->get('method/delete/(:num)', 'Admin\Method::delete/$1');

    $routes->get('plan', 'Admin\Plan::index');
    $routes->get('plan/create', 'Admin\Plan::create');
    $routes->post('plan/create', 'Admin\Plan::save');
    $routes->get('plan/edit/(:num)', 'Admin\Plan::edit/$1');
    $routes->post('plan/edit/(:num)', 'Admin\Plan::update/$1');
    $routes->get('plan/delete/(:num)', 'Admin\Plan::delete/$1');

    $routes->get('customer', 'Admin\Customer::index');
    $routes->get('customer/edit/(:num)', 'Admin\Customer::edit/$1');
    $routes->post('customer/edit/(:num)', 'Admin\Customer::update/$1');
    $routes->get('customer/delete/(:num)', 'Admin\Customer::delete/$1');
    $routes->post('customer/changepassword', 'Admin\Customer::changepassword');

    $routes->get('withdraw', 'Admin\Withdraw::index');
    $routes->get('withdraw/edit/(:num)', 'Admin\Withdraw::edit/$1');
    $routes->post('withdraw/edit/(:num)', 'Admin\Withdraw::update/$1');
    $routes->get('withdraw/delete/(:num)', 'Admin\Withdraw::delete/$1');
    
    $routes->get('deposit', 'Admin\Deposit::index');
    $routes->get('deposit/detail/(:num)', 'Admin\Deposit::detail/$1');
    $routes->get('deposit/delete/(:num)', 'Admin\Depsosit::delete/$1');
    
    $routes->get('transaction', 'Admin\Transaction::index');
    $routes->get('transaction/edit/(:num)', 'Admin\Transaction::edit/$1');
    $routes->post('transaction/edit/(:num)', 'Admin\Transaction::update/$1');
    $routes->post('transaction/profit/(:num)', 'Admin\Transaction::profit/$1');
    $routes->get('transaction/delete/(:num)', 'Admin\Transaction::delete/$1');

    $routes->get('whitelist', 'Admin\Whitelist::index');
    $routes->get('whitelist/edit/(:num)', 'Admin\Whitelist::edit/$1');
    $routes->post('whitelist/edit/(:num)', 'Admin\Whitelist::update/$1');
});

$routes->group('/', ['filter' => 'role:user'], function ($routes) {
    $routes->get('dashboard', 'User\Dashboard::index');

    $routes->get('profile', 'User\Profile::index');
    $routes->post('profile', 'User\Profile::update');
    $routes->post('profile/changepassword', 'User\Profile::changepassword');
    
    $routes->get('wallet', 'User\Wallet::index');
    $routes->get('wallet/create', 'User\Wallet::create');
    $routes->post('wallet/create', 'User\Wallet::save');
    $routes->get('wallet/edit/(:num)', 'User\Wallet::edit/$1');
    $routes->post('wallet/edit/(:num)', 'User\Wallet::update/$1');
    $routes->get('wallet/delete/(:num)', 'User\Wallet::delete/$1');
    
    $routes->get('plan', 'User\Plan::index');
    
    $routes->get('transaction', 'User\Transaction::index');
    $routes->get('transaction/(:num)', 'User\Transaction::create/$1');
    $routes->get('transaction/detail/(:num)', 'User\Transaction::detail/$1');
    $routes->post('transaction/(:num)', 'User\Transaction::save/$1');
    
    $routes->get('deposit', 'User\Deposit::index');
    $routes->get('deposit/detail/(:num)', 'User\Deposit::detail/$1');

    $routes->get('withdraw', 'User\Withdraw::index');
    $routes->get('withdraw/create', 'User\Withdraw::create');
    $routes->post('withdraw/create', 'User\Withdraw::save');
    $routes->get('withdraw/edit/(:num)', 'User\Withdraw::edit/$1');
    $routes->post('withdraw/edit/(:num)', 'User\Withdraw::update/$1');
    $routes->get('withdraw/delete/(:num)', 'User\Withdraw::delete/$1');
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