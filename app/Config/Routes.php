<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/authenticate', 'Auth::authenticate');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/auth/logout', 'Auth::logout');