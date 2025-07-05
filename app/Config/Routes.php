<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/recuperausuarios', 'Usuarios::recuperausuarios');
