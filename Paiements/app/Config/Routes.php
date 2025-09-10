<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PaymentController::index');

// Routes pour les paiements
$routes->get('payment', 'PaymentController::index');
$routes->get('payment/stripe', 'PaymentController::payWithStripe');
$routes->get('payment/stripe/success', 'PaymentController::stripeSuccess');
$routes->get('payment/stripe/cancel', 'PaymentController::stripeCancel');
$routes->get('payment/paypal', 'PaymentController::payWithPaypal');
$routes->get('payment/paypal/success', 'PaymentController::paypalSuccess');
$routes->get('payment/paypal/cancel', 'PaymentController::paypalCancel');
