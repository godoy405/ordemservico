<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/recuperausuarios', 'Usuarios::recuperausuarios');
$routes->get('usuarios/exibir/(:num)', 'Usuarios::exibir/$1');
