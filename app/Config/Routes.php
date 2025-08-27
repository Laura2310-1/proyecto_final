<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================== PÚBLICAS ====================
$routes->get('/', 'Home::index');

// ==================== AUTENTICACIÓN ====================
$routes->group('auth', function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('authenticate', 'Auth::authenticate');
    $routes->get('logout', 'Auth::logout');
});

// ==================== DASHBOARDS (PROTEGIDAS) ====================
$routes->group('dashboard', function($routes) {
    $routes->get('/', 'Dashboard::index'); // Redirige según rol
    $routes->get('admin', 'Dashboard::admin');
    $routes->get('trabajador', 'Dashboard::trabajador');
    $routes->get('cliente', 'Dashboard::cliente');
});

// ==================== CONFIGURACIONES ====================
$routes->set404Override(function() {
    return service('response')->setStatusCode(404)->setBody(view('errors/html/error_404'));
});

$routes->setAutoRoute(false);