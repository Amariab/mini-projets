<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 $routes->get('/', 'FactureController::index');
$routes->get('facture', 'FactureController::index');

$routes->get('facture/creer', 'FactureController::creer');

$routes->post('facture/enregistrer', 'FactureController::enregistrer');
$routes->get('facture/voir/(:num)', 'FactureController::voir/$1');
$routes->get('facture/pdf/(:num)', 'FactureController::pdf/$1');
