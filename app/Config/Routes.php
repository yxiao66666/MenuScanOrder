<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes for landing page
$routes->get('/', 'MenuScanOrderController::index');

// Routes for privacy_policy
$routes->get('/privacy_policy', 'MenuScanOrderController::privacy_policy');

// Routes for terms_of_service
$routes->get('/terms_of_service', 'MenuScanOrderController::terms_of_service');

// Routes for my_store
$routes->group('my_store', function($routes) {
    $routes->get('/', 'MenuScanOrderController::my_store');
    // Routes for update orders
    $routes->put('save/(:num)', 'MenuScanOrderController::saveOrder/$1');
    $routes->delete('delete/(:num)/(:num)', 'MenuScanOrderController::deleteItem/$1/$2');
    $routes->put('complete/(:num)', 'MenuScanOrderController::completeOrder/$1');
    $routes->put('recall/(:num)', 'MenuScanOrderController::recallOrder/$1');
    // Routes for edit_table
    $routes->match(['GET', 'POST'], 'edit_table', 'MenuScanOrderController::edit_table');
    $routes->match(['GET', 'POST'], 'edit_table/addedittable', 'MenuScanOrderController::edit_table');
    // Routes for edit_menu
    $routes->get('edit_menu', 'MenuScanOrderController::edit_menu');
    $routes->match(['GET', 'POST'], 'edit_menu/addeditMenu', 'MenuScanOrderController::addeditMenu');
    $routes->match(['GET', 'POST'], 'edit_menu/addeditMenu/(:num)', 'MenuScanOrderController::addeditMenu/$1');
    $routes->get('edit_menu/delete/(:num)', 'MenuScanOrderController::deleteMenu/$1');
    // Routes for qr_create
    $routes->get('qr_create', 'MenuScanOrderController::qr_create');
});

// Routes for user_management that filters admin
$routes->group('user_management', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'MenuScanOrderController::user_management');
    $routes->match(['GET', 'POST'], 'addedit', 'MenuScanOrderController::addedit');
    $routes->match(['GET', 'POST'], 'addedit/(:num)', 'MenuScanOrderController::addedit/$1');
    $routes->get('delete/(:num)', 'MenuScanOrderController::deleteUser/$1');
});

// Routes for sign in (render view)
$routes->get('/sign_in', 'MenuScanOrderController::sign_in');

// Routes for sign in (update database)
$routes->post('/authenticate', 'MenuScanOrderController::authenticate');

// Routes for sign up (render view)
$routes->get('/sign_up', 'MenuScanOrderController::sign_up');

// Routes for sign up (update database)
$routes->post('sign_up', 'MenuScanOrderController::signUp');

// Routes for Google login
$routes->group('login', function($routes) {
    // Route to initiate Google login
    $routes->get('/', 'Auth::google_login');
    // Callback route after Google auth
    $routes->get('callback', 'Auth::google_callback');  
});

// Routes for logout
$routes->get('/logout', 'Auth::logout');