<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');
$routes->get('admin/', 'Admin::index');
$routes->get('users/','Users::index');
