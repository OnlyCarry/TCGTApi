<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('register', 'usersController::create');
    $routes->get('lastestT', 'TournamentsController::data');
});

